<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table= 'notice';
	protected $primaryKey= 'id';
	protected $fillable = [
        'title',
        'detail',
        'showtop',
        'delflag',
        'type_id'
    ];
    public function type(){
        return $this->belongsTo('App\Models\Type','type_id');
    }
    /*return all notice*/
    public function getNotice($typeid){
        $showNotice=config('feedback.showNotice');
        return $this->where('delflag',0)
                    ->where('type_id',$typeid)
                    ->with(['type'])
                    ->orderBy('id','desc')
    				->paginate($showNotice);
    }
    /*get the showtop notice*/
    public function getShowtop($typeid){
        return $this->where('delflag',0)
                    ->where('type_id',$typeid)
                    ->where('showtop',1)
                    ->select(['title'])
                    ->orderBy('id','desc')
                    ->get();
    }
    /*get the select notice infomation*/
    public function getNoticeInfo($id){
        return $this->where('id',$id)
                    ->first();
    }
}
