<?php

namespace App\Utils;

use App\Models\ReferenceCount;
use phpDocumentor\Reflection\Type;

class Util
{
    function getReferenceCount(string $type, $schoolId)
    {
        $ref = ReferenceCount::where('type', $type)
            ->where('school_id', $schoolId)
            ->first();

        if (empty($ref)) {
            $ref = new ReferenceCount();
            $newVal = 1;
            $ref->school_id = $schoolId;
            $ref->type = $type;
        } else {
            $newVal = $ref->count + 1;
        }

        $ref->count = $newVal;

        $ref->save();

        return $newVal;
    }

    function generateInvoiceNumber(string $type, $schoolId, $prefix = '', $withYearPrefix = true)
    {
        $count = $this->getReferenceCount($type, $schoolId);

        if ($withYearPrefix) {
            $prefix = $prefix . '-' . now()->format('Y');
        }

        return $prefix . '-' . str_pad($count, 6, 0, STR_PAD_LEFT);
    }
}
