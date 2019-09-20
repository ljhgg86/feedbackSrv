<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fbcontent extends Model
{
    protected $table= 'fbcontent';
    protected $fillable = [
        'content',
        'user_id',
        'admin_id',
        'fblist_id',
        'type_id',
        'imgflag',
        'videoflag',
        'readflag',
        //'replyflag',
        'delflag'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function admin(){
        return $this->belongsTo('App\Models\User','admin_id');
    }
    public function fblist(){
        return $this->belongsTo('App\Models\Fblist','fblist_id');
    }
    public function type(){
        return $this->belongsTo('App\Models\Type','type_id');
    }
    //update read flag
    public function updateReadflag($id,$typeid){
        $this->where('user_id',$id)
            ->where('type_id',$typeid)
            ->where('admin_id',0)
            ->where('readflag',0)
            ->where('delflag',0)
            ->update(['readflag'=>1]);
    }
    //update read flag by user
    public function updateReadflagApi($id,$typeid){
        $this->where('user_id',$id)
            ->where('type_id',$typeid)
            ->where('admin_id','<>',0)
            ->where('readflag',0)
            ->where('delflag',0)
            ->update(['readflag'=>1]);
    }

    //set value of content's delflag with 1
    public function delContent($id){
        return $this->where('id',$id)
                    ->update(['delflag'=>1]);
    }

    //store content
    public function storeContent($info){
        $user_id=$info['user_id'];
        $admin_id=$info['admin_id'];
        $type_id=$info['type_id'];
        $content=$info['content'];
        $imageSrcsStr=$info['imageSrcs'];
        $fbid=0;
        if(!$content && !$imageSrcsStr){
            return json_encode(['status'=>false , 'id'=>$fbid]);
        };
        if($content){
            $fb=$this->create(
                ['user_id'=>$user_id,
                'admin_id'=>$admin_id,
                'type_id'=>$type_id,
                'content'=>$content]
            );
            $fbid = $fb['id'];
        }
        if($imageSrcsStr){
            $imageSrcsArray=explode(",",$imageSrcsStr);
            //$imageContents=array();
            foreach($imageSrcsArray as $imageSrc){
                // array_push($imageContents,
                //     ['user_id'=>$user_id,
                //     'admin_id'=>$admin_id,
                //     'content'=>$imageSrc,
                //     'imgflag'=>1]
                // );
                $fb=$this->create(
                        ['user_id'=>$user_id,
                        'admin_id'=>$admin_id,
                        'type_id'=>$type_id,
                        'content'=>$imageSrc,
                        'imgflag'=>1]
                    );
            }
            $fbid = $fb['id'];
            // var_dump($imageContents);
            // $this->create($imageContents);
        }
        return json_encode(['status'=>true , 'id'=>$fbid]);
    }

    //get the dialog's feedback infomation list
    public function getWithUser($id){
        return $this->where('user_id',$id)
                    ->where('delflag',0)
                    ->with(['user'=>function($query){
                        $query->where('delflag',0);
                    },'admin'=>function($query){
                        $query->where('delflag',0);
                    }])
                    ->orderBy('id','desc')
                    ->paginate(4);
    }

    public function getWithUser1($userid,$page,$typeid){
        $perPage=config('feedback.perPage');
        return $this->where('user_id',$userid)
                    ->where('delflag',0)
                    ->where('type_id',$typeid)
                    ->with(['user'=>function($query){
                        $query->where('delflag',0);
                    },'admin'=>function($query){
                        $query->where('delflag',0);
                    }])
                    ->orderBy('id','desc')
                    ->skip($page*$perPage)
                    ->take($perPage)
                    ->get();
    }

    public function getPanelHtml($userid,$page,$typeid){
        $fbcontents=$this->getWithUser1($userid,$page,$typeid);
        $html="";
        $htmlRow="";
        if(!count($fbcontents)){
            return "<div class='row'>
                        <div class='col-md-offset-5'>
                            没有更多了
                        </div>
                    </div>";
         }
        foreach($fbcontents as $fbcontent){
            if($fbcontent->admin_id==0){
                $htmlRow=
            "<div class='row' style='text-align: left;'>
                    <div class='col-md-1'>
                        <a href='#' class='thumbnail'>
                            <img src='".$fbcontent->user->avatar."'>
                        </a>
                    </div>
                    <div class='col-md-7'>";
                        if($fbcontent->imgflag){
                        $htmlRow+=
                        "<div class='col-sm-9 col-md-6'>
                            <a href='#' class='thumbnail' onclick='preview_image(&quot;../../".$fbcontent->content."&quot;)'>
                                <img src='../../".$fbcontent->content."' alt='通用的占位符缩略图'>
                            </a>
                        </div>";
                        }
                        else{
                            $htmlRow+=$fbcontent->content;
                        }
                        $htmlRow+=
                        "<div>
                            <span class='label label-info'>".
                                $fbcontent->created_at
                            ."</span>
                        </div>
                    </div>
                </div>";
            }
            else {
                $htmlRow=
                "<div class='row'>
                    <div class='col-md-1 pull-right'>
                        <a href='#' class='thumbnail'>
                            <img src='".$fbcontent->admin->avatar."'>
                                </a>
                            </div>
                            <div class='col-md-7 pull-right text-right'>";
                                if($fbcontent->imgflag){
                                    $htmlRow+=
                                "<div class='col-sm-9 col-md-6 pull-right'>
                                    <a href='#' class='thumbnail' onclick='preview_image(&quot;../../".$fbcontent->content."')'>
                                        <img src='../../".$fbcontent->content."' alt='通用的占位符缩略图'>
                                    </a>
                                </div>";
                                }
                                else{
                                    $htmlRow+=$fbcontent->content;
                                }
                                $htmlRow+=
                                "<div>
                                    <span class='label label-success'>".
                                    $fbcontent->created_at.
                                "</span>
                                </div>
                            </div>
                        </div>";
            }
            $html=$htmlRow+$html;
        }
        return $html;
    }
}
