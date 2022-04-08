<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersTest extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at'];
    protected $primaryKey = 'id';
    protected $table = 'users';
}
