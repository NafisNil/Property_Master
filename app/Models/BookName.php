<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookName extends Model
{
    use HasFactory;

    protected $table = 'book_name';

    protected $fillable = [
        'school_id', 'book_name', 'book_level', 'parent_book',
    ];

//    'school_id', 'notices_type', 'no', 'date', 'time', 'priority_levels', 'from_account_type', 'name', 'id_no', 'from_account_type', 'name', 'id_no', 'from_account_type', 'name', 'id_no', 'subject', 're_case_no', 'message', 'date', 'calendar', 'required_action', 'comment', 'status', 'created_by', 'created_at', 'updated_by'
}
