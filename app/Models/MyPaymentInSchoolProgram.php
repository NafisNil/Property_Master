<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyPaymentInSchoolProgram extends Model
{
    use HasFactory;

    protected $table = 'my_payment_in_school_program';

    protected $fillable = [
        'total_payable', 'payment_method', 'money_order', 'school_program', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
