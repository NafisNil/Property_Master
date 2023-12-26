<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountHolder extends Model
{
    use HasFactory, FilterBySchool;


    protected $guarded = ['id'];

    function add()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    function corporation()
    {
        return $this->belongsTo(Corporation::class, 'corporation_id');
    }

    function licenses()
    {
        return $this->belongsToMany(License::class, 'account_holder_licenses', 'account_holder_id', 'license_id');
    }

    function insurance()
    {
        return $this->belongsTo(Insurance::class, 'insurance_id');
    }

    //get account holder by type

    static function getByType($type)
    {
        return self::join('account_holder_types as ACT', 'ACT.id', '=', 'account_holders.account_holder_type_id')
            ->select('account_holders.id', 'account_holders.first_name', 'account_holders.last_name')
            ->where('ACT.slug', '=', $type)
            ->get();
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

}
