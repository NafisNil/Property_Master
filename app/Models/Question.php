<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['school_id', 'date', 'title', 'description', 'asked_by', 'asked_to', 'status'];

    function askedBy()
    {
        return $this->belongsTo(User::class, 'asked_by');
    }

    function askedTo()
    {
        return $this->belongsTo(User::class, 'asked_to');
    }

    function answers(){
        return $this->hasMany(Answer::class, 'question_id');
    }

}
