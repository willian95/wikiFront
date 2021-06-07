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

Route::get("test/notification", "ProjectController@sendFCMNotification");

Route::get('/', function () {
    return view('comingSoon');
});
/******************views********************** */

Route::get('/about', function () {
    return view('/about');
});

Route::get('/search-results/{search}', "SearchController@searchView");

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

Route::post("delete-profile", "ProfileController@delete")->middleware("auth");

Route::get("/institution/profile", "InstitutionController@institutionProfile")->middleware("auth")->middleware("institution");
Route::post("/institution/first-update", "InstitutionController@firstUpdate")->middleware("auth");
Route::post("/institution/profile/update", "InstitutionController@updateInstitutionProfile")->middleware("auth");
Route::post("/institution/profile/add-user", "InstitutionController@addUser")->middleware("auth");
Route::get("/institution/get-teachers", "InstitutionController@getPublicInstitutionUsers")->middleware("auth");
Route::get("/institution/get-users", "InstitutionController@getInstitutionUsers")->middleware("auth");
Route::post("institution/report", "InstitutionController@reportInstitution");

Route::get("teacher/profile", "TeacherController@profile")->middleware("auth")->middleware("teacher");
Route::post("teacher/profile/update", "TeacherController@update")->middleware("auth");
Route::post("teacher/profile/institution/update", "TeacherController@institutionUpdate")->middleware("auth");
Route::get("teacher/show/{id}", "TeacherController@show");
Route::get("teacher/all", "TeacherController@showAll");
Route::get("teacher/fetch-all", "TeacherController@fetchAll");
Route::get("teacher/show-by-letter/{letter}", "TeacherController@showByLetter");
Route::get("teacher/fetch/by-letter/{letter}/{page}", "TeacherController@byLetter");
Route::post("teacher/report", "TeacherController@reportTeacher");

Route::get("organization/all", "InstitutionController@organizationAll");
Route::get("organization/fetch-all", "InstitutionController@fetchOrganizationAll");
Route::get("university/all", "InstitutionController@showAll");
Route::get("university/fetch-all", "InstitutionController@fetchAll");
Route::get("school/all", "InstitutionController@schoolAll");
Route::get("school/fetch-all", "InstitutionController@fetchSchoolAll");

Route::get("institution/show/{id}", "InstitutionController@show");
Route::get("/institution/public/get-teachers/{id}", "InstitutionController@getPublicInstitutionTeachers");
Route::get("/institution/public/get-users/{id}", "InstitutionController@getPublicInstitutionUsers");
Route::get("/institution/{type}/show-by-letter/{letter}", "InstitutionController@showByLetter");
Route::get("institution/{type}/fetch/by-letter/{letter}/{page}", "InstitutionController@byLetter");

Route::get("subjects/all", "SubjectController@showAll");
Route::get("subjects/fetch-all", "SubjectController@fetchAll");
Route::get("subject/projects/{subject}", "SubjectController@index");
Route::get("subject/fetch/projects/{subject}/{page}", "SubjectController@fetch");
Route::get("subject/show-by-letter/{letter}", "SubjectController@showByLetter");
Route::get("subject/fetch/by-letter/{letter}/{page}", "SubjectController@byLetter");

Route::get("project/choose-template", "ProjectController@chooseTemplate")->middleware("teacher");
Route::get("project/own-template/create", "ProjectController@createOwnTemplate")->middleware("auth")->middleware("teacher");
Route::get("project/wikiPBL-template/create", "ProjectController@createWikiTemplate")->middleware("auth")->middleware("teacher");
Route::post("project/creation/save", "ProjectController@saveCreation")->middleware("auth")->middleware("teacher");
Route::post("project/edition/save", "ProjectController@saveEdition")->middleware("auth")->middleware("teacher");
Route::post("project/creation/launch", "ProjectController@launch");
Route::get("project/my-projects/{page}", "ProjectController@myProjects")->middleware("auth")->middleware("teacher");
Route::get("project/my-public-projects/{page}", "ProjectController@myPublicProjects")->middleware("auth")->middleware("teacher");
Route::get("project/my-follow-projects/{page}", "ProjectController@myFollowProjects")->middleware("auth")->middleware("teacher");
Route::get("project/create/{id}", "ProjectController@showCreateOwnTemplate")->middleware("auth")->middleware("teacher");
Route::get("project/wiki/create/{id}", "ProjectController@showCreateWikiTemplate")->middleware("auth")->middleware("teacher");
Route::get("project/edit/{id}", "ProjectController@editProject")->middleware("auth")->middleware("teacher");
Route::get("project/show/{slug}", "ProjectController@show");
Route::get("project/original/show/{slug}", "ProjectController@originalShow");
Route::get("project/pdf/{id}", "ProjectController@pdfTemplate");
Route::post("project/follow", "ProjectController@followProject");
Route::post("project/like", "ProjectController@likeProject");
Route::post("project/report", "ProjectController@reportProject");
Route::post("project/assestment-point", "ProjectController@upvoteAssestmentPoint");
Route::post("project/delete", "ProjectController@delete")->middleware("auth");

Route::get("project/public/my-projects/{page}/{teacherId}", "ProjectController@publicMyProjects");
Route::get("project/public/my-public-projects/{page}/{teacherId}", "ProjectController@publicMyPublicProjects");
Route::get("project/public/my-follow-projects/{page}/{teacherId}", "ProjectController@publicMyFollowProjects");

Route::get("project/own-template/public", "ProjectController@publicOwnTemplate");
Route::get("project/wikipbl-template/public", "ProjectController@publicWikiPblTemplate");

Route::post("/search/hashtag", "SearchController@hashtag");
Route::post("/search/subject", "SearchController@subject");
Route::post("/search/project", "SearchController@project");
Route::post("/search/teacher", "SearchController@teacher");
Route::post("/search/school", "SearchController@school");
Route::post("/search/university", "SearchController@university");
Route::post("/search/organization", "SearchController@organization");

Route::get("/search/only/hashtags/{search}", "SearchController@searchOnlyHashtagView");
Route::post("/search/only/hashtags", "SearchController@searchOnlyHashtag");
Route::get("/search/only/subjects/{search}", "SearchController@searchOnlySubjectView");
Route::post("/search/only/subjects", "SearchController@searchOnlySubject");
Route::get("/search/only/projects/{search}", "SearchController@searchOnlyProjectView");
Route::post("/search/only/projects", "SearchController@searchOnlyProject");
Route::get("/search/only/teachers/{search}", "SearchController@searchOnlyTeacherView");
Route::post("/search/only/teachers", "SearchController@searchOnlyTeacher");
Route::get("/search/only/schools/{search}", "SearchController@searchOnlySchoolView");
Route::post("/search/only/schools", "SearchController@searchOnlySchool");
Route::get("/search/only/universities/{search}", "SearchController@searchOnlyUniversityView");
Route::post("/search/only/universities", "SearchController@searchOnlyUniversity");
Route::get("/search/only/organizations/{search}", "SearchController@searchOnlyOrganizationView");
Route::post("/search/only/organizations", "SearchController@searchOnlyOrganization");

Route::post("/ckeditor/upload", "CKEditorController@upload")->name("ckeditor.upload");

Route::get("/notification/last", "NotificationController@fetchLast");
Route::post("/notification/seen", "NotificationController@seen");

Route::post("/problem-report", "ProblemReportController@report");