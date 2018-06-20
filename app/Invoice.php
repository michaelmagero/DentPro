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
    protected $table = 'dms_invoices';

    public function payment()
    {
        return $this->belongsTo('App\Payment');
    }



    
}
