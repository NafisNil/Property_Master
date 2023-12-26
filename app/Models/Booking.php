<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function requester(){
        return $this->belongsTo(User::class, 'requester_id');
    }

    function participants(){
        return $this->hasMany(BookingParticipant::class, 'booking_id');
    }

    function charges(){
        return $this->hasMany(BookingCharge::class, 'booking_id');
    }

    function payment(){
        return $this->hasOne(BookingPayment::class, 'booking_id');
    }

}
