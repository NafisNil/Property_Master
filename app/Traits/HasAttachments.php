<?php

namespace App\Traits;

use App\Models\Attachment;

trait HasAttachments
{
    function attachments(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(Attachment::class, 'attachable', 'attachable');
    }
}
