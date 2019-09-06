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
        'delflag'
    ];
    /*return all notice*/
    public function getNotice(){
    	$showNotice=config('feedback.showNotice');
    	return $this->where('delflag',0)
                    ->select(['id','title','showtop','created_at'])
                    ->orderBy('id','desc')
    				->paginate($showNotice);
    }
    /*get the showtop notice*/
    public function getShowtop(){
        return $this->where('delflag',0)
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
