<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiveItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function detail()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    function receivedBy(){
        return $this->belongsTo(User::class, 'received_by');
    }

}
