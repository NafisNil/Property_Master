<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentType extends Model
{
    use HasFactory;
    protected $table = 'student_types';

    protected $fillable = [
        'name'
    ];

    static function getForDropdown(){
        return static::pluck('name', 'id');
    }
}
