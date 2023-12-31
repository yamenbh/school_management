<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'Authlogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password',[AuthController::class, 'forgotpassword']);
Route::post('forgot-password',[AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);



Route::get('admin/admin/list', function () {

    return view('admin.admin.list');

});

Route::group(['middleware' => 'admin'], function (){

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

});

Route::group(['middleware' => 'teacher'], function (){

    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);


});

Route::group(['middleware' => 'student'], function (){

    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);


});

Route::group(['middleware' => 'parent'], function (){

    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);


});


