<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    static function getForDropdown(){
        return static::pluck('vehicle_no', 'id');
    }

    function type(){
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id');
    }

    function insurance(){
        return $this->belongsTo(VehicleInsurance::class, 'vehicle_insurance_id');
    }

}
