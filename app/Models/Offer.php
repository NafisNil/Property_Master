<?php

namespace App\Models;

use App\Traits\HasAttachments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory, HasAttachments;

    protected $guarded = ['id'];

    function items()
    {
        return $this->hasMany(OfferItem::class, 'offer_id');
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

    function discounts(){
        return $this->hasMany(OfferDiscount::class, 'offer_id');
    }

}
