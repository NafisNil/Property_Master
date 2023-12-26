<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, FilterBySchool;

    protected $guarded = ['id'];

    static function getForDropdown(){
        return static::pluck('project_no', 'id');
    }

    function durations(){
        return $this->hasMany(ProjectDuration::class, 'project_id');
    }

    function budgets(){
        return $this->hasMany(ProjectBudget::class, 'project_id');
    }

    function timelines(){
        return $this->hasMany(ProjectTimeline::class, 'project_id');
    }

    function payments(){
        return $this->hasMany(ProjectPayment::class, 'project_id');
    }

}
