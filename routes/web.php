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
/******************views********************** */


Route::get('/templateOptions', function () {
    return view('/TemplateOptions');
});
Route::get('/SearchResults', function () {
    return view('/SearchResults');
});
Route::get('/CategoriesLayout', function () {
    return view('CategoriesLayout');
});
/**************************************** */

Route::get('/front-test', "HomeController@index")->name("home");
Route::post("/home/get-subjects", "HomeController@getSubjects");
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get("/institutions/fetchAll", "InstitutionController@fetchAllInstitutions");

Route::get("/countries/fetch", "CountryController@fetch");

Route::get("/states/fetch/{country_id}", "StateController@fetch");

Route::post("/register", "RegisterController@teacherRegister");
Route::post("/login", "AuthController@login");
Route::post("/institution-register", "RegisterController@institutionRegister");
Route::get("/register/validate/{registerHash}", "RegisterController@verify")->middleware("guest");
Route::post("resend-email", "RegisterController@resendEmail")->middleware("guest");
Route::get("/logout", "AuthController@logout");

Route::get("/institution/profile", "InstitutionController@institutionProfile")->middleware("auth");
Route::post("/institution/first-update", "InstitutionController@firstUpdate")->middleware("auth");
Route::post("/institution/profile/update", "InstitutionController@updateInstitutionProfile")->middleware("auth");
Route::post("/institution/profile/add-user", "InstitutionController@addUser")->middleware("auth");
Route::get("/institution/get-teachers", "InstitutionController@getInstitutionTeachers")->middleware("auth");
Route::get("/institution/get-users", "InstitutionController@getInstitutionUsers")->middleware("auth");

Route::get("teacher/profile", "TeacherController@profile")->middleware("auth");
Route::post("teacher/profile/update", "TeacherController@update")->middleware("auth");
Route::get("teacher/show/{id}", "TeacherController@show");
Route::get("teacher/all", "TeacherController@showAll");
Route::get("teacher/fetch-all", "TeacherController@fetchAll");

Route::get("organization/all", "InstitutionController@organizationAll");
Route::get("organization/fetch-all", "InstitutionController@fetchOrganizationAll");
Route::get("university/all", "InstitutionController@showAll");
Route::get("university/fetch-all", "InstitutionController@fetchAll");
Route::get("school/all", "InstitutionController@schoolAll");
Route::get("school/fetch-all", "InstitutionController@fetchSchoolAll");

Route::get("institution/show/{id}", "InstitutionController@show");
Route::get("/institution/public/get-teachers/{id}", "InstitutionController@getInstitutionTeachers");
Route::get("/institution/public/get-users/{id}", "InstitutionController@getPublicInstitutionUsers");

Route::get("subjects/all", "SubjectController@showAll");
Route::get("subjects/fetch-all", "SubjectController@fetchAll");
