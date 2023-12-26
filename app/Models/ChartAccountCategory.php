<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartAccountCategory extends Model
{
    use HasFactory, FilterBySchool;

    protected $guarded = ['id'];

    function parent(){
        return $this->belongsTo(ChartAccountCategory::class, 'parent_id');
    }

}
