<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SafetySecurities extends Model
{
    use HasFactory;

    protected $table = 'safety_securities';

    protected $fillable = [
        'school_id', 'safety_item', 'quantity', 'serial_number', 'expiry_date', 'renew_date', 'inspection_cycle', 'inspection_due_on', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
