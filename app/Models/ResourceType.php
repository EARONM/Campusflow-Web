<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourceType extends Model
{
    protected $fillable = [
        'name',
    ];

    public function resourceMeters()
    {
        return $this->hasMany(
            ResourceMeter::class
        );
    }
}