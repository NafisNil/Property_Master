<?php

namespace App\Models;

use App\Models\Scopes\FilterBySchoolScope;
use App\Traits\HasAttachments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasAttachments;

    public $timestamp = true;

    public $guarded = ['id'];

    private static $genders = [
        'male' => 'Male',
        'female' => 'Female',
        'other' => 'Other',
    ];

    protected $appends = ['full_name', 'image_url'];

    public function getAuthPassword()
    {
        return $this->password;
    }

    function add()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    /*function emergencyContact()
    {
        return $this->belongsTo(EmergencyContact::class, 'emergency_contact_id');
    }*/

    function corporation()
    {
        return $this->belongsTo(Corporation::class, 'corporation_id');
    }

    function licenses()
    {
        return $this->belongsToMany(License::class, 'account_holder_licenses', 'account_holder_id', 'license_id');
    }

    function insurance()
    {
        return $this->belongsTo(Insurance::class, 'insurance_id');
    }

    function type()
    {
        return $this->belongsTo(UserType::class, 'user_type');
    }

    static function getByType($type)
    {
        return self::whereHas('type', function ($query) use ($type) {
            $query->where('slug', $type);
        })->get();
    }

    function scopeWhereUserType($query, $type)
    {
        $query->whereHas('type', function ($query) use ($type) {
            $query->where('slug', $type);
        });
    }

    function detail()
    {
        return $this->hasOne(StudentDetail::class, 'user_id');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function typeIs($type)
    {
        $user = $this->load('type');

        return $user->type->slug === $type;
    }

    public function isStudent(): bool
    {
        return $this->typeIs('student');
    }

    public function isTeacher(): bool
    {
        return $this->typeIs('teacher');
    }

    public static function getGenders()
    {
        return static::$genders;
    }

    public static function getParentsForDropdown()
    {
        return static::whereUserType('parent')->pluck('full_name', 'id');
    }

    public function courses()
    {
        return $this->belongsToMany(SubjectCourse::class, 'student_courses', 'student_id', 'course_id');
    }

    /***
     * @param string $userType string
     * @return array
     */
    public static function getForDropdown(string $userType = '')
    {
        //$users = [];

        $query = static::query();

        if (!empty($userType)) {
            $query->whereUserType($userType);
        }

        return $query->get()
            ->map(function ($item) {

                $fullName = '';
                if ($item->first_name) {
                    $fullName .= ' ' . $item->first_name;
                }

                if ($item->middle_name) {
                    $fullName .= ' ' . $item->middle_name;
                }

                if ($item->last_name) {
                    $fullName .= ' ' . $item->last_name;
                }

                $cc['id'] = $item->id;
                $cc['full_name'] = $fullName;

                return $cc;

            })->pluck('full_name', 'id');
    }

    function notes()
    {
        return $this->hasMany(Note::class, 'user_id');
    }

    //is student submitted Assignment

    function isAssessmentSubmitted($assessmentId): bool
    {
        return !!AssessmentStudent::where('student_id', $this->id)
            ->where('assessment_id', $assessmentId)
            ->where('status', 'submitted')
            ->first();
    }

    function getImageUrlAttribute()
    {
        if (empty($this->image_path)) {
            return '/assets/images/no-image.jpg';
        }
        return '/storage/' . $this->image_path;
    }

    function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    function doctor()
    {
        return $this->belongsTo(Contact::class, 'doctor_id');
    }

    function emergencyContact()
    {
        return $this->belongsTo(Contact::class, 'emergency_contact_id');
    }

    function members()
    {
        return $this->hasMany(Contact::class, 'user_id');
    }

    function caseManager()
    {
        return $this->belongsTo(Contact::class, 'case_manager_id');
    }

    function paymentInfo(){
        return $this->hasMany(PaymentInfo::class, 'user_id');
    }

}

