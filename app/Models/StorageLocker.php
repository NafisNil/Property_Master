<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageLocker extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    static function getForDropdown(){
        return static::pluck('storage_name', 'id');
    }

    function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    function contact(){
        return $this->belongsTo(Contact::class, 'contact_id');
    }

}
