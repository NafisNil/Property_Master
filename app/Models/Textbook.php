<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Textbook extends Model
{
    use HasFactory, FilterBySchool;

    protected $table = 'textbooks';

    protected $fillable = [
        'school_id', 'book_code', 'book_name', 'author_name', 'isbn_no', 'copyright', 'publisher',
        'edition_no', 'program', 'term', 'semester', 'subject_course', 'status', 'created_by',
        'created_at', 'updated_by'
    ];

    static function getForDropdown(){
        return static::pluck('book_name', 'id');
    }

}
