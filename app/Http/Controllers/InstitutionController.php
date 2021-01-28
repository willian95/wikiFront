<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;

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

}
