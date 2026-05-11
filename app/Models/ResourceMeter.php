<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Building;
use App\Models\Reading;

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

    public function readings()
    {
        return $this->hasMany(
            Reading::class,
            'resource_meter_id'
        );
    }
}