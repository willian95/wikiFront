<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;
use App\Subject;
use App\Hashtag;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
    
        return view('welcome');
    }

    public function getSubjects(Request $request){

        try{

            $letters = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
            $results = [];
            
            foreach($letters as $letter){

                if($request->institution_type == "university"){

                    $subjects = Subject::where("institution_type", $request->institution_type)->where("name", "like", "{$letter}%")->limit(5)->get();
                    $results[] = [
                        "letter" => $letter,
                        "subjects" => $subjects

                    ];

                }else{

                    $subjects = Subject::where("institution_type", $request->institution_type)->where("level", $request->level)->where("name", "like", "{$letter}%")->limit(5)->get();
                    $results[] = [
                        "letter" => $letter,
                        "subjects" => $subjects

                    ];

                }

            }

            return response()->json(["subjects" => $results]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Something went wrong", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    public function getHashtags(){

        $hashtags = Hashtag::inRandomOrder()->take(10)->get();
        return response()->json(["hashtags" => $hashtags]);

    }

}
