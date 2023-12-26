<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingStall extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function lot(){
        return $this->belongsTo(ParkingLot::class, 'lot_id');
    }

    function parkerType(){
        return $this->belongsTo(ParkerType::class, 'parker_type_id');
    }

}
