<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table= 'role';
	protected $primaryKey= 'id';
	protected $fillable = [
        'name',
        'description'
    ];

    public function user(){
    	return $this->hasMany('App\Models\User','role_id','id');
    }

    public function policies(){
    	return $this->belongsToMany('Policies','role_policies','role_id','policies_id');
    }

    //get role with users
    public function getWithUsers(){
    	return $this->where('delflag',0)
    				->with(['users'=>function($query){
    					$query->where('delflag',0);
    				}])
    				->get();
    }

    //get all roles
    public function getRoles(){
        return $this->where('delflag',0)->get();
    }

    //policies
    //get self fblist policy
    public function getSelfFblistsPolicy(){}

    //get all fblist policy
    public function getFblistsPolicy(){}

    //operate role policy
    public function operateRolePolicy(){}

    //operate user policy
    public function operateUserPolicy(){}
}
