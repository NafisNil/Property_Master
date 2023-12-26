<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function itemDetail(){
        return $this->belongsTo(Item::class, 'item_id');
    }

    function additionDeductions(){
        return $this->hasMany(AdditionDeduction::class, 'item_id');
    }

}
