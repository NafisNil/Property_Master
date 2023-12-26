<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAssignerInEducationTeam extends Model
{
    use HasFactory;

    protected $table = 'task_assigner_in_education_team';

    protected $fillable = [
        'task', 'assign_to_user_id', 'assign_to_deadline', 'assign_to_comment', 'status', 'created_by',
        'created_at', 'updated_by'
    ];
}
