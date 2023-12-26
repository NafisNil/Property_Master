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

class FrontEndController extends Controller
{
    public function index()
    {
       // dd(User::limit(10)->get());
        return view('frontend.home.index');
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
            Toastr::success('Login successful', 'GoodJob!', ["positionClass" => "toast-top-right"]);
            return redirect()->route('dashboard');
        }
        Toastr::error('Login Failed', 'Opps!', ["positionClass" => "toast-top-right"]);
        return redirect()->route('authenticate.login');
    }



    public function register()
    {
        return view('auth.register');
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

        if($check==true){
            Toastr::success('Registration successful', 'GoodJob!', ["positionClass" => "toast-top-right"]);
        }else{
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
        if(Auth::check()){
            return view('home');
        }
        return redirect()->route('authenticate.login');
    }


    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect()->route('authenticate.login');
    }

    public function pass_change(){
        return view('layouts.change_password');
    }

    public function pass_change_submit(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['Password'=> Hash::make($request->new_password)]);

        Toastr::success('Password Change Successfully', 'GoodJob!', ["positionClass" => "toast-top-right"]);
        return redirect()->route('dashboard');
    }
}
