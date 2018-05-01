<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //


    protected $table = 'users'; 

    
    public function patients() {
    	return $this->hasMany('App\Patient');
    }

    public function appointments() {
        return $this->hasMany('App\Appointment');
    }

    public function waiting() {
        return $this->hasMany('App\Waiting');
    }
}
