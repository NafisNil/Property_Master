<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolAnnouncement extends Model
{
    use HasFactory;

    protected $table = 'school_announcement';

    protected $fillable = [
        'school_id', 'event_id', 'post_date_time', 'from_date_time', 'to_date_time', 'expaire_date_time',
        'title', 'post_in_edudip', 'post_in_admdip', 'post_in_accounthold', 'comments', 'status',
        'created_by', 'created_at', 'updated_by'
    ];


    public function announcement_title() {

        return $this->belongsTo(Announcement::class, 'title');
    }
    public function educational_departments() {

        return $this->belongsTo(Department::class, 'post_in_edudip');
    }
    public function administrative_departments()
    {
        return $this->belongsTo(Department::class, 'post_in_admdip');
    }
    public function Usertype_account_holders()
    {
        return $this->belongsTo(UserType::class, 'post_in_accounthold');
    }

}
