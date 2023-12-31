<?php

namespace App\Models;

use App\Models\Scopes\FilterBySchoolScope;
use App\Traits\AppendUnique;
use App\Traits\FindByUniqueId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory, AppendUnique, FindByUniqueId;

    protected $table = 'departments';

    protected $guarded = ['id'];

    static function booted()
    {
        parent::booted(); // TODO: Change the autogenerated stub
        static::addGlobalScope(new FilterBySchoolScope());
    }

    public static function getForDropdown()
    {
        return static::pluck('name', 'id');
    }

    function campus()
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }

}
