<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder;

class CampusScope
{
    public static function apply(
        Builder $query,
        $user,
        string $relationship = 'building'
    ) {
        // SuperAdmin sees all
        if (
            $user->role->name === 'SuperAdmin'
        ) {
            return $query;
        }

        // Campus filtering
        if ($user->campus_id) {

            $query->whereHas(
                $relationship,
                function ($q) use ($user) {

                    $q->where(
                        'campus_id',
                        $user->campus_id
                    );
                }
            );
        }

        return $query;
    }
}