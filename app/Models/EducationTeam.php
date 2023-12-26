<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationTeam extends Model
{
    use HasFactory;

    protected $table = 'education_team';

    protected $fillable = [
        'school_id', 'team_no', 'creation_date', 'net_operating_days', 'current_status',
        'team_group', 'goal', 'team_type', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
