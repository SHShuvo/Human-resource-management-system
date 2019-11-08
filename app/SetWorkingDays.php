<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetWorkingDays extends Model
{
    protected $fillable = [
        'saturday','sunday','monday','tuesday','wednesday','thursday','friday'
    ];
}
