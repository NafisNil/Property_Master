<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;
    protected $fillable = ['reported_by', 'time', 'complain_type', 'desc','happened_before','people','receivers', 'acknowledge', 'status', 'post'];
}
