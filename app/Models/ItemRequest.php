<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemRequest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
