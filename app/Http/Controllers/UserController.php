<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;
use App\Models\Type;
use App\Models\Type_users;
use App\Models\Fbcontent;
use Response;
use DB;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->user=new User();
        $this->role=new Role();
        $this->type=new Type();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index',['users'=>$this->user->getWithRole(),'kind'=>'用户']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=new User();
        $user->role=new Role();
        return view('user.edit',['user'=>$user,'roles'=>$this->role->getRoles(),'types'=>$this->type->getTypes()]);
    }

    //create Mobile admin
    public function createMB()
    {
        return view('user.createMB',['tip'=>'必须是已存在的用户，修改后普通用户成为手机管理员，手机管理员则成为普通用户！']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password=$request->input('password');
        $role_id=$request->input('role');
        $password=$password ? bcrypt($password) : bcrypt('123456');
        $role_id=$role_id ? intval($role_id) : config('feedback.userRole');
        $user=User::create([
            'uid'=>$request->input('uid'), 
            'name'=>$request->input('mobile'),
            'nickname'=>$request->input('nickname'),
            'avatar'=>$request->input('avatar'),
            'password'=>$password,
            'role_id'=>$role_id
        ]);
        if($role_id != config('feedback.userRole')){
            return redirect()->route('user.showAdmin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user=User::find($id);
        // $fbcontents=DB::table('fbcontent')
        //                 ->where('user_id_src',$id)
        //                 ->orWhere('user_id_des',$id)
        //                 ->orderBy('id','desc')
        //                 ->paginate(10);
        // return view('user.show',compact('user','fbcontents'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.edit',['user'=>$this->user->getUser($id),'roles'=>$this->role->getRoles(),'types'=>$this->type->getTypes()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->nickname = $request->input('nickname');
        $user->avatar = $request->input('avatar');
        $user->save();
        if($user->role_id == config('feedback.superRole') || $user->role_id == config('feedback.pcRole')){
            return redirect()->back();
        }
    }

    /**
    *update the user,to be mobile admin or normal user
    */
    public function updateMB(Request $request)
    {
        // $user=$this->user->searchByName($request->input('mobile'));
        // if(!$user){
        //     return view('user.createMB',['tip'=>'该用户不存在,请先在app注册！']);
        // }
        // $roleid=($user->role_id==config('feedback.userRole')) ? 
        //             config('feedback.mbRole') : config('feedback.userRole');
        $id = intval($request->input('id'));
        $user = User::find($id);
        $roleid = $request->input('role');
        $user->role_id = $roleid;
        $user->save();
        $typeids = $request->input('types');
        Type_users::where('user_id',$user->id)->delete();
        if($roleid == 3){
            foreach($typeids as $typeid){
                Type_users::create(['type_id'=>$typeid,'user_id'=>$user->id]);
            }
        }
        return redirect()->route('user.showAdmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchMB(Request $request){
        $user=$this->user->searchByName($request->input('mobile'));
        $typeids=$this->user->getTypeidsByName($request->input('mobile'));
        return view('user.editMB',['user'=>$user,'types'=>$this->type->getTypes(),'typeids'=>$typeids]);
    }

    /**
    *Display the list of users which is admin
    */
    public function showAdmin()
    {
        return view('user.index',['users'=>$this->user->getAdminWithRole(),'kind'=>'管理员']);
    }

    /**
    *get reset view
    */
    public function getReset()
    {
        return view('auth.reset');
    }

    /**
    *post reset data
    */
    public function postReset(Request $request)
    {
        $oldpassword = $request->input('oldpassword');
        $password = $request->input('password');
        $data = $request->all();
        $rules = [
            'oldpassword'=>'required|between:6,20',
            'password'=>'required|between:6,20|confirmed',
        ];
        $messages = [
            'required' => '密码不能为空',
            'between' => '密码必须是6~20位之间',
            'confirmed' => '新密码和确认密码不匹配'
        ];
        $validator = Validator::make($data, $rules, $messages);
        $user = Auth::user();
        $validator->after(function($validator) use ($oldpassword, $user) {
            if (!\Hash::check($oldpassword, $user->password)) {
                $validator->errors()->add('oldpassword', '原密码错误');
            }
        });
        if ($validator->fails()) {
            return back()->withErrors($validator);  //返回一次性错误
        }
        $user->password = bcrypt($password);
        $user->save();
        Auth::logout();  //更改完这次密码后，退出这个用户
        return redirect('/login');
    }

    /*
    **search user by name
    */
    public function searchUserName($name){
        return $this->user->searchByName($name);
    }


    //show user's feedbacks to mobile admin
    public function showFbs($typeid,$page){
        return response()->json([
            'status'=>true,
            'fblists'=>$this->user->getUsersWithFbs($typeid,$page)
        ]);
    }

    //show user's feedbacks to mobile admin where has keyword
    public function searchFbs($typeid,$keyword,$page){
        return response()->json([
            'status'=>true,
            'fblists'=>$this->user->searchWithFbs($typeid,$keyword,$page)
        ]);
    }

    //get counts of reply by admin
    public function getReplyCounts($name){
        $user=$this->user->getReplyCounts($name);
        if(count($user)){
            return response()->json([
                'status'=>true,
                'mobile'=>$user[0]->name,
                'feedbackCounts'=>$user[0]->fbcontents_count
            ]);
        }
        else{
            return response()->json([
                'status'=>false
            ]);
        }
        
    }
    
    /**
     * get all typeids of the name
     */
    public function getTypeidsByName($name){
        return response()->json([
            'status'=>true,
            'typeids'=>$this->user->getTypeidsByName($name)
        ]);
    }

}
