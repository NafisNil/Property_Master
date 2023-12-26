<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolNotice extends Model
{
    use HasFactory, FilterBySchool;

    protected $table = 'school_notices';

    protected $fillable = [
        'school_id', 'notice_type', 'notice_no', 'notice_date_time', 'priority_levels', 'account_type',
        'from_user_id', 'to_user_id', 'cc_user_id', 'subject', 're_case_no', 'message', 'calendar_date',
        'calendar', 'required_action', 'comments', 'prepare_by', 'approve_by', 'publish_date', 'status',
        'created_by', 'created_at', 'updated_by'
    ];

//    'school_id', 'notices_type', 'no', 'date', 'time', 'priority_levels', 'from_account_type', 'name', 'id_no', 'from_account_type', 'name', 'id_no', 'from_account_type', 'name', 'id_no', 'subject', 're_case_no', 'message', 'date', 'calendar', 'required_action', 'comment', 'status', 'created_by', 'created_at', 'updated_by'
}
