<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Policies extends Model
{
    protected $table= 'policies';
	protected $primaryKey= 'id';
	protected $fillable = [
        'name',
        'description'
    ];

    public function roles(){
    	return $this->belongsToMany('Role','role_policies','policies_id','role_id');
    }
}
