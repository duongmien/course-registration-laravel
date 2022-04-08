<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Faculty;

class Major extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'faculty_id', 'is_deleted'];
    protected $primaryKey = 'id';
    protected $table = 'major';
    public function Faculty()
    {
        return $this->belongsTo('App\Faculty', 'faculty_id', 'id');
    }
    public function Class()
    {
        return $this->hasMany('App\Class');
    }
    public function Course()
    {
        return $this->hasMany('App\Course', 'course_id', 'id');
    }
}
