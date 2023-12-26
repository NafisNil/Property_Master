<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationSession extends Model
{
    use HasFactory;

    protected $table = 'information_session';

    protected $fillable = [
        'date', 'school_id', 'information', 'departments', 'who_should_attend', 'location', 'time', 'booking', 'add_to_calender', 'contact', 'comments', 'status', 'created_by', 'updated_by'
    ];
}
