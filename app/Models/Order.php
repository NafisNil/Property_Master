<?php

namespace App\Models;

use App\Traits\HasAttachments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, HasAttachments;

    protected $guarded = ['id'];

    function offer(){
        return $this->belongsTo(Offer::class, 'offer_id');
    }

    function items(){
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
