<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = [
        'campus_id',
        'name',
        'floor_count',
    ];

    public function campus()
    {
        return $this->belongsTo(
            Campus::class
        );
    }

    public function resourceMeters()
    {
        return $this->hasMany(
            ResourceMeter::class
        );
    }
}