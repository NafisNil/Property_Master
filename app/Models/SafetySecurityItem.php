<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SafetySecurityItem extends Model
{
    use HasFactory;

    protected $table = 'safety_security_item';

    protected $fillable = [
        'name'
    ];
}
