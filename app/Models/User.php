<?php

namespace App\Models;

//use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    //use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nickname','avatar','role_id'
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
    public function fbcontents(){
        return $this->hasMany('App\Models\Fbcontent','user_id','id');
    }
    public function adminFbcontents(){
        return $this->hasMany('App\Models\Fbcontent','admin_id','id');
    }
    public function fblist(){
        return $this->hasMany('App\Models\Fbcontent','user_id','id');
    }
    public function types(){
        return $this->belongsToMany('App\Models\types', 'type_users', 'user_id', 'type_id');
    }

    //is superadmin
    public function isSuperAdmin(){
        return $this->role()->first()->name == "superadmin";
    }
    public function hasPolicy($policy){
        return in_array($policy,$this->role()->policies()->get());
    }
    //get users with role
    public function getWithRole(){
        return $this->where('delflag',0)
                    ->whereIn('role_id',[3,4])
                    ->with(['role'=>function($query){
                        $query->where('delflag',0);
                    }])
                    ->orderBy('role_id')
                    ->paginate(15);
    }

    //get users with role
    public function getAdminWithRole(){
        return $this->where('delflag',0)
                    ->whereIn('role_id',[2,3])
                    ->with(['role'=>function($query){
                        $query->where('delflag',0);
                    }])
                    ->orderBy('role_id')
                    ->paginate(15);
    }

    //get the select user
    public function getUser($id){
        return $this->where('id',$id)
                    ->with(['role'=>function($query){
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

    //search user by the name
    public function searchByName($name){
        return $this->where('name',$name)->first();
    }

    //get user list with feedback by datetime desc
    public function getUsersWithFbs($page){
        $showByAdmin = config('feedback.showByAdmin');
        $fblists=DB::table('users')
                ->join('fbcontent','users.id','=','fbcontent.user_id')
                ->where('fbcontent.admin_id',0)
                ->where('fbcontent.delflag',0)
                ->select(DB::raw('MAX(fbcontent.id) as id,count(if(readflag=0 and admin_id=0,true,null)) as count, user_id,name,nickname,fbcontent.content,fbcontent.imgflag,fbcontent.videoflag,fbcontent.created_at'))
                ->groupBy('user_id')
                ->orderBy('id','desc')
                ->skip($page*$showByAdmin)
                ->take($showByAdmin)
                ->get();
        return $fblists;
    }

    //get user list with feedback by datetime desc where has the keyword
    public function searchWithFbs($keyword,$page){
        $showByAdmin = config('feedback.showByAdmin');
        $fblists=DB::table('users')
                ->join('fbcontent','users.id','=','fbcontent.user_id')
                ->where(function($query) use($keyword){
                    $query->where('users.name','like','%'.$keyword.'%')
                        ->orWhere('users.nickname','like','%'.$keyword.'%')
                        ->orWhere(function($childQuery) use($keyword){
                            $childQuery->where('fbcontent.imgflag',0)
                                ->where('fbcontent.content','like','%'.$keyword.'%');
                        });
                })
                ->select(DB::raw('MAX(fbcontent.id) as id,count(if(readflag=0 and admin_id=0,true,null)) as count, user_id,name,nickname,fbcontent.content,fbcontent.imgflag,fbcontent.videoflag,fbcontent.created_at'))
                ->groupBy('user_id')
                ->orderBy('id','desc')
                ->skip($page*$showByAdmin)
                ->take($showByAdmin)
                ->get();
        return $fblists;
    }

    //get counts of reply by admin
    public function getReplyCounts($name){
        return $this->where('name',$name)
                    ->withCount(['fbcontents' => function($query){
                        $query->where('admin_id','<>',0)
                            ->where('readflag',0)
                            ->where('delflag',0);
                    }])
                    ->get();
    }
}
