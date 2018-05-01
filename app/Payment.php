<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use \Carbon\Carbon;

class Payment extends Model
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dms_payments';

    protected $dates = ['next_appointment','invoice_date','created_at','updated_at'];

    public function getMyDateFormat()
    {
        return \Carbon\Carbon::createFromFormat($this->attributes['next_appointment'], 'd/m/Y')->toDateTimeString();
    }


    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
