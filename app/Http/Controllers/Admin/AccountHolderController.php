<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountHolder;
use App\Models\AccountHolderLicense;
use App\Models\AccountHolderType;
use App\Models\Address;
use App\Models\Car;
use App\Models\Contact;
use App\Models\Corporation;
use App\Models\Department;
use App\Models\EmergencyContact;
use App\Models\Insurance;
use App\Models\License;
use App\Models\SchoolProgram;
use App\Models\TermSemester;
use App\Models\User;
use App\Models\UserType;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountHolderController extends Controller
{
    function index()
    {

        $type = request()->query('type');

        $userType = UserType::where('slug', '=', $type)
            ->first();

        if (empty($userType)) {
            return 'Account Type Not Found';
        }

        $accountHolders = User::where('user_type', $userType->id)
            ->get();


        $semesters = TermSemester::getForDropdown();


        return view('account-holder.index', compact('accountHolders', 'userType', 'semesters'));
    }

    function create(Request $request)
    {
        $type = $request->input('type');

        $userType = UserType::where('slug', $type)
            ->first();

        $parents = [];

        if ($type == 'student') {
            $parents = User::getByType('parent')->pluck('full_name', 'id');
        }

        $programs = SchoolProgram::pluck('program_name', 'id');

        $years = [
            '1' => 'First Year',
            '2' => 'Second Year',
            '3' => 'Third Year',
            '4' => 'Fourth Year'
        ];

        $semesters = TermSemester::getForDropdown();


        if ($type == 'parent') {
            return view('account-holder.parent.create', compact('userType', 'type'));
        }

        if ($type == 'teacher' || $type == 'employee' || $type == 'case-manager' || $type == 'resource-teacher') {

            $caseManagers = User::getForDropdown('case-manager');

            return view('account-holder.employee.create', compact('userType', 'type', 'caseManagers'));
        }


        if ($type == 'seller' || $type == 'service-provider') {

            return view('account-holder.seller.create', compact('userType', 'type'));
        }

        return view('account-holder.create', compact('parents', 'type', 'programs', 'years', 'semesters'));
    }

    function show($id)
    {
        $accountHolder = User::with(['add', 'contact', 'corporation', 'insurance', 'type'])
            ->where('id', $id)
            ->first();

        return view("account-holder.view", compact('accountHolder'));
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $schoolId = $user->school_id;

        request()->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|unique:users',
        ]);

        $type = request()->input('type');


        $accountType = UserType::where('slug', $type)
            ->first();

        $password = "123456";

        //todo send this password to user email

        //dd($accountType);

        DB::beginTransaction();

        try {

            $addressData = [
                'country' => request()->input('country'),
                'state' => request()->input('state'),
                'city' => request()->input('city'),
                'zip' => request()->input('zip'),
                'name' => request()->input('address'),
                'street_no' => request()->input('street')
            ];

            $address = Address::create($addressData);

            $contactData = [
                'school_id' => $schoolId,
                'phone' => request()->input('phone'),
                'email' => request()->input('email'),
                'website' => request()->input('website'),
                'fax' => request()->input('fax'),
                'office' => request()->input('office_phone'),
                'mobile' => request()->input('mobile'),
            ];

            $contact = Contact::create($contactData);

            //emergency image

            $emergencyImage = (new FileService())->upload($request, $user, 'emergency_image', ['mode' => 'single']);

            $emergencyContact = Contact::create([
                'name' => \request()->input('emergency_name'),
                'relation' => request()->input('emergency_relation'),
                'email' => \request()->input('emergency_email'),
                'phone' => \request()->input('emergency_phone'),
                'address' => \request()->input('emergency_address'),
                'image' => $emergencyImage->file_path ?? null,
            ]);

            $userImage = (new FileService())->upload($request, $user, 'image', ['mode' => 'single']);

            $car = Car::create([
                'name' => $request->input('car_name'),
                'model' => $request->input('car_model'),
                'color' => $request->input('car_color'),
                'plate_no' => $request->input('car_plate_no'),
                'policy_no' => $request->input('car_policy_no'),
                'expiry_date' => $request->input('car_expiry_date'),
            ]);

            $accountHolder = User::create([
                'school_id' => $schoolId,
                'user_type' => $accountType->id,
                'first_name' => request()->input('first_name'),
                'last_name' => request()->input('last_name'),
                'middle_name' => request()->input('middle_name'),
                'status' => request()->input('status') == 'active',
                'education' => request()->input('education'),
                'address_id' => $address->id,
                'contact_id' => $contact->id,
                'email' => request()->input('email'),
                'password' => bcrypt($password),
                'gender' => request()->input('gender'),
                'emergency_contact_id' => $emergencyContact->id,
                'image_path' => $userImage->file_path ?? null,

                "nationality" => $request->input('nationality', null),

                "born_in_country" => $request->input('born_in_country', null),
                "languages_spoken" => $request->input('languages_spoken', null),
                "citizenship_status" => $request->input('citizenship_status', null),
                "teaching_experience" => $request->input('teaching_experience', null),
                "certification_and_training" => $request->input('certification_and_training', null),

                "department" => $request->input('department', null),
                "designation" => $request->input('designation', null),
                "dob" => $request->input('dob', null),
                "hire_date" => $request->input('hire_date', null),
                "last_credit_check" => $request->input('last_credit_check', null),
                "last_criminal_bg_check" => $request->input('last_criminal_bg_check', null),
                "last_drug_check" => $request->input('last_drug_check', null),
                "termination_date" => $request->input('termination_date', null),

                'case_manager_id' => $request->input('case_manager_id'),
                'awards_and_achievements' => $request->input('awards_and_achievements'),
                'parking_stall_no' => $request->input('parking_stall_no'),
                'car_id' => $car->id,
                'locker_no' => $request->input('locker_no'),
                'volunteer_activities' => $request->input('volunteer_activities'),
                'bike_info' => $request->input('bike_info'),
                'feedback' => $request->input('feedback'),
                'comment' => $request->input('comment'),

            ]);

            DB::commit();

            toastr()->success('Account Holders Added');

            return redirect()->route('account-holders.index', ['type' => $type]);

        } catch (\Exception $exception) {
            DB::rollBack();
            toastr()->error($exception->getMessage());
            return redirect()->back()->withErrors(['message' => $exception->getMessage()]);
        }


    }

    function edit(Request $request, $id)
    {

        //$type = $request->input('type');


        $accountHolder = User::with(['add', 'contact', 'emergencyContact', 'corporation.address', 'corporation.contact',  'insurance', 'licenses.contact', 'type'])
            ->where('id', $id)
            ->firstOrFail();

        $userType = UserType::find($accountHolder->user_type);


        //dd($businessLicense);

        $caseManagers = User::getForDropdown('case-manager');

        if ($userType->slug == 'seller' || $userType->slug == 'service-provider') {

            $businessLicense = License::with('contact', 'address')->find($accountHolder->corporation->business_license_id);

            return view("account-holder.seller.edit", compact('accountHolder', 'businessLicense', 'userType'))
                ->with(['type' => $userType->slug]);

        }

        if ($userType->slug == 'teacher' || $userType->slug == 'case-manager' || $userType->slug == 'employee' || $userType->slug == 'resource-teacher') {

            return view("account-holder.employee.edit", compact('accountHolder', 'caseManagers', 'userType'))
                ->with(['type' => $userType->slug]);

        }

        return view("account-holder.edit", compact('accountHolder', 'userType', 'caseManagers'));

    }

    function editTeacherEmployee($type, $id)
    {

        $accountHolder = User::with(['add', 'contact', 'emergencyContact'])->where('id', $id)
            ->firstOrFail();

        $caseManagers = User::getForDropdown('case-manager');

        return view("account-holder.employee.edit", compact('accountHolder', 'type', 'caseManagers'));
    }

    /*function editSeller($id)
    {
        $accountHolder = User::with(['add', 'contact', 'emergencyContact'])->where('id', $id)
            ->firstOrFail();

        return view("account-holder.seller.edit", compact('accountHolder', 'type'));
    }*/

    function update(Request $request, $id)
    {

        $user = auth()->user();
        $schoolId = $user->school_id;

        $accountHolder = User::findOrFail($id);


        $type = UserType::findOrFail($accountHolder->user_type);


        $accountHolder->first_name = request()->input('first_name');

        DB::beginTransaction();

        try {

            //car

            $car = Car::find($accountHolder->car_id);

            $car->update([
                'name' => $request->input('car_name'),
                'model' => $request->input('car_model'),
                'color' => $request->input('car_color'),
                'plate_no' => $request->input('car_plate_no'),
                'policy_no' => $request->input('car_policy_no'),
                'expiry_date' => $request->input('car_expiry_date'),
            ]);

            if (!empty($accountHolder->address)) {

                $address = Address::findOrFail();

                $address->country = request()->input('country');
                $address->state = request()->input('state');
                $address->city = request()->input('city');
                $address->zip = request()->input('zip');
                $address->name = request()->input('address');
                $address->street = request()->input('street');

                $address->save();

                $accountHolder->address = $address->id;

            }

            if (!empty($accountHolder->contact_id)) {

                $contact = Contact::find($accountHolder->contact_id);

                $contact->phone = request()->input('phone');
                $contact->email = request()->input('email');
                $contact->website = request()->input('website');
                $contact->fax = request()->input('fax');
                $contact->office = request()->input('office_phone');
                $contact->mobile = request()->input('mobile');
                $contact->save();

                $accountHolder->contact_id = $contact->id;

            }

            if (!empty($accountHolder->emergency_contact_id)) {

                $emergencyContact = Contact::findOrFail($accountHolder->emergency_contact_id);

                $emergencyContact->update([
                    'name' => \request()->input('emergency_name'),
                    'relation' => request()->input('emergency_relation'),
                    'email' => \request()->input('emergency_email'),
                    'phone' => \request()->input('emergency_phone'),
                    'address' => \request()->input('emergency_address'),
                    'emergency_image' => $emergencyImage->file_path ?? null,
                ]);

            }

            $accountHolderData = [
                'first_name' => request()->input('first_name'),
                'last_name' => request()->input('last_name'),
                'middle_name' => request()->input('middle_name'),
                'status' => request()->input('status') == 'active',
                'education' => request()->input('education'),
                'email' => request()->input('email'),
                'gender' => request()->input('gender'),
                'image_path' => $userImage->file_path ?? null,
                "nationality" => $request->input('nationality', null),
                "born_in_country" => $request->input('born_in_country', null),
                "languages_spoken" => $request->input('languages_spoken', null),
                "citizenship_status" => $request->input('citizenship_status', null),
                "teaching_experience" => $request->input('teaching_experience', null),
                "certification_and_training" => $request->input('certification_and_training', null),
                "department" => $request->input('department', null),
                "designation" => $request->input('designation', null),
                "dob" => $request->input('dob', null),
                "hire_date" => $request->input('hire_date', null),
                "last_credit_check" => $request->input('last_credit_check', null),
                "last_criminal_bg_check" => $request->input('last_criminal_bg_check', null),
                "last_drug_check" => $request->input('last_drug_check', null),
                "termination_date" => $request->input('termination_date', null),

                'case_manager_id' => $request->input('case_manager_id'),
                'awards_and_achievements' => $request->input('awards_and_achievements'),
                'parking_stall_no' => $request->input('parking_stall_no'),
                'car_id' => $car->id,
                'locker_no' => $request->input('locker_no'),
                'volunteer_activities' => $request->input('volunteer_activities'),
                'bike_info' => $request->input('bike_info'),
                'feedback' => $request->input('feedback'),
                'comment' => $request->input('comment'),

            ];

            $accountHolder->update($accountHolderData);

            DB::commit();

            toastr()->success('Updated');

            return redirect()->route('account-holders.index', ['type' => $type->slug]);


        } catch (\Exception $exception) {
            DB::rollBack();
            toastr()->error($exception->getMessage());
            return back()->withErrors(['message' => $exception->getMessage()]);
        }


    }

    function destroy($id)
    {
        $accountHolder = AccountHolder::find($id);

        $type = AccountHolderType::find($accountHolder->account_holder_type_id);

        $accountHolder->delete();

        toastr()->success('Deleted');

        return redirect()->route('account-holders.index', ['type' => $type->slug]);


    }

    static function getAccountHolder()
    {

        $type = \request()->input('type');

        $id = \request()->input('account_holder_type_id');
        if ($id) {
            $userType = UserType::findOrFail($id);
            $type = $userType->slug;
        }

        $accountHolders = User::getByType($type);

        return response()->json($accountHolders);
    }

    function postSeller(Request $request)
    {

        $user = auth()->user();

        $schoolId = $user->school_id;

        request()->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|unique:users',
        ]);

        $type = request()->input('type');


        $accountType = UserType::where('slug', $type)
            ->first();

        $password = "123456";

        //todo send this password to user email

        //dd($accountType);

        DB::beginTransaction();

        try {

            $addressData = [
                'country' => request()->input('country'),
                'state' => request()->input('state'),
                'city' => request()->input('city'),
                'zip' => request()->input('zip'),
                'name' => request()->input('address'),
                'street_no' => request()->input('street')
            ];

            $address = Address::create($addressData);

            $contactData = [
                'school_id' => $schoolId,
                'phone' => request()->input('phone'),
                'email' => request()->input('email'),
                'website' => request()->input('website'),
                'fax' => request()->input('fax'),
                'office' => request()->input('office_phone'),
                'mobile' => request()->input('mobile'),
            ];

            $contact = Contact::create($contactData);

            $corporationAddressData = [
                'country' => request()->input('corporation_country'),
                'state' => request()->input('corporation_state'),
                'city' => request()->input('corporation_city'),
                'zip' => request()->input('corporation_zip'),
                'name' => request()->input('corporation_address'),
                'street_no' => request()->input('corporation_street')
            ];

            $corporationAddress = Address::create($corporationAddressData);


            $corporationContactData = [
                'school_id' => $schoolId,
                'phone' => request()->input('corporation_phone'),
                'email' => request()->input('corporation_email'),
                'website' => request()->input('corporation_website'),
                'fax' => request()->input('corporation_fax'),
                'office' => request()->input('corporation_office_phone'),
                'mobile' => request()->input('corporation_mobile'),
            ];

            $corporationContact = Contact::create($corporationContactData);

            //corporation data

            $businessLicenseAddressData = [
                'country' => request()->input('business_country'),
                'state' => request()->input('business_state'),
                'city' => request()->input('business_city'),
                'zip' => request()->input('business_zip'),
                'name' => request()->input('business_address'),
                'street_no' => request()->input('business_street')
            ];

            $businessAddress = Address::create($businessLicenseAddressData);

            $businessContactData = [
                'school_id' => $schoolId,
                'phone' => request()->input('business_phone'),
                'email' => request()->input('business_email'),
                'website' => request()->input('business_website'),
                'fax' => request()->input('business_fax'),
                'office' => request()->input('business_office_phone'),
                'mobile' => request()->input('business_mobile'),
            ];

            $businessContact = Contact::create($businessContactData);

            $businessLicenseData = [
                'type' => 'business',
                'contact_id' => $businessContact->id,
                'address_id' => $businessAddress->id,
                'license_no' => $request->input('business_license_no'),
                'issuer_name' => \request()->input('business_issuer_name'),
                'issuer_country' => \request()->input('business_issuer_country'),
                'issuer_state' => \request()->input('business_issuer_state'),
                'issuer_city' => \request()->input('business_issuer_city'),
            ];

            $businessLicense = License::create($businessLicenseData);

            $corporationData = [
                'contact_id' => $corporationContact->id,
                'address_id' => $corporationAddress->id,
                'school_id' => $schoolId,
                'name' => request()->input('corporation_name'),
                'business_no' => request()->input('business_no'),
                'office_country' => request()->input('corporation_office_country'),
                'office_state' => request()->input('corporation_office_state'),
                'office_city' => request()->input('corporate_office_city'),
                'business_license_id' => $businessLicense->id,
            ];

            $corporation = Corporation::create($corporationData);

            $userImage = (new FileService())->upload($request, $user, 'image', ['mode' => 'single']);

            $accountHolder = User::create([
                'school_id' => $schoolId,
                'user_type' => $accountType->id,
                'first_name' => request()->input('first_name'),
                'last_name' => request()->input('last_name'),
                'middle_name' => request()->input('middle_name'),
                'status' => request()->input('status') == 'active',
                'education' => request()->input('education'),
                'address_id' => $address->id,
                'contact_id' => $contact->id,
                'email' => request()->input('email'),
                'password' => bcrypt($password),
                'gender' => request()->input('gender'),
                'image_path' => $userImage->file_path ?? null,
                'corporation_id' => $corporation->id,
                'comment' => $request->input('comment'),
                'feedback' => $request->input('feedback'),
            ]);

            DB::commit();

            toastr()->success('Account Holders Added');

            return redirect()->route('account-holders.index', ['type' => $type]);

        } catch (\Exception $exception) {
            DB::rollBack();
            toastr()->error($exception->getMessage());
            return redirect()->back()->withErrors(['message' => $exception->getMessage()]);
        }

    }

    function updateSeller(Request $request, $id)
    {

        $user = auth()->user();

        $schoolId = $user->school_id;

        request()->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required',
        ]);

        $type = request()->input('type');


        $accountType = UserType::where('slug', $type)
            ->first();

        $password = "123456";

        //todo send this password to user email


        //dd($accountType);

        $accountHolder = User::findOrFail($id);

        DB::beginTransaction();

        try {

            $addressData = [
                'country' => request()->input('country'),
                'state' => request()->input('state'),
                'city' => request()->input('city'),
                'zip' => request()->input('zip'),
                'name' => request()->input('address'),
                'street_no' => request()->input('street')
            ];

            $address = Address::findOrFail($accountHolder->address_id);

            $address->update($addressData);

            $contact = Contact::findOrFail($accountHolder->contact_id);

            $contactData = [
                'phone' => request()->input('phone'),
                'email' => request()->input('email'),
                'website' => request()->input('website'),
                'fax' => request()->input('fax'),
                'office' => request()->input('office_phone'),
                'mobile' => request()->input('mobile'),
            ];

            $contact->update($contactData);

            $corporationAddressData = [
                'country' => request()->input('corporation_country'),
                'state' => request()->input('corporation_state'),
                'city' => request()->input('corporation_city'),
                'zip' => request()->input('corporation_zip'),
                'name' => request()->input('corporation_address'),
                'street_no' => request()->input('corporation_street')
            ];

            $corporation = Corporation::findOrFail($accountHolder->corporation_id);


            $corporationAddress = Address::find($corporation->address_id);

            $corporationAddress->update($corporationAddressData);

            $corporationContactData = [
                'school_id' => $schoolId,
                'phone' => request()->input('corporation_phone'),
                'email' => request()->input('corporation_email'),
                'website' => request()->input('corporation_website'),
                'fax' => request()->input('corporation_fax'),
                'office' => request()->input('corporation_office_phone'),
                'mobile' => request()->input('corporation_mobile'),
            ];



            $corporationContact = Contact::find($corporation->contact_id);

            $corporationContact->update($corporationContactData);

            $businessLicense = License::find($corporation->business_license_id);

            //corporation data

            if ($businessLicense) {

                $businessLicenseAddressData = [
                    'country' => request()->input('business_country'),
                    'state' => request()->input('business_state'),
                    'city' => request()->input('business_city'),
                    'zip' => request()->input('business_zip'),
                    'name' => request()->input('business_address'),
                    'street_no' => request()->input('business_street')
                ];

                $businessAddress = Address::find($businessLicense->address_id);

                $businessAddress->update($businessLicenseAddressData);

                $businessContactData = [
                    'phone' => request()->input('business_phone'),
                    'email' => request()->input('business_email'),
                    'website' => request()->input('business_website'),
                    'fax' => request()->input('business_fax'),
                    'office' => request()->input('business_office_phone'),
                    'mobile' => request()->input('business_mobile'),
                ];

                $businessContact = Contact::find($businessLicense->contact_id);

                $businessContact->update($businessContactData);

                $businessLicenseData = [
                    'license_no' => $request->input('business_license_no'),
                    'issuer_name' => \request()->input('business_issuer_name'),
                    'issuer_country' => \request()->input('business_issuer_country'),
                    'issuer_state' => \request()->input('business_issuer_state'),
                    'issuer_city' => \request()->input('business_issuer_city'),
                ];

                $businessLicense->update($businessLicenseData);

            }

            $corporationData = [
                'name' => request()->input('corporation_name'),
                'business_no' => request()->input('business_no'),
                'office_country' => request()->input('corporation_office_country'),
                'office_state' => request()->input('corporation_office_state'),
                'office_city' => request()->input('corporate_office_city'),
            ];

            $corporation->update($corporationData);

            $userImage = (new FileService())->upload($request, $user, 'image', ['mode' => 'single']);

            $accountHolder->update([
                'first_name' => request()->input('first_name'),
                'last_name' => request()->input('last_name'),
                'middle_name' => request()->input('middle_name'),
                'status' => request()->input('status') == 'active',
                'education' => request()->input('education'),
                'email' => request()->input('email'),
                'password' => bcrypt($password),
                'gender' => request()->input('gender'),
                'image_path' => $userImage->file_path ?? null,
                'corporation_id' => $corporation->id,
            ]);

            DB::commit();

            toastr()->success('Account Holders Added');

            return redirect()->route('account-holders.index', ['type' => $type]);

        } catch (\Exception $exception) {
            DB::rollBack();
            toastr()->error($exception->getMessage());
            return redirect()->back()->withErrors(['message' => $exception->getMessage()]);
        }

    }

}
