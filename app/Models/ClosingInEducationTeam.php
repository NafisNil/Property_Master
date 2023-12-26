<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClosingInEducationTeam extends Model
{
    use HasFactory;

    protected $table = 'closing_in_education_team';

    protected $fillable = [
        'closing_position', 'closing_user_id', 'closing_email', 'closing_message',
        'closing_date', 'closing_reason', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
