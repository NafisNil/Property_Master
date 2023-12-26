<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parker extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function address(){
        return $this->belongsTo(Address::class, 'address_id');
    }

    function contact(){
        return $this->belongsTo(Contact::class, 'contact_id');
    }

}
