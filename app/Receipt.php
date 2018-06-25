<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    //
    protected $table = 'dms_receipts';
    
    protected $fillable = ['receipt_no', 'payment_id', 'patient_id', 'procedure', 'amount', 'total'];

    public function payment()
    {
        return $this->belongsTo('App\Payment');
    }
}
