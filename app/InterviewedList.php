<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterviewedList extends Model
{
    public $fillable = [

        'companyId','registration_no','year','requirementId', 'datetime'
    ];
}
