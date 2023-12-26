<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetName extends Model
{
    use HasFactory;

    protected $table = 'asset_name';

    protected $fillable = [
        'name'
    ];
}
