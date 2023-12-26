<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $table = 'user_type';

    protected $fillable = [
        'name', 'slug', 'public', 'status', 'created_by', 'updated_by'
    ];

    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }

    public static function getForDropdown()
    {
       return static::pluck('name', 'id');
    }

}
