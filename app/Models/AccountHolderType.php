<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountHolderType extends Model
{
    use HasFactory, FilterBySchool;
}
