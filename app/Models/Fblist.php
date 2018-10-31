<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fblist extends Model
{
    protected $table= 'fblist';
    protected $fillable = [
        'title',
        'user_id',
        'replyflag',
        'delflag'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function fbcontents(){
    	return $this->hasMany('App\Models\Fbcontent','fblist_id','id');
    }

    //get fblists
    public function getWithUser(){
    	return $this->where('delflag',0)
    				->with([
    					'user'=>function($query){
    						$query->where('delflag',0);
    					}
    				])
    				->orderBy('updated_at','desc')
    				->orderBy('id','desc')
    				->paginate(15);
    }

    //get fbcontent with the select fblist id
    public function getWithContent($id){
    	return $this->where('id',$id)
    				->with([
    					'fbcontents'=>function($query){
    						$query->where('delflag',0);
    					}
    				])
    				->first();
    }

    //update fblist
    public function updateFblist($id){
    	$fblist=$this->find($id);
    	$fblist->replyflag=$fblist->replyflag?0:1;
    	$fblist->save();
    }
}
