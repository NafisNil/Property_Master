<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recurring;
use App\Models\Stype;
class Scheduleop extends Model
{
    use HasFactory;
    protected $fillable = ['type_id', 'description', 'amount', 'cycle_id', 'property_id', 'start_date', 'end_date', 'next_one', 'instruction', 'contact_person', 'status', 'post'];

    /**
     * Get the user that owns the Scheduleop
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recurring_cycle()
    {
        return $this->belongsTo(Recurring::class, 'cycle_id', 'id');
    }

    public function stype()
    {
        return $this->belongsTo(Stype::class, 'type_id', 'id');
    }
}
