<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetHoliday extends Model
{
    protected $fillable = [
        'holiday_name','start_date','end_date'
    ];
}
