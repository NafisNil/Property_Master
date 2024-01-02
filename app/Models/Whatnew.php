<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whatnew extends Model
{
    use HasFactory;
    protected $fillable = ['issued_by', 'subject','details','receivers', 'acknowledge', 'status', 'post'];
}
