<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolMessage extends Model
{
    use HasFactory;

    protected $table = 'school_message';

    protected $guarded = ['id'];

    function fromUserType()
    {
        return $this->belongsTo(UserType::class, 'from_user_type_id');
    }

    function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    function toUserType()
    {
        return $this->belongsTo(UserType::class, 'to_user_type_id');
    }

    function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    function ccUserType()
    {
        return $this->belongsTo(UserType::class, 'cc_user_type_id');
    }

    function ccUser()
    {
        return $this->belongsTo(User::class, 'cc_user_id');
    }

}
