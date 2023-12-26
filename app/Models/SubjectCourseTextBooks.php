<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectCourseTextBooks extends Model
{
    use HasFactory;

    protected $table = 'subject_course_text_books';

    protected $fillable = [
        'book_code', 'book_name', 'mandatory', 'optional', 'validation_date', 'subject_course', 'status', 'created_by',
        'created_at','updated_by',
    ];

}
