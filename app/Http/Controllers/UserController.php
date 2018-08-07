<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Fbcontent;
use Response;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->user=new User();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index',['users'=>$this->user->getWithRole()]);
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
        $user=User::create([
            'uid'=>$request->input('uid'), 
            'name'=>$request->input('mobile'),
            'nickname'=>$request->input('nickname'),
            'avatar'=>$request->input('avatar'),
            'password'=>bcrypt('123456')
        ]);
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
        return view('user.edit',['user'=>$this->user->getUser($id)]);
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
        //
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
}
