<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyRequirement extends Model
{
    public $fillable = [

        'companyId','requirementId','year','vacancies'
    ];
}
