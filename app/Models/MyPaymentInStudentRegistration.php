<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyPaymentInStudentRegistration extends Model
{
    use HasFactory;

    protected $table = 'my_payment_in_student_registration';

    protected $fillable = [
        'total_payable', 'student_registration_id', 'payment_method', 'money_order', 'status', 'created_by',
        'created_at', 'updated_by'
    ];
}
