<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{


    protected $table = 'enrolls';
    //protected $fillable = ['registration_no'];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function profiles(){
        $this->belongsTo('App\Profile');
    }

        public function courses(){
        $this->belongsTo('App\Courses');
    }

}
