<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */

     protected $fillable = ['firstname', 'middlename', 'lastname', 'sex', 'dob', 'payment_mode',
'occupation', 'postal_address', 'email', 'phone_number', 'emergency_contact_name', 'emergency_contact_address',
'emergency_contact_phone_number', 'emergency_contact_relationship', 'patient_id', 'amount_allocated', 'doctor'];

    use SoftDeletes;

    protected $table = 'dms_patients';   
    
    protected $dates = ['deleted_at'];

    


    public function payments() {
    	return $this->hasMany('App\Payment');
    }

    public function appointments() {
        return $this->hasMany('App\Appointment');
    }

    public function waitings() {
        return $this->belongsToMany('App\Waiting');
    }
}
