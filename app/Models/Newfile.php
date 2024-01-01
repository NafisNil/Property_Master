<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
class Newfile extends Model
{
    use HasFactory;
    protected $fillable = ['company', 'file_no', 'fiscal_year', 'last_modification', 'last_user'];
    /**
     * Get the user that owns the Newfile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'last_user');
    }

    /**
     * Get the user that owns the Newfile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function companies(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'id', 'company');
    }
}
