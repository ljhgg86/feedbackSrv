<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fbcontent;
use App\Models\Fblist;
use Response;
use DB;

class FbcontentController extends Controller
{
    /**
    *Create a new instance.
    */
    public function __construct()
    {
        $this->fbcontent=new Fbcontent();
        $this->fblists=new Fblist();
        $this->user=new User();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $id=Auth::id();

        // $fblists=DB::table('users')
        //         ->join('fbcontent','users.id','=','fbcontent.user_id')
        //         ->select(DB::raw('MAX(fbcontent.id) as id,count(if(readflag=0 and admin_id=0,true,null)) as count, user_id,name,fbcontent.content,fbcontent.created_at'))
        //         ->groupBy('user_id')
        //         ->orderBy('id','desc')
        //         ->get();
        // var_dump(json_encode($fblists));

        // $fbcontents=Fbcontent::with(['user_send'=>function($query){
        //                     $query->where('delflag',0);
        //                     }])
        //                     ->where('delflag',0)
        //                     ->orderBy('id','desc')
        //                     ->paginate(15);
        // return view('fbcontent.index')->withFbcontents($fbcontents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status=$this->fbcontent->storeContent($request->all());
        $id=$request->input('user_id');
        $preUrl=$request->input('preUrl');
        $typeid=$request->input('type_id');
        //return view('home.show2',['fbcontents'=>$this->fbcontent->getWithUser($id),'user'=>$this->user->find($id),'preUrl'=>$request->input('preUrl')]);
        //return redirect()->route('home.show',['user'=>$this->user->find($id),'preUrl'=>$preUrl]);
        return view('home.show',['user'=>$this->user->find($id),'typeid'=>$typeid,'preUrl'=>$preUrl]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $fbcontent=Fbcontent::firstOrFail($id);
        $fbcontent->content=$request->input('content');
        $fbcontent->readflag=$request->input('readflag');
        $fbcontent->replyflag=$request->input('replyflag');
        $fbcontent->delflag=$request->input('delflag');
        $fbcontent->save();
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

    //update value of content's delflag with 1
    public function delContent($id){
        return $this->fbcontent->delContent($id);
    }

    //get Fbcontents
    public function getFbcontents(Request $request){
        $userid=$request->input('userid');
        $page=$request->input('page');
        $typeid=$request->input('typeid');
        return response()->json([
            'status'=>true,
            'fbContents'=>$this->fbcontent->getWithUser1($userid,$page,$typeid)
        ]);
    }

    //get FbcontentsApi
    public function getFbcontentsApi(Request $request){
        $tmp=$request->input('params');
        $user=$this->user->updateOrCreate(
            ['name'=>$tmp['name']],
             ['nickname'=>$tmp['nickname'],'avatar'=>$tmp['avatar']]
        );
        $userid=$user->id;
        $page=$tmp['page'];
        if($page==0){
            $this->fbcontent->updateReadflagApi($userid,$tmp['typeid']);
        }
        return response()->json([
            'status'=>true,
            'user'=>$user,
            'fbContents'=>$this->fbcontent->getWithUser1($userid,$page,$tmp['typeid'])
        ]);
    }
    //get FbcontentsApiAdmin
    public function getFbcontentsApiAdmin($typeid,$id,$page){
        $this->fbcontent->updateReadflag($id,$typeid);
        return response()->json([
            'status'=>true,
            'fbContents'=>$this->fbcontent->getWithUser1($id,$page,$typeid)
        ]);
    }
    //store fbcontent Api
    public function storeApi(Request $request){//var_dump($request->input('params'));
        $status=$this->fbcontent->storeContent($request->input('params'));
        return $status;
    }
}
