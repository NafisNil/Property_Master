<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassFixedAssets extends Model
{
    use HasFactory;

    protected $table = 'fixed_assets';

    protected $fillable = [
        'asset_name'
    ];
}
