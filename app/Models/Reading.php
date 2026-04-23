<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    protected $fillable = [
        'module',
        'source_name',
        'reading',
        'remarks',
        'photo',
        'user_id',
    ];
}