<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Complaintype;
class Complain extends Model
{
    use HasFactory;
    protected $fillable = ['reported_by', 'time', 'complain_type', 'desc','happened_before','people','receivers', 'acknowledge', 'status', 'post'];

    /**
     * Get the user that owns the Complain
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function complaintype()
    {
        return $this->belongsTo(Complaintype::class, 'complain_type', 'id');
    }
}
