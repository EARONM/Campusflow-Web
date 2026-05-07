<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourceType extends Model
{
    protected $table = 'resource_types';

    public function resourceMeters()
    {
        return $this->hasMany(
            ResourceMeter::class,
            'resource_type_id'
        );
    }

}