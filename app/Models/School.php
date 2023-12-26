<?php

namespace App\Models;

use App\Traits\HasAttachments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory, HasAttachments;

    protected $table = 'school';

    protected $guarded = ['id'];

    function educationLevels(){
        return $this->belongsToMany(EducationLevel::class, 'school_education_levels', 'school_id', 'education_level_id')
            ->withTimestamps();
    }

    function authorizedBy(){
        return $this->belongsTo(User::class, 'authorized_by');
    }

    function address(){
        return $this->belongsTo(Address::class, 'address_id');
    }

    function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    function contacts(){
        return $this->hasMany(Contact::class, 'school_id');
    }

    function levels(){
        return $this->belongsToMany(EducationLevel::class, 'school_education_levels', 'school_id');
    }


}
