<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory, FilterBySchool;

    protected $guarded = ['id'];

    function type()
    {
        return $this->belongsTo(ItemType::class, 'type_id');
    }

    static function getForDropdown()
    {
        return static::pluck('name', 'id');
    }
}
