<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table='attendance';
    protected $fillable = ['status'];
    public $primaryKey='id';

    public $timestamps=true;

    public function profiles(){
        $this->belongsTo('App\Profile');
    }
}
