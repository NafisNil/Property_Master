<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\School;
use App\Models\Users;
use App\Models\RegistrationDeadlines;
use App\Models\Campus;
use App\Models\CourseOutlines;

class SchoolProfileController extends BaseController
{


    public function index()
    {
        $this->checkPermission('school-profile.view');

        $user = \auth()->user();
        $registrationDeadlines = RegistrationDeadlines::get();

        $school_info = School::with(['address', 'authorizedBy'])
            ->where('id', $user->school_id)->first();

        $company = Company::with('contact', 'address')
            ->where('id', $school_info->company_id)
            ->first();

        return view('school_profile.index', compact('school_info', 'company', 'registrationDeadlines'));
    }


    public function create()
    {
        $this->checkPermission('school-profile.create');

        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $school_info = School::where('id', $school_id)->first();
        return view('registration_deadlines.create', compact('school_info'));
    }


    public function store(Request $request)
    {

        $this->checkPermission('school-profile.create');

        $request->validate([
            'event_code' => 'required',
        ]);

        RegistrationDeadlines::create($request->all());

        return redirect()->route('registrationDeadlines.index')
            ->with('success', 'Information added successfully.');
    }


    public function edit($id)
    {
        $this->checkPermission('school-profile.edit');

        if (isset($id) && !empty($id)) {
            $user_id = Auth::user()->id;
            $school_id = Users::where('id', $user_id)->first()->school_id;
            $school_info = School::where('id', $school_id)->first();
            $registrationDeadlines = RegistrationDeadlines::where('id', $id)->first();
            return view('registration_deadlines.edit', compact('school_info', 'registrationDeadlines'));
        } else {
            return Redirect::back()->withErrors(['msg' => 'Information not found']);
        }
    }


    public function update(Request $request)
    {

        $this->checkPermission('school-profile.edit');

        $user = \auth()->user();

        $school = $user->school;

        $request->validate([
            'school_name' => 'required|string',
        ]);

        try {
            $school->update([
                'name' => $request->input('school_name'),
            ]);

            $school->address()->update([
                'country' => $request->input('school_country'),
                'state' => $request->input('school_state'),
                'city' => $request->input('school_city'),
                'zip' => $request->input('school_zip'),
                'street' => $request->input('street')
            ]);

            DB::commit();
            toastr()->success('Updated');

            return redirect()->route('schoolProfile.index');

        }catch (\Exception $exception){
            DB::rollback();
            return redirect()->back()->withErrors(['message' => $exception->getMessage()]);
        }

        return redirect()->route('registrationDeadlines.index')
            ->with('success', 'Information successfully updated.');
    }

    public function updateCompanyProfile()
    {

        //dd(\request()->all());

        $user = \auth()->user();
        $school = $user->school;

        \request()->validate([
            'registration_no' => 'required'
        ]);

        $company = $school->company;

        $addressData = \request()->only([
            'company_country', 'company_state', 'company_city',
            'company_street', 'company_zip'
        ]);

        DB::beginTransaction();

        try {
            $company->address()->update([
                'country' => \request('company_country'),
                'state' => \request('company_state'),
                'city' => \request('company_city'),
                'street' => \request('company_street'),
                'zip' => \request()->input('company_zip'),
            ]);

            $company->contact()->update([
                'office' => \request('company_contact_office'),
                'mobile' => \request('company_contact_mobile'),
                'emergency_phone' => \request('company_contact_emergency_phone'),
                'website' => \request()->input('company_contact_website'),
                'email' => \request('company_contact_email'),
                'fax' => \request('company_contact_fax'),
            ]);

            $company->update([
                'registration_no' => \request('registration_no')
            ]);

            DB::commit();

            toastr()->success('Updated');

            return redirect()->route('schoolProfile.index');

        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withErrors(['message' => $exception->getMessage()]);
        }


    }


    public function destroy($id)
    {
        $color = RegistrationDeadlines::find($id);
        $color->delete();

        return redirect()->route('registrationDeadlines.index')
            ->with('success', 'Iformation delete successfully');
    }

}
