<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dms_appointments';


    
    
    public function patient()
    {
        return $this->belongsTo('App\Patient','patient_id');
    }



    
}
