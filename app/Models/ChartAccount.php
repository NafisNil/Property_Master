<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartAccount extends Model
{
    use HasFactory, FilterBySchool;

    protected $guarded = ['id'];

    static function getForDropdown()
    {
        return static::pluck('name', 'id');
    }

    function category()
    {
        return $this->belongsTo(ChartAccountCategory::class, 'category_id');
    }

    function subCategory()
    {
        return $this->belongsTo(ChartAccountCategory::class, 'sub_category_id');
    }

    function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


}
