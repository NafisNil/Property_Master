<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory, FilterBySchool;

    protected $guarded = ['id'];

}
