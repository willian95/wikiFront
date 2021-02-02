<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeacherProfileUpdateRequest;

class TeacherController extends Controller
{
    function profile(){

        return view("profiles.teacher");

    }

    function update(TeacherProfileUpdateRequest $request){

        try{

            

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Something went wrong", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }
}
