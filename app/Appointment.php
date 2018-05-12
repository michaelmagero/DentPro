<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */

    use SoftDeletes;
    
    protected $table = 'dms_appointments';
    

    public function patient() {
        return $this->hasOne('App\Patient');
    }

    
}
