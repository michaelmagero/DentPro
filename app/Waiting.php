<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Waiting extends Model
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
    protected $table = 'dms_waitings';

    protected $dates = ['deleted_at'];

    use SoftDeletes;

    public function patient(){
      return $this->hasMany('App\Patient');
    }
    
}
