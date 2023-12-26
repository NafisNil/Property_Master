<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMethod extends Model
{
    use HasFactory;

    protected $table = 'delivery_method';

    protected $fillable = [
        'name'
    ];

    static function getForDropdown(){
        return static::pluck('name', 'id');
    }

}
