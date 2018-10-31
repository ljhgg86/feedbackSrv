<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Validator;
=======
>>>>>>> 5e935d9159f4a261b936017432767933e646234b
use App\Models\User;
use App\Models\Role;
use App\Models\Fbcontent;
use Response;
use DB;
<<<<<<< HEAD
use Auth;
=======
>>>>>>> 5e935d9159f4a261b936017432767933e646234b

class UserController extends Controller
{
    public function __construct()
    {
        $this->user=new User();
<<<<<<< HEAD
        $this->role=new Role();
=======
>>>>>>> 5e935d9159f4a261b936017432767933e646234b
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        return view('user.index',['users'=>$this->user->getWithRole(),'kind'=>'用户']);
=======
        return view('user.index',['users'=>$this->user->getWithRole()]);
>>>>>>> 5e935d9159f4a261b936017432767933e646234b
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        $user=new User();
        $user->role=new Role();
        return view('user.edit',['user'=>$user,'roles'=>$this->role->getRoles()]);
    }

    //create Mobile admin
    public function createMB()
    {
        return view('user.createMB',['tip'=>'必须是已存在的用户，修改后普通用户成为手机管理员，手机管理员则成为普通用户！']);
=======
        //
>>>>>>> 5e935d9159f4a261b936017432767933e646234b
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $password=$request->input('password');
        $role_id=$request->input('role');
        $password=$password ? bcrypt($password) : bcrypt('123456');
        $role_id=$role_id ? intval($role_id) : config('feedback.userRole');
=======
>>>>>>> 5e935d9159f4a261b936017432767933e646234b
        $user=User::create([
            'uid'=>$request->input('uid'), 
            'name'=>$request->input('mobile'),
            'nickname'=>$request->input('nickname'),
            'avatar'=>$request->input('avatar'),
<<<<<<< HEAD
            'password'=>$password,
            'role_id'=>$role_id
        ]);
        if($role_id != config('feedback.userRole')){
            return redirect()->route('user.showAdmin');
        }
=======
            'password'=>bcrypt('123456')
        ]);
>>>>>>> 5e935d9159f4a261b936017432767933e646234b
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
<<<<<<< HEAD
        return view('user.edit',['user'=>$this->user->getUser($id),'roles'=>$this->role->getRoles()]);
=======
        return view('user.edit',['user'=>$this->user->getUser($id)]);
>>>>>>> 5e935d9159f4a261b936017432767933e646234b
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
<<<<<<< HEAD
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
        $user=$this->user->searchByName($request->input('mobile'));
        if(!$user){
            return view('user.createMB',['tip'=>'该用户不存在,请先在app注册！']);
        }
        $roleid=($user->role_id==config('feedback.userRole')) ? 
                    config('feedback.mbRole') : config('feedback.userRole');
        $user->role_id = $roleid;
        $user->save();
        return redirect()->route('user.showAdmin');
=======
        //
>>>>>>> 5e935d9159f4a261b936017432767933e646234b
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
<<<<<<< HEAD

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
=======
>>>>>>> 5e935d9159f4a261b936017432767933e646234b
}
