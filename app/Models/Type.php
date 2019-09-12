<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table= 'type';
	protected $primaryKey= 'id';
	protected $fillable = [
        'name',
        'delflag'
    ];
    public function fbcontents(){
        return $this->hasMany('App\Models\Fbcontent','type_id','id');
    }
    public function users(){
        return $this->belongsToMany('App\Models\users', 'type_users', 'type_id', 'user_id');
    }
}
