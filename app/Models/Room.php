<?php

namespace App\Models;

use App\Traits\HasAttachments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory, HasAttachments;

    protected $guarded = ['id'];

    static function getForDropdown()
    {
        return static::pluck('name', 'id');
    }

    function type()
    {
        return $this->belongsTo(RoomType::class, 'type_id');
    }

    public function subType()
    {
        return $this->belongsTo(RoomType::class, 'sub_type_id');
    }

    public function assets()
    {
        return $this->belongsToMany(FixedAsset::class, 'room_assets', 'room_id', 'asset_id')
            ->withPivot(['location', 'type']);
    }

}
