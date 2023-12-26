<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReopeningInEducationTeam extends Model
{
    use HasFactory;

    protected $table = 'reopening_in_education_team';

    protected $fillable = [
        'reopening_position', 'reopening_user_id', 'reopening_email', 'reopening_message',
        'reopening_date', 'reopening_reason', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
