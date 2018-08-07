<?php

namespace App\Models;

//use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Models\Role','role_id');
    }
    // public function fbcontent_send(){
    //     return $this->hasMany('App\Models\Fbcontent','user_id_src','id');
    // }
    // public function fbcontent_recv(){
    //     return $this->hasMany('App\Models\Fbcontent','user_id_des','id');
    // }
    public function fbcontents(){
        return $this->hasMany('App\Models\Fbcontent','user_id','id');
    }
    public function adminFbcontents(){
        return $this->hasMany('App\Models\Fbcontent','admin_id','id');
    }
    public function fblist(){
        return $this->hasMany('App\Models\Fbcontent','user_id','id');
    }
    //get users with role
    public function getWithRole(){
        return $this->where('delflag',0)
                    ->with(['role'=>function($query){
                        $query->where('delflag',0);
                    }])
                    ->orderBy('role_id')
                    ->paginate(15);
    }

    //get the select user
    public function getUser($id){
        return $this->with(['role'=>function($query){
                        $query->where('delflag',0);
                    }])
                    ->first();
    }

    //get the select user's feedback infomation
    public function getWithFbinfo($id){
        return $this->where('id',$id)
                    ->with(['fbcontents.admin'=>function($query){
                        $query->where('delflag',0);
                    }])
                    ->first();
    }
}
