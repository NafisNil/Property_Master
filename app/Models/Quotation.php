<?php

namespace App\Models;

use App\Traits\HasAttachments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Quotation extends Model
{
    use HasFactory, HasAttachments;

    protected $guarded = ['id'];

    function items()
    {
        return $this->hasMany(QuotationItem::class, 'quotation_id');
    }

    function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    function accountHolder()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    function additionDeductions()
    {
        return $this->hasMany(AdditionDeduction::class, 'quotation_id');
    }

    function discounts(){
        return $this->hasMany(QuotationDiscount::class, 'quotation_id');
    }

}
