<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = [

        'user_id',
        'title',
        'message',
        'is_read',
        'status',
        'resource_meter_id',
        'severity',
    ];
}