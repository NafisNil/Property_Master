<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    static function getForDropdown()
    {
        return static::where("status", 1)
            ->orderBy('name')
            ->pluck('name', 'id');
    }

    function parent()
    {
        return $this->belongsTo(FeeCategory::class, 'parent_id');
    }

}
