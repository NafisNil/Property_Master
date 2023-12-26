<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMileageLog extends Model
{
    use HasFactory, FilterBySchool;

    protected $table = 'log_car_mileage';

    protected $guarded = ['id'];

}
