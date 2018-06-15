<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    //
    protected $table = 'dms_procedures';   

    protected $fillable = ['procedure', 'amount'];
}
