<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PDC extends Model
{
    public $fillable = [

        'username','fullName','email','address', 'contactNo'
    ];
}
