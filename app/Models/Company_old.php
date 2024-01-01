<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, FilterBySchool;

    protected $guarded = ['id'];

    function contact(){
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    function address(){
        return $this->belongsTo(Address::class, 'address_id');
    }

}
