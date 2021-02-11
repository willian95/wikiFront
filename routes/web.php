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

Route::get('/about', function () {
    return view('/about');
});

Route::get('/SearchResults', function () {
    return view('/SearchResults');
});

Route::get('/ProjectCreation', function () {
    return view('ProjectCreation');
});
/**************************************** */

Route::get('/front-test', "HomeController@index")->name("home");
Route::post("/home/get-subjects", "HomeController@getSubjects");
Route::get("/home/get-hashtags", "HomeController@getHashtags");
Route::post("/password/send-email", "RestorePasswordController@sendEmail");
Route::get("/password/validate/{recovery_hash}", "RestorePasswordController@index");
Route::post("/password/change", "RestorePasswordController@change");

Route::get("/hashtag/{hashtag}", "HashtagController@index");
Route::get("/hashtag/projects/{hashtag}", "HashtagController@projects");

Route::get("/institutions/fetchAll", "InstitutionController@fetchAllInstitutions");

Route::get("/countries/fetch", "CountryController@fetch");

Route::get("/states/fetch/{country_id}", "StateController@fetch");

Route::post("/register", "RegisterController@teacherRegister");
Route::post("/login", "AuthController@login");
Route::post("/institution-register", "RegisterController@institutionRegister");
Route::get("/register/validate/{registerHash}", "RegisterController@verify")->middleware("guest");
Route::post("resend-email", "RegisterController@resendEmail")->middleware("guest");
Route::get("/logout", "AuthController@logout");

Route::get("/institution/profile", "InstitutionController@institutionProfile")->middleware("auth")->middleware("institution");
Route::post("/institution/first-update", "InstitutionController@firstUpdate")->middleware("auth");
Route::post("/institution/profile/update", "InstitutionController@updateInstitutionProfile")->middleware("auth");
Route::post("/institution/profile/add-user", "InstitutionController@addUser")->middleware("auth");
Route::get("/institution/get-teachers", "InstitutionController@getPublicInstitutionUsers")->middleware("auth");
Route::get("/institution/get-users", "InstitutionController@getInstitutionUsers")->middleware("auth");

Route::get("teacher/profile", "TeacherController@profile")->middleware("auth")->middleware("teacher");
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
Route::get("/institution/public/get-teachers/{id}", "InstitutionController@getPublicInstitutionTeachers");
Route::get("/institution/public/get-users/{id}", "InstitutionController@getPublicInstitutionUsers");

Route::get("subjects/all", "SubjectController@showAll");
Route::get("subjects/fetch-all", "SubjectController@fetchAll");

Route::get("project/choose-template", "ProjectController@chooseTemplate")->middleware("teacher");
Route::get("project/own-template/create", "ProjectController@createOwnTemplate")->middleware("auth")->middleware("teacher");
Route::get("project/wikiPBL-template/create", "ProjectController@createWikiTemplate")->middleware("auth")->middleware("teacher");
Route::post("project/creation/save", "ProjectController@saveCreation")->middleware("auth")->middleware("teacher");
Route::post("project/edition/save", "ProjectController@saveEdition")->middleware("auth")->middleware("teacher");
Route::post("project/creation/launch", "ProjectController@launch");
Route::get("project/my-projects/{page}", "ProjectController@myProjects")->middleware("auth")->middleware("teacher");
Route::get("project/create/{id}", "ProjectController@showCreateOwnTemplate")->middleware("auth")->middleware("teacher");
Route::get("project/wiki/create/{id}", "ProjectController@showCreateWikiTemplate")->middleware("auth")->middleware("teacher");
Route::get("project/edit/{id}", "ProjectController@editProject")->middleware("auth")->middleware("teacher");
Route::get("project/show/{slug}", "ProjectController@show");

Route::get("project/own-template/public", "ProjectController@publicOwnTemplate");
Route::get("project/wikipbl-template/public", "ProjectController@publicWikiPblTemplate");
Route::get("project/pdf", "ProjectController@pdfTemplate");

Route::post("/ckeditor/upload", "CKEditorController@upload")->name("ckeditor.upload");
