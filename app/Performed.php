<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performed extends Model
{
    protected $table='performance';
    protected $fillable = ['obtainedMarks','examType'];
    public $primaryKey='id';

    public $timestamps=true;

    public function profiles(){
        $this->belongsTo('App\Profile');
    }
}
