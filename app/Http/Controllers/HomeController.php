<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;
use App\Subject;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $showModal = false;
        if(\Auth::check()){
            if(\Auth::user()->role_id == 3){

                $isProfileComplete = Institution::where("id", \Auth::user()->institution_id)->first()->is_profile_complete;
    
                if($isProfileComplete == 0){
                    $showModal = true;
                }
    
            }
        }

        return view('welcome', ["showModal" => $showModal]);
    }

    public function getSubjects(Request $request){

        try{

            $letters = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
            $results = [];
            
            foreach($letters as $letter){

                $subjects = Subject::where("institution_type", $request->institution_type)->where("level", $request->level)->where("name", "like", "{$letter}%")->limit(5)->get();
                $results[] = [
                    "letter" => $letter,
                    "subjects" => $subjects

                ];

            }

            return response()->json(["subjects" => $results]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Something went wrong", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

}
