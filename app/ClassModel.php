<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'major_id', 'is_deleted'];
    protected $primaryKey = 'id';
    protected $table = 'class';
    public function Major()
    {
        return $this->belongsTo('App\Major', 'major_id', 'id');
    }
}
