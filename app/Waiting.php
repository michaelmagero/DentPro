<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waiting extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dms_waiting';
    

    public function payments() {
    	return $this->hasMany('App\Patient');
    }

    public function appointments() {
        return $this->hasMany('App\Appointment');
    }

    public function patient()
    {
      return $this->belongsTo('App\Patient');
    }
}
