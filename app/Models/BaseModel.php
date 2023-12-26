<?php

namespace App\Models;

use App\Traits\FindByUniqueId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BaseModel extends Model
{
    use HasFactory, FindByUniqueId;

    public function save(array $options = [])
    {

        $user = Auth::user();
        //if school_id in fillable property then automatically fill it
        if (in_array('school_id', $this->fillable)) {
            $this->school_id = $user->school_id;
        }

        //if created_by exists then fill updated_by
        if (in_array('created_by', $this->fillable)) {
            if ($this->created_by) {
                if (in_array('updated_by', $this->fillable)) {
                    $this->updated_by = Auth::id();
                }
            } else {
                $this->created_by = Auth::id();
            }
        }
        return parent::save($options);
    }

    //get active only


}
