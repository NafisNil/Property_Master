<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Company;
use App\Models\Contact;
use App\Models\EducationLevel;
use App\Models\PaymentInfo;
use App\Models\TempOtp;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\School;
use App\Models\Users;
use Nette\Utils\Random;
use Spatie\Permission\Models\Role;

class RegStepController extends Controller
{

    public function create(Request $request)
    {
        $user = \request()->user();

        $mobileOtp = '';
        $emailOtp = '';

        $step = 1;

        $school = '';
        $company = '';
        $contacts = [];
        $schoolLevels = [];

        if (!empty($user)) {
            //user is logged in
            //now check if verified

            if (!$user->verified_at) {
                //not verified
                //send to verification page, step 2
                $step = 2;

                $dbMobileVerificationCode = TempOtp::where('type', 'mobile')
                    ->where('otp_for', $user->mobile_phone)
                    ->where('expire_at', '>=', now())
                    ->first();

                $dbEmailVerificationCode = TempOtp::where('type', 'email')
                    ->where('otp_for', $user->email)
                    ->where('expire_at', '>=', now())
                    ->first();

                $mobileOtp = $dbMobileVerificationCode->otp ?? '';
                $emailOtp = $dbEmailVerificationCode->otp ?? '';

            } else {
                $step = 3;
            }

            $school = $user->school;


            if (!empty($school)) {
                $step = $school->reg_step + 1;
            }

        }

        $payment = null;

        if ($request->query('step')) {

            $queryStep = $request->query('step');

            if ($request->query('step') > $step) {
                return redirect()->route('authenticate.createSchoolAccount', ['step' => $step]);
            }

            if ($queryStep >= 3) {

                switch ($queryStep) {
                    case 3:
                    {
                        $school = $user->school;
                        if (!empty($school)) {
                            $school->load(['address', 'authorizedBy']);
                        }
                        break;
                    }
                    case 4:
                    {
                        $payment = $user->paymentInfo->first();
                    }
                    case 5:
                    {

                        $company = Company::where('id', $school->company_id)
                            ->with('contact', 'address')
                            ->first();
                        break;

                    }
                    case 6:
                    {
                        $contacts = Contact::where('school_id', $school->id)
                            ->whereNotNull('is_cp')
                            ->get();
                        break;
                    }
                    case 7:
                    {
                        $schoolLevels = $school->levels->pluck('id');
                        break;
                    }
                }
                $step = $queryStep;
            }

        }

        /*$user = Users::select('users.*', 'school.reg_step AS regStep')
            ->join('school', 'school.id', '=', 'user.school')
            ->where('users.id', $user_id)
            ->first();*/

        //dd($user);


        return view('frontend.home.create_school_account', compact('step', 'mobileOtp', 'emailOtp', 'school', 'company', 'contacts', 'schoolLevels', 'payment'));

    }

    public function saveStepOne(Request $request)
    {

        \request()->validate([
            'email' => 'required',
            'password' => 'required',
            'user_name' => 'required',
            'mobile_phone' => 'required',
        ]);

        $data = \request()->only(['email', 'user_name', 'mobile_phone']);

        $data['password'] = bcrypt($request->input('password'));

        //check if already account exists for this email

        $userExists = User::where('email', $data['email'])
            ->first();

        if (!empty($userExists)) {
            //user exists throw error and request him to login
            return redirect()->back()->withErrors(['message' => 'This email already exists! Please login to Continue!']);
        }

        DB::beginTransaction();

        try {

            $user = User::create($data);

            $mailOtp = TempOtp::create([
                'otp_for' => \request()->input('email'),
                'type' => 'email',
                'otp' => random_int(100000, 999999),
                'expire_at' => now()->addMinutes(30)
            ]);


            $mobileOtp = TempOtp::create([
                'otp_for' => \request()->input('mobile_phone'),
                'type' => 'mobile',
                'otp' => random_int(100000, 999999),
                'expire_at' => now()->addMinutes(30)
            ]);

            DB::commit();
            //make login for this user
            \auth()->login($user);

            return redirect()->route('authenticate.createSchoolAccount');

        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withErrors(['message' => $exception->getMessage()]);
        }

    }

