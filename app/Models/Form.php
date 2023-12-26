<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory, FilterBySchool;

    protected $table = 'school_form';

    protected $fillable = [
        'school_id', 'form_type_id', 'form_no', 'date',
        'from_account_type_id', 'to_account_type_id',
        'from_user_id', 'to_user_id',
        'priority_level', 'subject', 'message', 'status', 'created_by', 'created_at',
        'updated_by'
    ];

    function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    function type(){
        return $this->belongsTo(FormType::class, 'form_type_id');
    }

}
