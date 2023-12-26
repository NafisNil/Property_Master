<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountTransaction extends Model
{
    use HasFactory;
    protected $guarded= ['id'];

    function bankAccount(){
        return $this->belongsTo(BankAccount::class, 'account_id');
    }

}
