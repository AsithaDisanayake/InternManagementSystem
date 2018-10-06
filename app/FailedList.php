<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FailedList extends Model
{
    public $fillable = [

        'companyId','registration_no','year'
    ];
}
