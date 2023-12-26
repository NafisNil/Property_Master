<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyOption extends Model
{
    use HasFactory;

    protected $table = 'study_option';

    protected $fillable = [
        'name'
    ];

    static public function getForDropdown()
    {
        return static::pluck('name', 'id');
    }
}
