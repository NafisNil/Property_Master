<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequeAndBankingLog extends Model
{
    use HasFactory;

    protected $table = 'log_cheque_and_banking';

    protected $guarded = ['id'];

}
