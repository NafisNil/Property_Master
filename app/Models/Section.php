<?php

namespace App\Models;

use App\Traits\AppendUnique;
use App\Traits\FindByUniqueId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory, AppendUnique, FindByUniqueId;

    protected $fillable = ['name', 'school_id', 'status'];

    public static function getForDropdown(){
        return static::pluck('name', 'id');
    }

}
