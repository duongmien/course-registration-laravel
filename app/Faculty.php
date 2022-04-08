<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    protected $primaryKey = 'id';
    protected $table = 'faculty';
    public function Major()
    {
        return $this->hasMany('App\Major', null, 'id');
    }
    public function User()
    {
        return $this->belongsToMany('App\User', 'faculty_id', 'id');
    }
}
