<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatchEnroll extends Model
{
    public $fillable = [

        'registration_no', 'name', 'email','batch'
    ];
}
