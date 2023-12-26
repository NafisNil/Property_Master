<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memorandum extends Model
{
    use HasFactory, FilterBySchool;

    protected $table = 'memorandum';

    protected $guarded = ['id'];

    public function from() {
        return $this->belongsTo(MemorandumRecipient::class, 'from_id');
    }
    public function to() {
        return $this->belongsTo(MemorandumRecipient::class, 'to_id');
    }
     public function cc() {
        return $this->belongsTo(MemorandumRecipient::class, 'cc_id');
    }

    public function recipients(){
        return $this->hasMany(MemorandumRecipient::class, 'memorandum_id');
    }


}
