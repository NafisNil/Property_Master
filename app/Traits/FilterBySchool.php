<?php

namespace App\Traits;

use App\Models\Scopes\FilterBySchoolScope;

trait FilterBySchool
{
    /**
     * Indicates if the model is currently force deleting.
     *
     * @var bool
     */
    protected $forceDeleting = false;

    /**
     * Boot the soft deleting trait for a model.
     *
     * @return void
     */
    public static function bootFilterBySchool()
    {
        static::addGlobalScope(new FilterBySchoolScope());
    }

    /**
     * Initialize the soft deleting trait for an instance.
     *
     * @return void
     */
    public function initializeFilterBySchool()
    {

    }

}

