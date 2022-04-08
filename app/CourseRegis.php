<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseRegis extends Model
{
    public $timestamps = false;
    protected $fillable = ['user_id', 'class_section_id'];
    protected $primaryKey = 'id';
    protected $table = 'course';
    public function ClassSection()
    {
        return $this->belongsTo('App\ClassSection');
    }
}
