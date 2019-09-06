<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use Response;

class NoticeController extends Controller
{
    /**
    *Create a new instance.
    */
    public function __construct()
    {
        $this->notice=new Notice();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices=$this->notice->getNotice();
        return view('notice.index')->with('notices',$notices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notice=new Notice();
        return view('notice.edit')->with('notice',$notice);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string|max:50',
            'detail' => 'required|string|max:500',
        ]);
        $notice=Notice::create([
            'title'=>$request->input('title'), 
            'detail'=>$request->input('detail'),
            'showtop'=>$request->input('showtop')
        ]);
        return redirect('/notice')
                        ->withSuccess("公告新建成功.");
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
        $notice=Notice::where('id',$id)
                ->first();
        return view('notice.edit')->with('notice',$notice);
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
        $this->validate($request,[
            'title' => 'required|string|max:50',
            'detail' => 'required|string|max:500',
        ]);
        $notice = Notice::findOrFail($id);
        $notice->title=$request->input('title');
        $notice->detail=$request->input('detail');
        $notice->showtop=$request->input('showtop');
        $notice->save();
        return redirect("/notice/$id/edit")
                        ->withSuccess("公告更新成功.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);
        $notice->delflag=1;
        $notice->save();
        return redirect('/notice');
    }

    /*get showtop notice*/
    public function getShowtop(){
        $noticeArray=json_decode($this->notice->getShowtop(),true);
        foreach($noticeArray as $notice){
            $notice = join(" ",$notice);
            $temp_array[] = $notice;
        }
        return implode(" ",$temp_array);
    }
    /*get notice list*/
    public function getNoticeList(){
        return response()->json([
            'status'=>true,
            'noticelist'=>$this->notice->getNotice()
        ]);
    }
    /*get the notice infomation*/
    public function getNoticeInfo($id){
        return response()->json([
            'status'=>true,
            'noticeinfo'=>$this->notice->getNoticeInfo($id)
        ]);
    }
}
