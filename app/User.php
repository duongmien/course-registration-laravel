<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    protected $fillable = ['name', 'DoB', 'sex', 'username', 'password', 'address', 'role_id', 'class_id'];
    protected $primaryKey = 'id';
    protected $table = 'user';
}
