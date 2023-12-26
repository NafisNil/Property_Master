<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomSeatOccupant extends Model
{
    use HasFactory;

    protected $table = 'calssroom_seat_occupant';

    protected $fillable = [
        'name'
    ];
}
