<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedTask extends Model
{
    use HasFactory;

    protected $table = 'assigned_task';

    protected $fillable = [
        'school_id', 'task_no', 'task_date', 'account_type', 'from_user_id', 'to_user_id', 'cc_user_id',
        'priority_levels', 'subject',  'message', 'instruction', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
