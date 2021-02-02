<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;
use App\Http\Requests\UserRegisterInstitutionRequest;
use App\User;
use Illuminate\Support\Str;

class InstitutionController extends Controller
{
    
    function fetchAllInstitutions(){

        $institutions = Institution::orderBy("name")->get();
        return response()->json(["institutions" => $institutions]);
        
    }

    function firstUpdate(Request $request){

        try{

            $institution = Institution::find(\Auth::user()->institution_id);
            $institution->country_id = $request->country_id;
            $institution->state_id = $request->state_id;
            $institution->gender_institution_type = $request->gender_institution_type;
            $institution->lowest_age = $request->lowest_age;
            $institution->highest_age = $request->highest_age;
            $institution->part_of_network_institution = boolval($request->part_of_network_institution);
            $institution->which_network = $request->which_network;
            $institution->institution_public_or_private = $request->institution_public_or_private;
            $institution->students_enrolled = $request->students_enrolled;
            $institution->faculty_members = $request->faculty_members;
            $institution->is_profile_complete = 1;
            $institution->update();

            return response()->json(["success" => true, "msg" => "Institution updated"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Something went wrong", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function institutionProfile(){

        return view("profiles.institution");

    }

    function getInstitutionUsers(){

        $users = User::where("institution_id", \Auth::user()->institution->id)->where("role_id", 3)->get();
        return response()->json(["users" => $users]);
    }

    function getInstitutionTeachers(){

        $teachers = User::where("institution_id", \Auth::user()->institution->id)->where("role_id", 2)->count();
        return response()->json(["teachers" => $teachers]);
        
    }

    function getPublicInstitutionUsers($id){

        $users = User::where("institution_id", $id)->where("role_id", 3)->get();
        return response()->json(["users" => $users]);
    }

    function getPublicInstitutionTeachers($id){

        $teachers = User::where("institution_id", $id)->where("role_id", 2)->count();
        return response()->json(["teachers" => $teachers]);
        
    }

    function updateInstitutionProfile(Request $request){

        try{

            $institution = Institution::find(\Auth::user()->institution_id);
            $institution->gender_institution_type = $request->gender_institution_type;
            $institution->lowest_age = $request->lowest_age;
            $institution->highest_age = $request->highest_age;
            $institution->institution_public_or_private = $request->institution_public_or_private;
            $institution->students_enrolled = $request->students_enrolled;
            $institution->faculty_members = $request->faculty_members;
            $institution->update();

            return response()->json(["success" => true, "msg" => "Institution updated"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Something went wrong", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }   

    }

    function addUser(UserRegisterInstitutionRequest $request){

        try{

            $user = new User;
            $user->name = $request->admin_institution_name;
            $user->lastname = $request->admin_institution_lastname;
            $user->email = $request->admin_institution_email;
            $user->password = bcrypt($request->admin_institution_password);
            $user->role_id = 3;
            $user->phone = $request->admin_institution_phone;
            $user->register_hash = Str::random(40);
            $user->institution_email = $request->admin_institution_email;
            $user->institution_id = \Auth::user()->institution->id;
            $user->save();

            if(env("SEND_EMAIL") == true){
                $this->sendEmail($user);
            }

            return response()->json(["success" => true, "msg" => "Successfully registered", "user" => $user]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Something went wrong", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function sendEmail($user){

        $to_name = $user->name;
        $to_email = $user->email;
        $data = ["user" => $user, "registerHash" => $user->register_hash];

        \Mail::send("emails.register", $data, function($message) use ($to_name, $to_email) {

            $message->to($to_email, $to_name)->subject("Welcome to WikiPBL, just one more step!");
            $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

        });

    }


    function show($id){

        $institution = Institution::find($id);
        if($institution){
            return view("profiles.institutionPublic", ["institution" => $institution]);
        }else{
            abort(404);
        }
        

    }

}
