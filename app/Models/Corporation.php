<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corporation extends Model
{
    use HasFactory, FilterBySchool;

    protected $guarded = ['id'];

    function address(){
        return $this->belongsTo(Address::class, 'address_id');
    }

    function contact(){
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    function license(){
        return $this->belongsTo(License::class, 'business_license_id');
    }

}
