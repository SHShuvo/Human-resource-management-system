<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $fillable = [
        'name', 'logo', 'email','address','city','country','phone','website'
    ];
}
