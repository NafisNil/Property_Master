<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory, FilterBySchool;

    protected $guarded = ['id'];

    function type()
    {
        return $this->belongsTo(TaxType::class, 'tax_type_id');
    }

}
