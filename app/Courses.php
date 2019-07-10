<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'wholeCourses';

    protected $fillable = ['sessionYear','courseName','courseCode','teacherName','credit','timeSpan'];
    public $primaryKey = 'cid';
    //public $primaryKey = 'courseCode';
    public $timestamps = true;

    public function enrolls(){
        return $this->hasMany('App\Enrollment');
    }
}
