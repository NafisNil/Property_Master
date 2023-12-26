<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RegisteredUser;
use App\Models\TempOtp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticateController extends Controller
{
    public function register(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Registration Failed',
                'status' => 0,
                'errors' => $validator->errors()
            ], 200);
        } else {
            $user = RegisteredUser::where('mobile', $request->mobile)
                ->where('active', 'Y')
                ->first();
            if ($user != null) {
                return response()->json([
                    'message' => 'User Already Exists! Mobile Number Taken',
                    'status' => 0,
                ], 200);
            } else {
                $exsist_user = RegisteredUser::where('mobile', $request->mobile)
                    ->where('active', 'N')
                    ->first();
                if ($exsist_user) {
                    $registered_user = RegisteredUser::find($exsist_user->id);
                } else {
                    $registered_user = new RegisteredUser();
                }

                $registered_user->first_name = $request->first_name;
                $registered_user->last_name = $request->last_name;
                $registered_user->mobile = $request->mobile;
                $registered_user->password = Hash::make($request->password);
                $registered_user->email = isset($request->email) ? $request->email : '';
                $registered_user->active = 'N';
                $registered_user->create_by = 'system';

                if ($registered_user->save()) {
                    $this->send_otp($registered_user->mobile);
                    return response()->json([
                        'message' => 'Registered Request Sent, Check your OTP',
                        'status' => 1,
                        'user_data' => [
                            'first_name' => $registered_user->first_name,
                            'last_name' => $registered_user->last_name,
                            'mobile' => $registered_user->mobile,
                            'email' => $registered_user->email,
                            'status' => $registered_user->active
                        ]
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'Registration Failed',
                        'status' => 0,
                        'errors' => 'Something went wrong'
                    ], 500);
                }
            }
        }
    }

    public function send_otp($id)
    {
        $receipient = $id;
        $six_digit_random_number = rand(100000, 999999);
        $time = date('Y-m-d H:i:s');
        $expire_time = Carbon::parse($time)
            ->addSeconds(140)
            ->format('Y-m-d H:i:s');
        $smsText = "Your Touch verification code is The OTP is " . $six_digit_random_number . ". The code will expire in 2 minutes. Please do NOT share your OTP or PIN with others.";
        $smsUrl = "http://66.45.237.70/api.php?username=01746555579&password=Rwc@1177!&number=$receipient&message=" . urlencode($smsText) . "";
        $response = file_get_contents($smsUrl);
        if (isset($response[3]) && $response[3] == 1) {
            $temp_otp = new TempOtp();
            $temp_otp->mobile =  $receipient;
            $temp_otp->otp =  $six_digit_random_number;
            $temp_otp->expire_time =  $expire_time;
            $temp_otp->save();
            return true;
        } else {
            return false;
        }
        echo $response;

        //echo "valid";
    }

    public function check_otp(Request $request)
    {
        $mobile = $request->mobile;
        $otp = $request->otp;
        $time = date('Y-m-d H:i:s');
        $check = TempOtp::where('OTP', $otp)->where('mobile', $mobile)->where('expire_time', '>=', $time)->first();
        //dd($check);
        if ($check == true) {
            return response()->json([
                'message' => 'OTP Matched',
                'status' => 1
            ], 200);
        } else {
            return response()->json([
                'message' => 'OTP Expired or OTP does not match',
                'status' => 0
            ], 208);
        }
    }

    public function login(Request $request)
    {
        $user = RegisteredUser::where('mobile', $request->mobile)
            ->where('active', 'Y')
            ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken($user->mobile)->plainTextToken;
            return response()->json([
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'mobile' => $user->mobile,
                'email' => $user->email,
                'active' => $user->active,
                'token' => $token,
                'status' => 1,
                'message' => 'Login Successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Invalid User OR Password!'
            ], 200);
        }
    }

    public function logout(Request $request)
    {
        $token_remove = $request->user()->currentAccessToken()->delete();
        if ($token_remove) {
            return response()->json([
                'message' => 'Successfully Logout',
                'status' => 200
            ], 200);
        } else {
            return response()->json([
                'message' => 'Token not found',
                'status' => 200
            ], 200);
        }
    }
}
