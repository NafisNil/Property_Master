<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateBuilder extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'fields' => 'array'
    ];

    function userType(){
        return $this->belongsTo(UserType::class, 'user_type_id');
    }

}