    public function saveStepTwo(Request $request)
    {

        $user = $request->user();

        $mobileVerificationCode = $request->input('mobile_verification_code');
        $emailVerificationCode = $request->input('email_verification_code');

        //get verification from database


        $dbEmailVerificationCode = TempOtp::
        where('otp_for', $user->email)
            ->where('expire_at', '>=', now())
            ->latest()
            ->first();


        if (!$dbEmailVerificationCode || $dbEmailVerificationCode->otp != $emailVerificationCode) {
            return redirect()->back()->withErrors(['message' => 'Invalid email verification code']);
        }

        $dbMobileVerificationCode = TempOtp::where('type', 'mobile')
            ->where('otp_for', $user->mobile_phone)
            ->where('expire_at', '>=', now())
            ->latest()
            ->first();

        if (!$dbMobileVerificationCode || $dbMobileVerificationCode->otp != $mobileVerificationCode) {
            return redirect()->back()->withErrors(['message' => 'Invalid mobile verification code']);
        }

        //else verified

        $user->verified_at = now();
        $user->save();

        return redirect()->route('authenticate.createSchoolAccount', ['step' => 3]);

    }

    function saveStepThree(Request $request)
    {
        $user = \auth()->user();

        //check if school created

        $school = $user->school;

        $addressData = [
            'name' => $request->input('school_address'),
            'country' => $request->input('school_country'),
            'state' => $request->input('school_state'),
            'city' => $request->input('school_city'),
            'street' => $request->input('school_street'),
            'zip' => $request->input('school_zip'),
        ];

        DB::beginTransaction();

        try {

            $address = Address::updateOrCreate(
                ['id' => $school->address_id ?? ''],
                $addressData);

            $authorizedUser = User::updateOrCreate(
                ['id' => $school->authorized_by ?? ''],
                [
                    'name' => $request->input('authp_name'),
                    'designation' => $request->input('authp_position'),
                    'mobile_phone' => $request->input('authp_mobile'),
                    'office_phone' => $request->input('authp_phone'),
                    'email' => $request->input('authp_email'),
                    'address' => $request->input('authp_address'),
                ]
            );

            $schoolData = [
                'name' => $request->input('name'),
                'school_code' => $request->input('school_code'),
                'website' => $request->input('school_website'),
                'email' => $request->input('school_email'),
                'phone' => $request->input('school_phone'),
                'address_id' => $address->id,
                'authorized_by' => $authorizedUser->id,
            ];

            if (empty($school)) {

                $schoolData['reg_step'] = 3;

                $school = School::create($schoolData);

                $user->school_id = $school->id;

                $user->save();

            } else {
                $school->update($schoolData);
            }

            DB::commit();

            return redirect()->route('authenticate.createSchoolAccount', ['step' => 4]);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    function savePayment(Request $request)
    {

        $validData = $request->validate([
            'card_no' => 'required',
            'card_type' => 'required',
            'expiration' => 'required',
            'cvv' => 'required',
            'card_holder_name' => 'required',
            'billing_address' => 'required'
        ]);

        $validData['user_id'] = \auth()->id();

        PaymentInfo::create($validData);

        $user = $request->user();
        $school = $user->school;
        $school->reg_step = 4;
        $school->save();

        return redirect()->route('authenticate.createSchoolAccount', ['step' => 5]);
    }

    function saveStepFour(Request $request)
    {

        $user = $request->user();

        $school = $user->school;

        $company = $school->company;

        $addressData = $request->only([
            'country', 'state', 'city', 'zip', 'street'
        ]);

        $addressData['name'] = $request->input('address');

        $contactData = $request->only([
            'office', 'mobile', 'email', 'fax', 'website', 'emergency_phone'
        ]);

        $addressData['school_id'] = $school->id;
        $contactData['school_id'] = $school->id;

        DB::beginTransaction();

        try {

            $address = Address::updateOrCreate(['id' => $company->address_id ?? ''], $addressData);

            $contact = Contact::updateOrCreate(['id' => $company->contact_id ?? ''], $contactData);

            $newComp = Company::updateOrCreate(
                ['id' => $company->id ?? ''],
                [
                    'address_id' => $address->id,
                    'contact_id' => $contact->id,
                    'legal_name' => $request->input('legal_name'),
                    'registration_no' => $request->input('registration_no'),
                    'school_id' => $school->id,
                ]);

            if (empty($company)) {
                $school->reg_step = 5;
                $school->company_id = $newComp->id;
                $school->save();
            }


            DB::commit();

            return redirect()->route('authenticate.createSchoolAccount', ['step' => 6]);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }

    }

    function saveStepFive(Request $request)
    {

        $user = $request->user();

        $school = $user->school;

        //dd($request->all());

        $designations = $request->input('designation');

        DB::beginTransaction();

        try {

            foreach ($designations as $index => $designation) {
                Contact::updateOrCreate(
                    ['id' => $request->input('contact_id', null)],
                    [
                        'school_id' => $school->id,
                        'designation' => $designation,
                        'name' => $request->input('name')[$index],
                        'mobile' => $request->input('mobile')[$index],
                        'office' => $request->input('office')[$index],
                        'email' => $request->input('email')[$index],
                        'fax' => $request->input('fax')[$index],
                        'is_cp' => true,
                    ]);

            }

            if ($school->reg_step == 5) {
                $school->reg_step = 6;
                $school->save();
            }


            DB::commit();

            return redirect()->route('authenticate.createSchoolAccount', ['step' => 7]);

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    function saveStepSix(Request $request)
    {

        $user = \auth()->user();
        $school = $user->school;

        $levels = $request->input('levels');

        DB::beginTransaction();

        try {

            $school->educationLevels()->sync($levels);

            if ($school->reg_step == 6) {
                $school->reg_step = 7;
                $school->save();
            }

            DB::commit();

            return redirect()->route('authenticate.createSchoolAccount', ['step' => 8]);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }


    }

    function saveStepSeven(Request $request)
    {
        $user = \auth()->user();
        $school = $user->school;

        if ($school->reg_step == 7) {
            $school->reg_step = 8;
            $school->save();
        }

        return redirect()->route('authenticate.createSchoolAccount', ['step' => 9]);

    }

    function saveStepEight(Request $request)
    {

        $user = \auth()->user();
        $school = $user->school;

        if ($school->reg_step == 8) {
            $school->reg_step = 9;
        }

        $school->agreed_service_contract = 1;
        $school->save();

        return redirect()->route('authenticate.createSchoolAccount', ['step' => 10]);

    }

    function saveStepNine(Request $request)
    {

        $user = \auth()->user();
        $school = $user->school;

        if ($school->reg_step == 9) {
            $school->reg_step = 10;
        }
        $school->aggreed_user_aggreement = 1;

        $school->save();

        return redirect()->route('authenticate.createSchoolAccount', ['step' => 11]);

    }

    function saveStepTen(Request $request)
    {

        $user = \auth()->user();
        $school = $user->school;

        $data = [
            'name' => $request->input('authp_name'),
            'designation' => $request->input('authp_position'),
            'mobile_phone' => $request->input('authp_mobile'),
            'office_phone' => $request->input('authp_phone'),
            'email' => $request->input('authp_email'),
            'address' => $request->input('authp_address'),
        ];

        $school->authorizedBy()->update($data);

        if ($school->reg_step == 10) {
            $school->reg_step = 11;
        }

        $school->save();

        return redirect()->route('authenticate.createSchoolAccount', ['step' => 12]);

    }

    function saveStepEleven(Request $request)
    {

        //dd($request->all());

        $user = \auth()->user();
        $school = $user->school;
        //$school->aggreed_user_aggreement = 1;

        if ($school->reg_step == 11) {
            $school->reg_step = 12;
        }

        $school->save();

        $attachments = (new FileService())->upload($request, $user);

        $school->attachments()->sync($attachments);

        return redirect()->route('authenticate.createSchoolAccount', ['step' => 13]);

    }

    function saveStepTwelve()
    {
        $user = \auth()->user();
        $school = $user->school;

        if ($school->reg_step == 12) {
            $school->reg_step = 13;
        }

        //copy roles to

        DB::beginTransaction();

        try {

            $roles = Role::whereNull('school_id')
                ->with('permissions')
                ->where('name', '!=', 'SuperAdmin')
                ->get();

            foreach ($roles as $role) {
                $newRole = $role->replicate();
                $permissions = $role->permissions->pluck('id');
                $newRole->name = $role->name . '#' . $school->id;
                $newRole->school_id = $school->id;
                $newRole->syncPermissions($permissions);
                $newRole->save();
            }
            //assign super admin role

            $user->assignRole('SuperAdmin');

            $school->aggreed_user_aggreement = 1;
            $school->reg_status = 'complete';

            $school->save();

            DB::commit();

            return redirect()->route('dashboard');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withErrors(['message' => $exception->getMessage()]);
        }
    }

}
