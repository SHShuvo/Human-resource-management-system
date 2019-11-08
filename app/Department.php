<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department','designation'
    ];

    protected $casts = [
        'designation' => 'array', // Will convarted to (Array)
    ];
}
