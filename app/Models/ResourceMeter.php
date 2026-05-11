<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Building;

class ResourceMeter extends Model
{
    protected $fillable = [
        'building_id',
        'resource_type_id',
        'meter_code',
        'location',
    ];

    public function building()
    {
        return $this->belongsTo(
            Building::class
        );
    }

    public function resourceType()
    {
        return $this->belongsTo(
            ResourceType::class,
            'resource_type_id'
        );
    }
}