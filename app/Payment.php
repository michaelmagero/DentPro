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


    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
