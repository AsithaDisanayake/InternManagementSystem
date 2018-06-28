<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $fillable = [

        'registration_no','indexNo','firstName','lastName', 'nameWithInit','gender','nic', 'email','address','contactNo','profilePicture','cv'
    ];
}
