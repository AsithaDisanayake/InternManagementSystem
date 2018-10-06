<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewRequirement extends Model
{
    public $fillable = [

        'companyId','requirementId','year','vacancies'
    ];
}
