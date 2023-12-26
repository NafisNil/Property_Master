<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolCampus extends Model
{
    use HasFactory;

    protected $table = 'campus';

    static function getForDropdown(){
        return static::pluck('name', 'id');
    }

    protected $fillable = [
        'school_id', 'campus_code', 'name', 'address', 'phone_office', 'email', 'fax', 'cost_center', 'income_center', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
