<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'module',
        'source_name',
        'status',
        'remarks',
    ];
}