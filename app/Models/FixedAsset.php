<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedAsset extends Model
{
    use HasFactory, FilterBySchool;

    protected $guarded = ['id'];

    static function getForDropdown()
    {
        return static::pluck('asset_name', 'id');
    }

    function type()
    {
        return $this->belongsTo(FixedAssetType::class, 'asset_type_id');
    }

    function subType()
    {
        return $this->belongsTo(FixedAssetType::class, 'asset_sub_type_id');
    }

    function rooms(){
        return $this->belongsToMany(Room::class, 'room_assets', 'asset_id', 'room_id');
    }

}
