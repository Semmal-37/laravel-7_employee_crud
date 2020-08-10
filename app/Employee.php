<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'firstname', 'lastname','date_of_birth','education_qualification','address','email','phone','photo','resume'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
