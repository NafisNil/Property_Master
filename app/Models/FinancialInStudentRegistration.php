<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialInStudentRegistration extends Model
{
    use HasFactory;

    protected $table = 'financial_in_student_registration';

    protected $fillable = [
        'cost_type_id', 'student_registration_id', 'amount', 'due_date', 'status', 'created_by', 'created_at',
        'updated_by'
    ];
}
