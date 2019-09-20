<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_users extends Model
{
    protected $table= 'type_users';
	protected $primaryKey= 'id';
	protected $fillable = [
        'type_id',
        'user_id'
    ];
}
