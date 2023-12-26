<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramLength extends Model
{
    use HasFactory;
    protected $table = 'program_lengths';

    protected $fillable = [
        'name'
    ];
}
