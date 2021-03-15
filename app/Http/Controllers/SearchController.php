<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hashtag;
use App\HashtagProject;
use App\Subject;
use App\SubjectProject;
use App\Project;
use App\Title;
use App\SecondaryField;
use App\User;
use App\Institution;
use DB;

class SearchController extends Controller
{
    
    function searchView($search){

        return view("searchResults", ["search" => $search]);

    }

    function searchOnlyHashtagView($search){

        return view("searchViews.hashtag", ["search" => $search]);

    }

    function searchOnlyHashtag(Request $request){

        try{

            $dataAmount = 20;
            $skip = ($request->page-1) * $dataAmount;

            $words = $this->splitWords($request);

            $hashtags = Hashtag::where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })
            ->skip($skip)->take($dataAmount)->orderBy("name")->get();

            $hashtagsCount = Hashtag::where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })->count();

            return response()->json(["success" => true, "hashtags" => $hashtags, "hashtagsCount" => $hashtagsCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function searchOnlySubjectView($search){

        return view("searchViews.subject", ["search" => $search]);

    }

    function searchOnlySubject(Request $request){

        try{

            $dataAmount = 20;
            $skip = ($request->page-1) * $dataAmount;

            $words = $this->splitWords($request);

            $subjects = Subject::where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })
            ->skip($skip)->take($dataAmount)->orderBy("name")->get();

            $subjectsCount = Subject::where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })->count();

            return response()->json(["success" => true, "subjects" => $subjects, "subjectsCount" => $subjectsCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }


    function searchOnlyProjectView($search){

        return view("searchViews.project", ["search" => $search]);

    }

    function searchOnlyProject(Request $request){

        try{

            $dataAmount = 20;
            $skip = ($request->page-1) * $dataAmount;

            $projects = [];
            $projectId = [];
            $projectResults = [];
            $words = $this->splitWords($request);

            $titles = $this->projectTitles($words);
            $secondaryFields = $this->projectSecondaryFields($words);
            $hashtags = $this->projectHashtags($words);
            $subjects = $this->subjectProjects($words);

            foreach($titles as $result){
                array_push($projectId, $result->project_id);
            }

            foreach($secondaryFields as $result){
                array_push($projectId, $result->project_id);
            }

            foreach($hashtags as $result){
                array_push($projectId, $result->project_id);
            }

            foreach($subjects as $result){
                array_push($projectId, $result->project_id);
            }
            
            
            $projects = array_reverse($projectId);
            $projects = array_count_values($projects);
            $projectsCount = count($projects);
            $projectId = [];
            foreach($projects as $key => $value){

                $projectId[] = [
                    "id" => $key,
                    "amount" => $value
                ];

            }

            usort($projectId, function ($item1, $item2) {
                return $item2['amount'] <=> $item1['amount'];
            });


            $projects = [];
            $skipIndex = 0;
            $takeIndex = 0;
           
            foreach($projectId as $project){

                if($skipIndex >= $skip && $takeIndex < $dataAmount){
                    
                    array_push($projects, $project["id"]);

                    $takeIndex++;
                }
                
                $skipIndex++;
                
            }
            
            $projectsResults = [];
            foreach($projects as $key){

                $projectModel = Project::where("id", $key)->with(["titles" => function($q){
                    $q->orderBy("id", "desc")->where("status", "launched")->take(1);
                    }
                ])->with("user")->first(); 

                $projectsResults[] = [
                    $projectModel
                ];

            }

            return response()->json(["success" => true, "projects" => $projectsResults, "projectsCount" => $projectsCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function searchOnlyTeacherView($search){

        return view("searchViews.teacher", ["search" => $search]);

    }

    function searchOnlyTeacher(Request $request){

        try{

            $dataAmount = 20;
            $skip = ($request->page-1) * $dataAmount;

            $words = $this->splitWords($request);

            $teachers = User::where("role_id", 2)->where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })
            ->skip($skip)->take($dataAmount)->orderBy("name")->get();

            $teachersCount = Subject::where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })->count();

            return response()->json(["success" => true, "teachers" => $teachers, "teachersCount" => $teachersCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function searchOnlySchoolView($search){

        return view("searchViews.school", ["search" => $search]);

    }

    function searchOnlySchool(Request $request){

        try{

            $dataAmount = 20;
            $skip = ($request->page-1) * $dataAmount;

            $words = $this->splitWords($request);

            $institutions = Institution::where("type", "school")->where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })
            ->skip($skip)->take($dataAmount)->orderBy("name")->get();

            $institutionsCount = Institution::where("type", "school")->where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })->count();

            return response()->json(["success" => true, "institutions" => $institutions, "institutionsCount" => $institutionsCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function searchOnlyUniversityView($search){

        return view("searchViews.university", ["search" => $search]);

    }

    function searchOnlyUniversity(Request $request){

        try{

            $dataAmount = 20;
            $skip = ($request->page-1) * $dataAmount;

            $words = $this->splitWords($request);

            $institutions = Institution::where("type", "university")->where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })
            ->skip($skip)->take($dataAmount)->orderBy("name")->get();

            $institutionsCount = Institution::where("type", "university")->where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })->count();

            return response()->json(["success" => true, "institutions" => $institutions, "institutionsCount" => $institutionsCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function searchOnlyOrganizationView($search){

        return view("searchViews.organization", ["search" => $search]);

    }

    function searchOnlyOrganization(Request $request){

        try{

            $dataAmount = 20;
            $skip = ($request->page-1) * $dataAmount;

            $words = $this->splitWords($request);

            $institutions = Institution::where("type", "organization")->where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })
            ->skip($skip)->take($dataAmount)->orderBy("name")->get();

            $institutionsCount = Institution::where("type", "organization")->where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })->count();

            return response()->json(["success" => true, "institutions" => $institutions, "institutionsCount" => $institutionsCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

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
            ->take(20)->orderBy("name")->get();

            $groupedResults = $this->groupByFirstLetter($hashtags);

            return response()->json(["success" => true, "hashtags" => $groupedResults]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function subject(Request $request){

        try{

            $words = $this->splitWords($request);

            $subjects = Subject::where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })
            ->take(20)->orderBy("name")->get();

            $groupedResults = $this->groupByFirstLetter($subjects);

            return response()->json(["success" => true, "subjects" => $groupedResults]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function project(Request $request){

        try{

            $projects = [];
            $projectId = [];
            $projectResults = [];
            $words = $this->splitWords($request);

            $titles = $this->projectTitles($words);
            $secondaryFields = $this->projectSecondaryFields($words);
            $hashtags = $this->projectHashtags($words);
            $subjects = $this->subjectProjects($words);

            foreach($titles as $result){
                array_push($projectId, $result->project_id);
            }

            foreach($secondaryFields as $result){
                array_push($projectId, $result->project_id);
            }

            foreach($hashtags as $result){
                array_push($projectId, $result->project_id);
            }

            foreach($subjects as $result){
                array_push($projectId, $result->project_id);
            }

            $projects = array_reverse($projectId);
            $projects = array_count_values($projects);
            $projectsCount = count($projects);
            $projectId = [];
            foreach($projects as $key => $value){

                $projectId[] = [
                    "id" => $key,
                    "amount" => $value
                ];

            }

            usort($projectId, function ($item1, $item2) {
                return $item2['amount'] <=> $item1['amount'];
            });


            $projects = [];
            $skipIndex = 0;
            $takeIndex = 0;
           
            foreach($projectId as $project){

                if($skipIndex >= 0 && $takeIndex < 15){
                    
                    array_push($projects, $project["id"]);

                    $takeIndex++;
                }
                
                $skipIndex++;
                
            }
            
            foreach($projects as $key){

                $projectModel = Project::where("id", $key)->with(["titles" => function($q){
                    $q->orderBy("id", "desc")->where("status", "launched")->take(1);
                    }
                ])->with("user")->with("likes")->first(); 

                $projectsResults[] = [
                    $projectModel
                ];

            }

            return response()->json(["success" => true, "projects" => $projectsResults]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function projectTitles($words){
        $titles = Title::where(function ($query) use($words) {
            for ($i = 0; $i < count($words); $i++){
                if($words[$i] != ""){
                    $query->where('title', "like", "%".$words[$i]."%")->where("status", "launched")->groupBy("project_id")->get(['title', DB::raw('MAX(id) as id')]);
                }
            }      
        })->get();

        return $titles;
    }

    function projectSecondaryFields($words){
        $secondaryFields = SecondaryField::where(function ($query) use($words) {
            for ($i = 0; $i < count($words); $i++){
                if($words[$i] != ""){
                    $query->where('description', "like", "%".$words[$i]."%")->where("status", "launched")->groupBy("project_id")->get(['title', DB::raw('MAX(id) as id')]);
                }
            }      
        })->get();

        return $secondaryFields;
    }

    function projectHashtags($words){


        $hashtags = HashtagProject::groupBy("project_id")->whereHas("hashtag", function($query) use($words){
            for ($i = 0; $i < count($words); $i++){
                if($words[$i] != ""){
                    $query->where('name', "like", "%".$words[$i]."%");
                }
            }    
        })->with("hashtag")->get();


        return $hashtags;

    }

    function subjectProjects($words){

        $subjects = SubjectProject::groupBy("project_id")->whereHas("subject", function($query) use($words){
            for ($i = 0; $i < count($words); $i++){
                if($words[$i] != ""){
                    $query->where('name', "like", "%".$words[$i]."%");
                }
            }    
        })->get();

        return $subjects;

    }

    function teacher(Request $request){

        try{

            $words = $this->splitWords($request);

            $teachers = User::where("role_id", 2)->where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })
            ->take(20)->orderBy("name")->get();

            $groupedResults = $this->groupByFirstLetter($teachers);

            return response()->json(["success" => true, "teachers" => $groupedResults]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function school(Request $request){

        try{

            $words = $this->splitWords($request);

            $schools = Institution::where("type", "school")->where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })
            ->take(20)->orderBy("name")->get();

            $groupedResults = $this->groupByFirstLetter($schools);

            return response()->json(["success" => true, "schools" => $groupedResults]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function university(Request $request){

        try{

            $words = $this->splitWords($request);

            $universities = Institution::where("type", "university")->where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })
            ->take(20)->orderBy("name")->get();

            $groupedResults = $this->groupByFirstLetter($universities);

            return response()->json(["success" => true, "universities" => $groupedResults]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function organization(Request $request){

        try{

            $words = $this->splitWords($request);

            $organizations = Institution::where("type", "organization")->where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        $query->orWhere('name', "like", "%".$words[$i]."%");
                    }
                }      
            })
            ->take(20)->orderBy("name")->get();

            $groupedResults = $this->groupByFirstLetter($organizations);

            return response()->json(["success" => true, "organizations" => $groupedResults]);

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
                $index = 0;
                foreach($groupedResults as $groupedResult){

                    if($groupedResult["letter"] == $letter){
                        
                        array_push($groupedResults[$index]["results"], $result);
                    }
                    $index++;
                }
                

            }else{
               
                $groupedResults[] = [
                    "letter" => $letter,
                    "results" => [
                        $result
                    ]
                ];

            }

        }

        return $groupedResults;


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
