<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeacherProfileUpdateRequest;
use App\User;

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
            $user->show_my_email = boolval($request->show_my_email);
            $user->update();

            return response()->json(["success" => true, "msg" => "Profile updated"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Something went wrong", "err" => $e->getMessage(), "ln" => $e->getLine()]);

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

}
