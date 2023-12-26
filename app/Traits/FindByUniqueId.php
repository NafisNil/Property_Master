<?php

namespace App\Traits;

trait FindByUniqueId
{
    public static function findByUniqueId($uniqueId)
    {
        return static::where('unique_id', $uniqueId)->first();
    }

    public static function findOrFailByUniqueId($uniqueId)
    {
        return static::where('unique_id', $uniqueId)
            ->firstOrFail();
    }


}
