<?php

namespace App\Traits;

namespace App\Traits;

use Illuminate\Support\Str;

trait AppendUnique
{
    protected static function bootAppendUnique()
    {
        static::creating(function ($model) {
            $model->unique_id = Str::uuid()->toString();
        });
    }
}
