<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternList extends Model
{
    public $fillable = [

        'companyId','registration_no','year','requirementId','start_date','end_date'
    ];
}
