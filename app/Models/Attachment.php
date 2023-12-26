<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory, FilterBySchool;

    protected $fillable = [
        'file_name', 'file_path', 'mime_type',
        'disk', 'size', 'school_id', 'owner_id'
    ];

    public static function findByFileName($fileName)
    {
        return static::where('file_name', $fileName)
            ->firstOrFail();
    }

}
