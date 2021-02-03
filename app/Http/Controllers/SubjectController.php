<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectController extends Controller
{
    
    function showAll(){

        return view("categoriesEducatorsInstitutions", ["type" => "subjects", "title" => "Subjects", "count" => Subject::count(), "subtitle" => "Categories/Subjects"]);

    }

    function fetchAll(){

        $letters = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
        $results = [];
        
        foreach($letters as $letter){

            $elements = Subject::where("name", "like", "{$letter}%")->groupBy("name")->limit(5)->get();
            $results[] = [
                "letter" => $letter,
                "elements" => $elements

            ];

        }

        return response()->json(["elements" => $results]);

    }

}
