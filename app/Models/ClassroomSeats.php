<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomSeats extends Model {

    use HasFactory;

    protected $table = 'classroom_seats';
    protected $fillable = [
        'seat_no', 'occupant', 'id_no', 'first_name', 'middle_name', 'last_name', 'photo', 'ph_no', 'email',
        'student_type', 'seat_status','comments', 'status', 'created_by', 'created_at', 'updated_by'
    ];
    
//    seats=> 'school_id', 'seat_no', 'occupant', 'id_no', 'first_name', 'middle_name', 'last_name', 'ph_no', 'email', 'student_type', 'seat_status', 'comments', 'photo', 'status', 'created_by', 'created_at', 'updated_by'
//    safety_security=> 'safety_item', 'campus', 'qty', 'serial_no', 'expiry_date', 'renew_date', 'inspection_cycle', 'inspection_due_on', 'status', 'created_by', 'created_at', 'updated_by'

}
