<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'firstName','lastName','fatherName','birthDate', 'gender','maritalStatus','photo','address','city',
        'country','email','phone','employeeId','department','designation','joinDate'
    ];
}
