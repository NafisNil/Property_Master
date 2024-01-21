<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remainder extends Model
{
    use HasFactory;
    protected $fillable = ['issued_by', 'subject', 'details', 'priority', 'location','time', 'action', 'due_date', 'receivers', 'status', 'post'];
}
