<?php

use App\Http\Controllers\API\AuthenticateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthenticateController::class, 'register'])->name('api.register');
Route::post('/login', [AuthenticateController::class, 'login'])->name('api.login');
Route::post('/check_otp', [AuthenticateController::class, 'check_otp'])->name('api.check_otp');

Route::get('/send_otp', [AuthenticateController::class, 'send_otp'])->name('api.send_otp');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [AuthenticateController::class, 'logout'])->name('api.logout');
});
