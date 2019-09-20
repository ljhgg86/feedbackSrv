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
        return $this->belongsToMany('App\Models\User', 'type_users','type_id','user_id');
    }
    public function notices(){
        return $this->hasMany('App\Models\Notice','type_id','id');
    }
    public function getTypes(){
        return $this->where('delflag',0)
                    ->get();
    }
}
