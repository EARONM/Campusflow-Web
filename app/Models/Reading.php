<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    protected $table = 'resource_readings';

    protected $fillable = [
        'resource_meter_id',
        'user_id',
        'reading_value',
        'reading_date',
    ];

    public function meter()
    {
        return $this->belongsTo(
            ResourceMeter::class,
            'resource_meter_id'
        );
    }
}