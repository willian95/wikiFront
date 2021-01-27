<?php

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

Route::get('/', function () {
    return view('comingSoon');
});


Route::get('/front-test', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/institutions/fetchAll", "InstitutionController@fetchAllInstitutions");

Route::post("/register", "RegisterController@teacherRegister");
Route::get("/register/validate/{registerHash}", "RegisterController@verify")->middleware("guest");
Route::post("resend-email", "RegisterController@resendEmail")->middleware("guest");
