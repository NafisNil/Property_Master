<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStock extends Model
{
    use HasFactory;

    protected $table = 'items_stock';

    protected $fillable = [
        'date', 'location', 'item', 'quantity', 'created_by', 'updated_by', 'status', 'comments'
    ];
}
