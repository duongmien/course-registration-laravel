<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'major_id', 'qualtity', 'is_deleted'];
    protected $primaryKey = 'id';
    protected $table = 'course';
    public function Major()
    {
        return $this->belongsTo('App\Major', 'major_id', 'id');
    }
    public function ClassSection()
    {
        return $this->hasMany('App\ClassSection');
    }
}
