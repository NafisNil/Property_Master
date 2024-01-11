<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = ['issued_by', 'priority', 'subject','details','action','due_date','receivers','acknowledge'];
}
