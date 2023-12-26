<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantsAvailabilityAndContactsInEducationTeam extends Model
{
    use HasFactory;

    protected $table = 'participants_availability_and_contacts_in_education_team';

    protected $fillable = [
        'participants_position', 'participants_user_id', 'availability_date_day', 'participants_phone',
        'participants_email', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
