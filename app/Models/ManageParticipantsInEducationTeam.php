<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageParticipantsInEducationTeam extends Model
{
    use HasFactory;

    protected $table = 'manage_participants_in_education_team';

    protected $fillable = [
        'members', 'manage_user_id', 'invitation_date', 'invitation_message', 'invitation_action', 'manage_status',
        'status', 'created_by', 'created_at', 'updated_by'
    ];
}
