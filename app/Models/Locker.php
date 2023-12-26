<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function storage(){
        return $this->belongsTo(StorageLocker::class, 'storage_id');
    }

}
