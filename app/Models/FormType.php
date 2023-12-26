<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormType extends Model
{
    use HasFactory;

    protected $table = 'form_type';

    protected $fillable = [
        'school_id', 'form_name', 'form_level', 'parent_form',
    ];

//    'school_id', 'notices_type', 'no', 'date', 'time', 'priority_levels', 'from_account_type', 'name', 'id_no', 'from_account_type', 'name', 'id_no', 'from_account_type', 'name', 'id_no', 'subject', 're_case_no', 'message', 'date', 'calendar', 'required_action', 'comment', 'status', 'created_by', 'created_at', 'updated_by'

    public static function getForDropdown(){
        return static::pluck("form_name", 'id');
    }

}
