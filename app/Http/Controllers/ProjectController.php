<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Title;
use App\Subject;
use App\Hashtag;
use App\SubjectProject;
use App\HashtagProject;
use App\SecondaryField;
use DB;
use PDF;

class ProjectController extends Controller
{
    
    function chooseTemplate(){



        return view("projects.templateOptions");

    }

    function createOwnTemplate(){

        $project = $this->createProject("own-template");

        return view("projects.ownTemplateCreate", ["project" => $project]);

    }

    function wikiPBLTemplate(){

        $project = $this->createProject("wiki-template");

        return view("projects.wikiPBLTemplateCreate");

    }

    function createProject($type){

        $project = New Project;
        $project->user_id = \Auth::user()->id;
        $project->type = $type;
        $project->save();

        return $project;

    }

    function launch(Request $request){

        try{
        
            $this->saveCreation($request);
            $this->storeSubjects($request);
            $this->storeHashtags($request);

            Title::where("project_id", $request->projectId)->where("user_id", \Auth::user()->id)->update(["status" => "launched"]);
            SecondaryField::where("project_id", $request->projectId)->where("user_id", \Auth::user()->id)->update(["status" => "launched"]);

            $project = Project::find($request->projectId);
            $project->status = "launched";
            $project->update();
            
            return response()->json(["success" => true, "msg" => "Project successfully launched"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Something went wrong", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }



    }

    function storeSubjects($request){

        SubjectProject::where("project_id", $request->projectId)->delete();
        $subjectArray = explode(",", $request->subject);
        $level = json_decode($request->level);

        foreach($subjectArray as $subject){
            
            if(!$this->checkIfSubjectExits(strtolower($subject), $request)){

                $subjectModel = new Subject;
                $subjectModel->name = strtolower($subject);
                $subjectModel->institution_type = \Auth::user()->institution ? \Auth::user()->institution->type : \Auth::user()->oendingInstitution->type;
                $subjectModel->level = $level->level;
                $subjectModel->save();

            }else{

                $subjectModel = Subject::where("name", strtolower($subject))->first();

            }

            $subjectProject = new SubjectProject;
            $subjectProject->subject_id = $subjectModel->id;
            $subjectProject->project_id = $request->projectId;
            $subjectProject->save();

        }


    }   

    function checkIfSubjectExits($subject, $request){

        $level = json_decode($request->level);
        if(Subject::where("name", $subject)->where("level", $level->level)->where("institution_type", \Auth::user()->institution ? \Auth::user()->institution->type : \Auth::user()->pendingInstitution->type)->count() == 0){

            return false;

        }

        return true;

    }

    function storeHashtags($request){
        
        $hashtagArray = explode(",", $request->hashtag);
        HashtagProject::where("project_id", $request->projectId)->delete();

        foreach($hashtagArray as $hashtag){

            if(!$this->checkIfHashtagExits(strtolower($hashtag))){

                $hashtagModel = new Hashtag;
                $hashtagModel->name = strtolower($hashtag);
                $hashtagModel->save();

            }else{

                $hashtagModel = Hashtag::where("name", strtolower($hashtag))->first();

            }

            $hashtagProject = new HashtagProject;
            $hashtagProject->hashtag_id = $hashtagModel->id;
            $hashtagProject->project_id = $request->projectId;
            $hashtagProject->save();

        }

    }

    function checkIfHashtagExits($hashtag){

        if(Hashtag::where("name", $hashtag)->count() == 0){

            return false;

        }

        return true;

    }

    function saveCreation(Request $request){

        try{

            $this->storeTitle($request, "creation");
            $this->secondaryField($request, "creation", "drivingQuestionTitle", "drivingQuestion");
            $this->secondaryField($request, "creation", "timeFrameTitle", "timeFrame");
            $this->secondaryField($request, "creation", "publicProductTitle", "publicProduct");
            $this->secondaryField($request, "creation", "projectSumaryTitle", "projectSumary");
            $this->secondaryField($request, "creation", "mainInfoTitle", "mainInfo");
            $this->secondaryField($request, "creation", "bibliographyTitle", "bibliography");
            $this->secondaryField($request, "creation", "subjectTitle", "subject");
            $this->secondaryField($request, "creation", "levelTitle", "level");
            $this->secondaryField($request, "creation", "hashtagTitle", "hashtag");
            $this->secondaryField($request, "creation", "calendarActivitiesTitle", "calendarActivities");
            $this->secondaryField($request, "creation", "upvoteSystemTitle", "upvoteSystem");
        
        }catch(\Exception $e){
            
            return response()->json(["success" => false, "msg" => "Something went worng", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function saveEdition(Request $request){

        try{

            $this->storeTitle($request, "edition");
            $this->secondaryField($request, "edition", "drivingQuestionTitle", "drivingQuestion");
            $this->secondaryField($request, "edition", "timeFrameTitle", "timeFrame");
            $this->secondaryField($request, "edition", "publicProductTitle", "publicProduct");
            $this->secondaryField($request, "creation", "projectSumaryTitle", "projectSumary");
            $this->secondaryField($request, "edition", "mainInfoTitle", "mainInfo");
            $this->secondaryField($request, "edition", "bibliographyTitle", "bibliography");
            $this->secondaryField($request, "edition", "subjectTitle", "subject");
            $this->secondaryField($request, "edition", "levelTitle", "level");
            $this->secondaryField($request, "edition", "hashtagTitle", "hashtag");
            $this->secondaryField($request, "edition", "calendarActivitiesTitle", "calendarActivities");
            $this->secondaryField($request, "edition", "upvoteSystemTitle", "upvoteSystem");
        
        }catch(\Exception $e){
            
            return response()->json(["success" => false, "msg" => "Something went worng", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function storeTitle($request, $action){

        if(isset($request->title)){
            

           
            $title = Title::where("project_id", $request->projectId)->where("user_id", \Auth::user()->id)->where("status", "pending")->first();
            if(!$title){
                $title = new Title;
            }


            $title->title = $request->title;
            $title->user_id = \Auth::user()->id;
            $title->is_original = $this->checkIfOriginal($request->projectId);
            $title->slug = $this->setSlug($request->title);
            $title->project_id = $request->projectId;

            if(!Title::where("project_id", $request->projectId)->where("user_id", \Auth::user()->id)->where("status", "pending")->first()){
                
                $title->save();
            }else{
                if(Title::where("project_id", $request->projectId)->where("user_id", \Auth::user()->id)->where("status", "pending")->first()->title != $title->title){
                    $title->update();
                }
            }


        }

    }

    function secondaryField($request, $action, $titleField, $descriptionField){
        
        if($this->checkDifferencesInContent($request->projectId, $descriptionField, $titleField, $request)){

            $secondaryField = SecondaryField::where("project_id", $request->projectId)->where("type", $descriptionField)->where("user_id", \Auth::user()->id)->where("status", "pending")->first();
            if(!$secondaryField){
                $secondaryField = new SecondaryField;
            }

            $secondaryField->title = $request->input($titleField);
            $secondaryField->user_id = \Auth::user()->id;
            if($action == "creation"){
                $secondaryField->is_original = $this->checkIfOriginal($request->projectId);
            }else{
                $secondaryField->is_original = 0;
            }
            $secondaryField->project_id = $request->projectId;
            $secondaryField->description = $request->input($descriptionField);
            $secondaryField->type = $descriptionField;

            if(!SecondaryField::where("project_id", $request->projectId)->where("type", $descriptionField)->where("user_id", \Auth::user()->id)->where("status", "pending")->first()){
                $secondaryField->save();
            }else{
                $secondaryField->update();
            }

        }

    }

    function checkDifferencesInContent($projectId, $descriptionField, $titleField, $request){

        $secondaryField = SecondaryField::where("project_id", $projectId)->where("type", $descriptionField)->where("status", "launched")->first();
    
        if($secondaryField){
            
            if($secondaryField->title == $request->input($titleField) && $secondaryField->description == $request->input($descriptionField)){
                
                return false;
            }

        }

        return true;

    }

    function checkIfOriginal($projectId){
        $project = Project::find($projectId);
        if($project->user_id == \Auth::user()->id && $project->status == "pending"){

            return true;

        }

        return false;

    }

    function setSlug($title){

        $slug = str_replace(" ","-", $title);
        $slug = str_replace("/", "-", $slug);

        if(Title::where("slug", $slug)->count() > 0){

            return $slug = $slug."-".uniqid();;

        }

        return $slug;

    }


    function publicOwnTemplate(){

        return view("projects.ownTemplatePublic");

    }

    function publicWikiPblTemplate(){
        return view("projects.wikiPBLTemplatePublic");
    }

    function pdfTemplate(){

        $pdf = PDF::loadView('pdfs.project');
        return $pdf->stream();

    }

    function myProjects($page){

        $dataAmount = 10;
        $skip = ($page-1) * $dataAmount;

        $projectQuery = Project::where("user_id", \Auth::user()->id)->withTrashed()->orderBy("id", "desc")->with(["titles" => function($q){
                $q->orderBy("id", "desc")->take(1);
            }
        ]);

        $projects = $projectQuery->skip($skip)->take($dataAmount)->get();
        $projectsCount = $projectQuery->count();

        return response()->json(["success" => true, "projects" => $projects, "projectsCount" => $projectsCount, "dataAmount" => $dataAmount]);

    }

    function editProject($id){

        $project = Project::where("id", $id)->with(["titles" => function($q){
                $q->orderBy("id", "desc")->take(1);
            }
        ])->with(["secondaryFields" => function($q){

            $q->groupBy('type')->orderBy('id', 'asc')->get(['type', 'title', 'description', DB::raw('MAX(id) as id')]);

        }])->get(); 

        $drivingQuestionTitle = "";
        $drivingQuestion = "";
        $timeFrameTitle = "";
        $timeFrame = "";
        $publicProductTitle = "";
        $publicProduct = "";
        $mainInfo = "";
        $bibliography="";
        $subjectTitle = "";
        $subjects = "";
        $levelTitle = "";
        $level = "";
        $hashtag = "";
        $calendarActivities = "";
        $upvoteSystem = "";

        foreach($project[0]->secondaryFields as $field){

            if($field->type == "drivingQuestion"){

                $drivingQuestionTitle = $field->title;
                $drivingQuestion = $field->description;

            }

            else if($field->type == "timeFrame"){
                $timeFrameTitle = $field->title;
                $timeFrame = $field->description;
            }

            else if($field->type == "publicProduct"){
                $publicProductTitle = $field->title;
                $publicProduct = $field->description;
            }

            else if($field->type == "mainInfo"){
                $mainInfo = $field->description;
            }

            else if($field->type == "bibliography"){
                $bibliography = $field->description;
            }

            else if($field->type == "subject"){
                $subjectTitle = $field->title;
                $subjects = $field->description;
            }

            else if($field->type == "level"){
                $levelTitle = $field->title;
                $level = $field->description;
            }

            else if($field->type == "hashtag"){
                $hashtag = $field->description;
            }

            else if($field->type == "calendarActivities"){
                $calendarActivities = $field->description;
            }

            else if($field->type == "upvoteSystem"){
                $upvoteSystem = $field->description;
            }
            

        }

        if($project[0]->type == "own-template"){
            return view("projects.ownTemplateEdit", 
                [
                    "id" => $project[0]->id, 
                    "title" => $project[0]->titles[0]->title, 
                    "drivingQuestionTitle" => $drivingQuestionTitle,
                    "drivingQuestion" => $drivingQuestion,
                    "timeFrameTitle" => $timeFrameTitle,
                    "timeFrame" => $timeFrame,
                    "publicProductTitle" => $publicProductTitle,
                    "publicProduct" => $publicProduct,
                    "mainInfo" => $mainInfo,
                    "bibliography" => $bibliography,
                    "subjectTitle" => $subjectTitle,
                    "subjects" => $subjects,
                    "levelTitle" => $levelTitle,
                    "level" => $level,
                    "hashtag" => $hashtag,
                    "calendarActivities" => $calendarActivities,
                    "upvoteSystem" => $upvoteSystem,
                    "project" => $project

                ]
            );
        }else{
            return view("projects.wikiTemplateEdit", ["project" => $project]);
        }
        
    }   

    public function show($slug){

        $projctId = Title::where("slug", $slug)->where("status", "launched")->first()->project_id;

        $project = Project::where("id", $projctId)->with(["titles" => function($q){
            $q->orderBy("id", "desc")->where("status", "launched")->take(1);
            }
        ])->with(["secondaryFields" => function($q){

            $q->groupBy('type')->orderBy('id', 'asc')->where("status", "launched")->get(['type', 'title', 'description', DB::raw('MAX(id) as id')]);

        }])->get(); 

        $drivingQuestionTitle = "";
        $drivingQuestion = "";
        $timeFrameTitle = "";
        $timeFrame = "";
        $publicProductTitle = "";
        $publicProduct = "";
        $mainInfo = "";
        $bibliography="";
        $subjectTitle = "";
        $subjects = "";
        $levelTitle = "";
        $level = "";
        $hashtag = "";
        $calendarActivities = "";
        $upvoteSystem = "";

        foreach($project[0]->secondaryFields as $field){

            if($field->type == "drivingQuestion"){

                $drivingQuestionTitle = $field->title;
                $drivingQuestion = $field->description;

            }

            else if($field->type == "timeFrame"){
                $timeFrameTitle = $field->title;
                $timeFrame = $field->description;
            }

            else if($field->type == "publicProduct"){
                $publicProductTitle = $field->title;
                $publicProduct = $field->description;
            }

            else if($field->type == "mainInfo"){
                $mainInfo = $field->description;
            }

            else if($field->type == "bibliography"){
                $bibliography = $field->description;
            }

            else if($field->type == "subject"){
                $subjectTitle = $field->title;
                $subjects = $field->description;
            }

            else if($field->type == "level"){
                $levelTitle = $field->title;
                $level = $field->description;
            }

            else if($field->type == "hashtag"){
                $hashtag = $field->description;
            }

            else if($field->type == "calendarActivities"){
                $calendarActivities = $field->description;
            }

            else if($field->type == "upvoteSystem"){
                $upvoteSystem = $field->description;
            }
            

        }

        if($project[0]->type == "own-template"){
            return view("projects.ownTemplateShow", 
                [
                    "id" => $project[0]->id, 
                    "title" => $project[0]->titles[0]->title, 
                    "drivingQuestionTitle" => $drivingQuestionTitle,
                    "drivingQuestion" => $drivingQuestion,
                    "timeFrameTitle" => $timeFrameTitle,
                    "timeFrame" => $timeFrame,
                    "publicProductTitle" => $publicProductTitle,
                    "publicProduct" => $publicProduct,
                    "mainInfo" => $mainInfo,
                    "bibliography" => $bibliography,
                    "subjectTitle" => $subjectTitle,
                    "subjects" => $subjects,
                    "levelTitle" => $levelTitle,
                    "level" => $level,
                    "hashtag" => $hashtag,
                    "calendarActivities" => $calendarActivities,
                    "upvoteSystem" => $upvoteSystem,
                    "project" => $project

                ]
            );
        }else{
            return view("projects.wikiTemplateEdit", ["project" => $project]);
        }


    }


}
