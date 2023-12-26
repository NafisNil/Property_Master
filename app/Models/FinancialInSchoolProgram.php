<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialInSchoolProgram extends Model
{
    use HasFactory;

    protected $table = 'financial_in_school_program';

    protected $fillable = [
        'cost_type', 'amount', 'due_date', 'school_program', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
