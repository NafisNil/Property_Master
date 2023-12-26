<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkerType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    static function getForDropdown()
    {
        return static::where('status', 1)
            ->pluck("name", 'id');
    }

}
