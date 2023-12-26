<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingRate extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function type(){
        return $this->belongsTo(ParkerType::class, 'parker_type_id');
    }

}
