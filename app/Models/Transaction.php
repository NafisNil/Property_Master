<?php

namespace App\Models;

use App\Traits\HasAttachments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, HasAttachments;

    protected $guarded = ['id'];

    function items(){
        return $this->hasMany(TransactionItem::class, 'transaction_id');
    }

    function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }

    function accountHolder(){
        return $this->belongsTo(User::class, 'user_id');
    }

    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    function returned(){
        return $this->hasOne(Transaction::class, 'return_transaction_id');
    }

    function campus(){
        return $this->belongsTo(Campus::class, 'campus_id');
    }

    function taxes(){
        return $this->belongsToMany(Tax::class, 'transaction_taxes', 'transaction_id')
            ->withPivot(['percent', 'amount']);
    }

    function payments(){
        return $this->hasMany(Payment::class, 'transaction_id');
    }

    function receiveItems(){
        return $this->hasMany(ReceiveItem::class, 'transaction_id');
    }

}
