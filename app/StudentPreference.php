<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentPreference extends Model
{
    public $fillable = [

        'registration_no','requirementId','selected'
    ];
}
