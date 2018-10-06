<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceivedList extends Model
{
    public $fillable = [

        'companyId','registration_no','year'
    ];
}
