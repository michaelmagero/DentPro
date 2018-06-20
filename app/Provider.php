<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    //
    protected $table = 'dms_insurance_providers';  

    protected $fillable = ['name', 'phone_one', 'phone_two', 'phone_three', 'postal_address', 'email', 'physical_location'];
}
