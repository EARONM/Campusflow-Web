<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourceMeter extends Model
{
    protected $table = 'resource_meters';

    public function resourceType()
    {
        return $this->belongsTo(
            ResourceType::class,
            'resource_type_id'
        );
    }
}