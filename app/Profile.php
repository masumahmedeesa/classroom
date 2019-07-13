<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{
    protected $table = 'infos';
    protected $fillable = ['designation','registration_no','myself','contact_number','photo','department','batch_id',
        'blood_group','date_of_birth'];

    //public $foreignKey = 'user_id';
    protected $primaryKey = 'registration_no';
    public $timestamps= true;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function enrolls(){
        return $this->hasMany('App\Enrollment');
    }

    public function attends(){
        return $this->hasMany('App\Enrollment');
    }

    public function performs(){
        return $this->hasMany('App\Performed');
    }
}
