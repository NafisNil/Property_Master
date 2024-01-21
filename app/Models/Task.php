<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['posted_date', 'assigned_by','priority', 'subject', 'details', 'required_action', 'due_date', 'receivers', 'acknowledge'];
}
