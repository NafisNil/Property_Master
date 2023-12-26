<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolInformation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    static function findByType($type){
        return self::where('type', $type)->first();
    }
}
