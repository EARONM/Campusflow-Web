<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }
}
