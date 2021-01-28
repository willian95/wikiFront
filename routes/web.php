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


Route::get('/front-test', "HomeController@index")->name("home");

Route::get('/CategoriesLayout', function () {
    return view('CategoriesLayout');
});
Route::get('/InstitutionProfile', function () {
    return view('InstitutionProfile');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get("/institutions/fetchAll", "InstitutionController@fetchAllInstitutions");

Route::post("/register", "RegisterController@teacherRegister");
Route::post("/login", "AuthController@login");
Route::post("/institution-register", "RegisterController@institutionRegister");
Route::get("/register/validate/{registerHash}", "RegisterController@verify")->middleware("guest");
Route::post("resend-email", "RegisterController@resendEmail")->middleware("guest");
Route::get("/logout", "AuthController@logout");
