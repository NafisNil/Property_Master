<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingStallAllocation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function stall(){
        return $this->belongsTo(ParkingStall::class, 'stall_id');
    }

    function parker(){
        return $this->belongsTo(Parker::class, 'parker_id');
    }

    function parkerType(){
        return $this->belongsTo(ParkerType::class, 'parker_type_id');
    }

    function vehicle(){
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

}
