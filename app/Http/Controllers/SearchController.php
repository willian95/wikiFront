<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hashtag;

class SearchController extends Controller
{
    
    function searchView($search){

        return view("searchResults", ["search" => $search]);

    }

    function hashtag(Request $request){

        try{

            $words = $this->splitWords($request);

            $hashtags = Hashtag::where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })
            ->take(15)->orderBy("name")->get();

            $this->groupByFirstLetter($hashtags);

            //return response()->json(["success" => true, "hashtags" => $hashtags]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function splitWords($request){

        $words = explode(' ',strtolower($request->search)); // coloco cada palabra en un espacio del array
        $wordsToDelete = array('de', "y", "la");

        $words = array_values(array_diff($words,$wordsToDelete)); // Elimino todas las coincidencias de las wordsToDelete

        return $words;
    }

    function groupByFirstLetter($results){

        $groupedResults = [];

        foreach($results as $result){

            $letter = substr($result->name, 0, 1);
            if($this->checkIfKeyLetterExists($letter, $groupedResults)){
                
                foreach($groupedResults as $groupedResult){

                    if($groupedResult["letter"] == $letter){
                        
                        array_push($groupedResult["results"], $result);
                    }

                }

                dump("exists", $groupedResults);

            }else{
               
                $groupedResults[] = [
                    "letter" => $letter,
                    "results" => [
                        $result
                    ]
                ];

                

            }

        }

        //dd($groupedResults);


    }

    function checkIfKeyLetterExists($letter, $groupedResults){

        foreach($groupedResults as $letters){
            if($letters["letter"] == $letter){

                return true;

            }
        }

        return false;

    }


}
