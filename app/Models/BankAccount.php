<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory, FilterBySchool;

    protected $guarded = ['id'];

    static function getForDropdown()
    {
        return static::pluck('name', 'id');
    }

    function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
