<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Project;
use App\SubjectProject;

class SubjectController extends Controller
{
    
    function showAll(){

        return view("categoriesEducatorsInstitutions", ["type" => "subjects", "title" => "Subjects", "count" => Subject::groupBy("name")->count(), "subtitle" => "Categories/Subjects"]);

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

    function index($subject){

        $subjectIdArray = $this->getIdWithSameSubjectName($subject);

        $count = SubjectProject::whereHas("subject", function($q) use($subjectIdArray){
            $q->whereIn("id", $subjectIdArray);
        })->count();

        $subject = Subject::find($subject);


        return view("subjects.projects", ["subject" => $subject, "count" => $count]);

    }

    function fetch($subjectId, $page){

        try{

            $dataAmount = 10;
            $skip = ($page-1) * $dataAmount;

            $subjectIdArray = $this->getIdWithSameSubjectName($subjectId);

            $projectQuery = Project::orderBy("id", "desc")->where("status", "launched")
                            ->with(["titles" => function($q){
                                $q->orderBy("id", "desc")->where("status", "launched");
                            }])
                            ->whereHas("subjectProjects", function($q) use($subjectIdArray){
                                    $q->whereIn("subject_id", $subjectIdArray);
                                }
                            )
                            ->with("user")->with("user.institution")->with("likes");
            
            $projectCountQuery = Project::orderBy("id", "desc")->where("status", "launched")
                            ->with(["titles" => function($q){
                                $q->orderBy("id", "desc")->where("status", "launched");
                            }])
                            ->whereHas("subjectProjects", function($q) use($subjectIdArray){
                                    $q->whereIn("subject_id", $subjectIdArray);
                                }
                            )
                            ->with("user")->with("user.institution")->count();

            $projects = $projectQuery->skip($skip)->take($dataAmount)->get();
            $projectsCount = $projectCountQuery;

            return response()->json(["success" => true, "projects" => $projects, "projectsCount" => $projectsCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){
            
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function getIdWithSameSubjectName($subjectId){
        $subjectIdArray = [];
        $subjectName = Subject::find($subjectId)->name;
        $subjects = Subject::where("name", $subjectName)->get();
        foreach($subjects as $subject){
            array_push($subjectIdArray, $subject->id);
        }

        return $subjectIdArray;
    }

    function showByLetter($letter){

        return view("subjects.byLetter", ["letter" => $letter]);

    }

    function byLetter($letter, $page){

        try{

            $dataAmount = 10;
            $skip = ($page-1) * $dataAmount;

            $subjects = Subject::where("name", "like", "{$letter}%")->groupBy("name")->skip($skip)->take($dataAmount)->get();
            $subjectsCount = Subject::where("name", "like", "{$letter}%")->groupBy("name")->count();

            return response()->json(["success" => true, "subjects" => $subjects, "subjectsCount" => $subjectsCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

}
