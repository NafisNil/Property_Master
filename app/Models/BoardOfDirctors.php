<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardOfDirctors extends Model
{
    use HasFactory;

    protected $table = 'board_of_directors';

    protected $fillable = [
        'staff_id', 'school_id', 'name', 'nick_name', 'department', 'country', 'educational_level', 'university_name', 'years_in_field', 'phone_office', 'phone_cell', 'email', 'fax', 'photo', 'dirctor_message', 'status', 'created_by', 'updated_by'
    ];
}
