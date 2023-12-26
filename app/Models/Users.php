<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'user_name', 'designation', 'email', 'mobile_phone', 'office_phone', 'password', 'school', 'address', 'user_name', 'user_type'
    ];
}
