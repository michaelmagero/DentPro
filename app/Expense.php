<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //
    protected $table = 'dms_expenses';

    protected $fillable = ['description', 'amount'];
}
