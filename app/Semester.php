<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'start_date', 'end_date', 'is_deleted'];
    protected $primaryKey = 'id';
    protected $table = 'semester';
    public function ClassSection()
    {
        return $this->hasMany('App\ClassSection');
    }
}
