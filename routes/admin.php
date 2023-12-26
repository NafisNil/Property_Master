<?php

use App\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\EducationLevelController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

/**
 * Admin Router
 *  prefix /admin
 *  router name prefix admin.
 *  that mean in every route /admin will be added in path
 *  for router name admin. will be added as prefix
 */

Route::middleware('auth:admin')->group(function (){

    //Schools

    Route::get('/schools', [AdminController::class, 'getSchools'])
    ->name("get-schools");

    Route::post('/schools/{id}/toggle-status', [AdminController::class, 'toggleSchoolStatus']);

    //Education Levels

    Route::resource('/education-levels', EducationLevelController::class);

    //Admin Users

    Route::resource('/admin-users', AdminUserController::class);

    //Role Management

    Route::post('/roles/{id}/update-permissions', [RoleController::class, 'update_permissions'])
        ->name('roles.update-permissions');

    Route::resource('/roles', RoleController::class);

    Route::get('/', function(){
        return view('admin.dashboard');
    })->name('home');

});

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'postLogin'])
->name('post-login');

