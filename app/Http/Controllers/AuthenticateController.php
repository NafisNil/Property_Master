<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use App\Models\Address;
use App\Models\School;
use App\Models\Users;
use App\Models\Declaration;

class AuthenticateController extends Controller
{

    public function login()
    {
        return view('frontend.home.login');
    }

    public function make_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = array(
            'email' => $request->input('email'),
            'password' => $request->input('password')
        );

        if (Auth::attempt($credentials)) {
            $user_id = Auth::user()->id;
            $users = Users::where('users.id', $user_id)->first();
            if (isset($users->school) && $users->school > 0) {
                $school = School::where('id', $users->school)->first();
            }

            Toastr::success('Login successful', 'GoodJob!', ["positionClass" => "toast-top-right"]);
            return redirect()->route('dashboard');

        }
        Toastr::error('Login Failed', 'Opps!', ["positionClass" => "toast-top-right"]);
        return redirect()->route('authenticate.login');
    }

    public function register()
    {
        return view('frontend.home.register');
    }

    public function createAccount()
    {
        return view('frontend.home.create_account');
    }

    public function createSchoolAccount()
    {
        return view('frontend.home.create_school_account');
    }

    public function createSchoolStore(Request $request)
    {

        $school_address = array(
            'name' => $request->school_address,
            'country' => $request->school_country,
            'state' => $request->school_state,
            'city' => $request->school_city,
            'street' => $request->school_street,
            'zip' => $request->school_zip,
        );

        $school_address_id = Address::create($school_address)->id;

        $school_information = array(
            'school_code' => $request->school_code,
            'name' => $request->school_name,
            'website' => $request->school_website,
            'email' => $request->school_email,
            'phone' => $request->school_phone,
            'address' => $school_address_id,
        );

        $school_info = School::create($school_information);
        $school_id = $school_info->id;

        $creator_information = array(
            'user_name' => $request->creator_name,
            'email' => $request->screator_email,
            'mobile_phone' => $request->creator_phone,
            'password' => Hash::make($request->password),
            'school' => $school_id,
            'address' => $school_address_id,
            'user_type' => 3,
        );

        $creator_id = Users::create($creator_information)->id;

        $declaration = array(
            'name' => $request->creator_declaretion,
            'user_id' => $creator_id
        );

        Declaration::create($declaration);

        $authorizer_address = array(
            'name' => $request->authp_address
        );

        $authorizer_address_id = Address::create($authorizer_address)->id;

        $authorizer_information = array(
            'user_name' => $request->authp_name,
            'designation' => $request->authp_position,
            'mobile_phone' => $request->authp_mobile,
            'office_phone' => $request->authp_phone,
            'email' => $request->authp__email,
            'password' => Hash::make($request->password),
            'address' => $authorizer_address_id,
            'user_type' => 4,
            'school' => $school_id,
        );

        users::create($authorizer_information);

        Toastr::success('Account Create successful', 'GoodJob!', ["positionClass" => "toast-top-right"]);

        //return view('frontend.home.profile_sstep1', $school_id);
        return redirect()->route('regStep.index', $school_id);
    }

    public function make_register(Request $request)
    {
        $request->validate([
//            'UserID' => 'required|unique:UserManager,UserID',
            'user_name' => 'required',
            'email' => 'required|unique:user_manager,email',
            'password' => 'required|min:4',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        if ($check == true) {
            Toastr::success('Registration successful', 'GoodJob!', ["positionClass" => "toast-top-right"]);
        } else {
            Toastr::error('Registration Failed', 'Opps!', ["positionClass" => "toast-top-right"]);
        }

        return redirect()->route('authenticate.login');
    }

    public function create(array $data)
    {
        return User::create([
//            'UserID' => $data['UserID'],
            'user_name' => $data['user_name'],
            'designation' => $data['designation'],
            'email' => $data['email'],
            'active' => 'Y',
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('home');
        }
        return redirect()->route('authenticate.login');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect()->route('authenticate.login');
    }

    public function pass_change()
    {
        return view('layouts.change_password');
    }

    public function pass_change_submit(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['Password' => Hash::make($request->new_password)]);

        Toastr::success('Password Change Successfully', 'GoodJob!', ["positionClass" => "toast-top-right"]);
        return redirect()->route('dashboard');
    }

}
