<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSection extends Model
{
    public $timestamps = false;
    protected $fillable = ['quantity', 'name_teacher', 'classroom', 'start_date', 'day', 'period', 'semester_id', 'course_id'];
    protected $primaryKey = 'id';
    protected $table = 'class_section';
    public function Course()
    {
        return $this->belongsTo('App\Course');
    }
    public function Semester()
    {
        return $this->belongsTo('App\Semester');
    }
    public function CourseRegis()
    {
        return $this->hasMany('App\CourseRegis');
    }
}
