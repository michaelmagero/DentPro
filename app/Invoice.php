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

    protected $fillable = ['invoice_no', 'payment_id', 'patient_id', 'insurance_provider', 'procedure', 'amount', 'total'];

    public function payment()
    {
        return $this->belongsTo('App\Payment');
    }



    
}
