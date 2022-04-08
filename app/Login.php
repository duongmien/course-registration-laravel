<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'DoB', 'sex', 'username', 'password', 'role_id',  'user_tel', 'address', 'class_id'];
    protected $primaryKey = 'id';
    protected $table = 'user';
    
}
