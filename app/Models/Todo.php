<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = ['assigned_by','description', 'objectives', 'person', 'ch_name', 'ch_office', 'ch_cellphone', 'ch_email', 'priority','deadline', 'location', 'instruction', 'room_date_one', 'room_time_one', 'room_date_two', 'room_time_two', 'room_date_three', 'room_time_three'];
}
