<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fbcontent;
use App\Models\Fblist;
use App\Models\Type;
use Response;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->user=new User();
        $this->fbcontent=new Fbcontent();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($typeid=0)
    {
        // $fblists=DB::table('users')
        //         ->join('fbcontent','users.id','=','fbcontent.user_id')
        //         ->select(DB::raw('MAX(fbcontent.id) as id,count(if(readflag=0 and admin_id=0,true,null)) as count, user_id,name,fbcontent.content,fbcontent.imgflag,fbcontent.videoflag,fbcontent.created_at'))
        //         ->groupBy('user_id')
        //         ->orderBy('id','desc')
        //         ->paginate(15);

        $fblists=DB::table('users')
                ->join('fbcontent','users.id','=','fbcontent.user_id')
                ->where('fbcontent.admin_id',0)
                ->where('fbcontent.delflag',0)
                ->where IF($typeid>0,'fbcontent.type_id',$typeid)
                ->select(DB::raw('MAX(fbcontent.id) as id,count(if(readflag=0 and admin_id=0,true,null)) as count, user_id,name,fbcontent.content,fbcontent.imgflag,fbcontent.videoflag,fbcontent.created_at'))
                ->groupBy('user_id')
                ->orderBy('id','desc')
                ->paginate(15);
        $types=Type::where('delflag',0)->get();
        $currentType=Type::where('id',$typeid)->first();
        if($currentType){
            $currentTypeName = $currentType->name;
        }
        else{
            $currentTypeName = "全部";
        }
        return view('home.index',['fblists'=>$fblists,'types'=>$types,'currentTypeName'=>$currentTypeName]);
    }

    //show the select dialog
    public function show($id){
        $this->fbcontent->updateReadflag($id);
        return view('home.show',['user'=>$this->user->find($id),'preUrl'=>url()->previous()]);
    }
    // public function show($id){
    //     return view('home.show2',['fbcontents'=>$this->fbcontent->getWithUser($id),'user'=>$this->user->find($id),'preUrl'=>url()->previous()]);
    // }

}
