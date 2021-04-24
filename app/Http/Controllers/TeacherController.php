<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeacherProfileUpdateRequest;
use App\User;
use App\AdminMail;
use App\PendingInstitution;
use App\TeacherReport;

class TeacherController extends Controller
{
    function profile(){

        return view("profiles.teacher");

    }

    function update(TeacherProfileUpdateRequest $request){

        try{

            $user = User::find(\Auth::user()->id);
            $user->country_id = $request->country;
            $user->state_id = $request->state;
            $user->cv_resume = $request->cv_resume;
            $user->portfolio = $request->portfolio;
            $user->institution_id = $request->institution;
            $user->why_do_you_educate = $request->why_do_you_educate;
            if($request->show_my_email == "false")
                $user->show_my_email = 0;

            if($request->show_my_email == "true")
                $user->show_my_email = 1;
            $user->update();

            return response()->json(["success" => true, "msg" => "Profile updated"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Something went wrong", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function institutionUpdate(Request $request){

        try{
            //dd($request->institution_not_registered);
            if($request->institution_not_registered == true){

                $pendingInstitution = new PendingInstitution;
                $pendingInstitution->name = $request->admin_institution_name;
                $pendingInstitution->website = $request->admin_institution_name;
                $pendingInstitution->email = $request->admin_institution_email;
                $pendingInstitution->save();

                $user = User::find(\Auth::user()->id);
                $user->institution_id = null;
                $user->pending_institution_id = $pendingInstitution->id;
                $user->institution_email = $request->institution_email;
                $user->update();

                

            }else{

                $user = User::find(\Auth::user()->id);
                $user->institution_id = $request->institution;
                $user->institution_email = $request->institution_email;
                $user->update();

                

            }

            $this->sendAdminEmail("New pending institution registered", "The ".$pendingInstitution->name." has been registered", "", false);

            return response()->json(["success" => true, "msg" => "Institution updated"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => $e->getMessage()]);
        }

    }

    function sendAdminEmail($title, $description, $link, $showLink){

        foreach(AdminMail::all() as $adminMail){

            $to_name = "admin";
            $to_email = $adminMail->email;
            $data = ["title" => $title, "description" => $description, "link" => $link, "showLink" => $showLink];

            \Mail::send("emails.adminMail", $data, function($message) use ($to_name, $to_email, $title) {

                $message->to($to_email, $to_name)->subject($title);
                $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

            });

        }

    }

    function show($id){

        $user = User::find($id);
        if($user && $user->role_id == 2){
            return view("profiles.teacherPublic", ["user" => $user]);
        }else{
            abort(404);
        }
        

    }

    function showAll(){

        return view("categoriesEducatorsInstitutions", ["type" => "teacher","title" => "Educators", "subtitle" => "Educators", "count" => User::where("role_id", 2)->count()]);

    }

    function fetchAll(){

        $letters = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
        $results = [];
        
        foreach($letters as $letter){

            $elements = User::where("name", "like", "{$letter}%")->where("role_id", 2)->limit(5)->get();
            $results[] = [
                "letter" => $letter,
                "elements" => $elements

            ];

        }

        return response()->json(["elements" => $results]);

    }

    function showByLetter($letter){

        return view("teachers.byLetter", ["letter" => $letter]);

    }

    function byLetter($letter, $page){

        try{

            $dataAmount = 10;
            $skip = ($page-1) * $dataAmount;

            $teachers = User::where("name", "like", "{$letter}%")->where("role_id", 2)->skip($skip)->take($dataAmount)->get();
            $teachersCount = User::where("name", "like", "{$letter}%")->where("role_id", 2)->count();

            return response()->json(["success" => true, "teachers" => $teachers, "teachersCount" => $teachersCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function reportTeacher(Request $request){

        try{

            if(TeacherReport::where("teacher_id", $request->teacher_id)->where("user_id", \Auth::user()->id)->exists()){

                $this->deleteTeacherReport($request);
                return response()->json(["success" => true, "msg" => "You undo the report of this teacher"]);

            }else{
            
                $teacherReport = new TeacherReport;
                $teacherReport->teacher_id = $request->teacher_id;
                $teacherReport->user_id = \Auth::user()->id;
                $teacherReport->save();
                
                
                if(TeacherReport::where("teacher_id", $request->teacher_id)->count() == 1){
                    $this->banTeacher($request);
                }
                

                return response()->json(["success" => true, "msg" => "You have reported this teacher"]);

            }

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Something went wrong", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function banTeacher($request){

        $project = User::find($request->teacher_id);
        $project->is_banned = 1;
        $project->update();

        if(env("SEND_EMAIL") == true){
            $this->sendAdminReportEmail($request);
        }

    }

    function sendAdminReportEmail($request){

        foreach(AdminMail::all() as $adminMail){

            $to_name = "Admin";
            $to_email = $adminMail->email;
            $data = ["teacher_id" => $request->teacher_id];

            \Mail::send("emails.teacherReport", $data, function($message) use ($to_name, $to_email) {

                $message->to($to_email, $to_name)->subject("Teacher reported");
                $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

            });

        }

    }

    function deleteTeacherReport($request){

        $teacherReport = TeacherReport::where("teacher_id", $request->teacher_id)->where("user_id", \Auth::user()->id)->first();
        $teacherReport->delete();

    }

}
