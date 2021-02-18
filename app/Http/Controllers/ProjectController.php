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
use App\ProjectShare;
use App\ProjectReport;
use App\Like;
use App\AdminMail;
use App\UpvoteSystemProject;
use App\UpvoteSystemProjectVote;
use DB;
use PDF;

class ProjectController extends Controller
{
    
    function chooseTemplate(){

        return view("projects.templateOptions");

    }

    function createOwnTemplate(){

        $project = $this->createProject("own-template");
        return redirect()->to(url('project/create/'.$project->id));
    }

    function showCreateOwnTemplate($id){

        $project = Project::find($id);
        return view("projects.ownTemplateCreate", ["project" => $project]);
    }

    function createWikiTemplate(){

        $project = $this->createProject("wiki-template");
        return redirect()->to(url('project/wiki/create/'.$project->id));

    }

    function showCreateWikiTemplate($id){

        $project = Project::find($id);
        return view("projects.wikiPBLTemplateCreate", ["project" => $project]);
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
            $this->storeAssestmentPoints($request);

            Title::where("project_id", $request->projectId)->where("user_id", \Auth::user()->id)->update(["status" => "launched"]);
            SecondaryField::where("project_id", $request->projectId)->where("user_id", \Auth::user()->id)->update(["status" => "launched"]);

            $project = Project::find($request->projectId);
            $project->status = "launched";
            $project->is_private = $request->is_private;
            $project->update();
            
            return response()->json(["success" => true, "msg" => "Project successfully launched"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Something went wrong", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function storeSubjects($request){

        $subjectProjects = SubjectProject::where("project_id", $request->projectId)->get();
        foreach($subjectProjects as $subjectProject){
            $subjectProject->delete();
        }

        $subjectArray = explode(",", $request->subject);
        $level = json_decode($request->level);

        foreach($subjectArray as $subject){
            
            $institutionType = "";
            if($level->level == "nursery" || $level->level == "early" || $level->level == "primary" || $level->level == "middle" || $level->level == "high" || $level == "undergraduate"){
                $institutionType = "school";
            }else{
                $institutionType = "university";
            }

            if(!$this->checkIfSubjectExits(strtolower($subject), $institutionType, $request)){

                $subjectModel = new Subject;
                $subjectModel->name = strtolower($subject);
                $subjectModel->institution_type = $institutionType;
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

    function checkIfSubjectExits($subject, $type, $request){

        $level = json_decode($request->level);
        if(Subject::where("name", $subject)->where("level", $level->level)->where("institution_type", $type)->count() == 0){

            return false;

        }

        return true;

    }

    function storeHashtags($request){
        
        $hashtagArray = explode(",", $request->hashtag);
        $hashtagProjects = HashtagProject::where("project_id", $request->projectId)->get();
        foreach($hashtagProjects as $hashtagProject){
            $hashtagProject->delete();
        }

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

    function storeAssestmentPoints($request){

        $assestmentArray = json_decode($request->upvoteSystem);
        foreach($assestmentArray as $assestment){

            $upvote = new UpvoteSystemProject;
            $upvote->assestment_point_type_id = $assestment;
            $upvote->project_id = $request->projectId;
            $upvote->save();

        }
        
        
    }

    function saveCreation(Request $request){

        try{

            $project = Project::find($request->projectId);
            $project->is_private = boolval($request->is_private);
            $project->update();

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

            $this->secondaryField($request, "creation", "toolsTitle", "tools");
            $this->secondaryField($request, "creation", "learningGoalsTitle", "learningGoals");
            $this->secondaryField($request, "creation", "resourcesTitle", "resources");
            $this->secondaryField($request, "creation", "projectMilestoneTitle", "projectMilestone");
            $this->secondaryField($request, "creation", "expertTitle", "expert");
            $this->secondaryField($request, "creation", "fieldWorkTitle", "fieldWork");
            $this->secondaryField($request, "creation", "globalConnectionsTitle", "globalConnections");
        
        }catch(\Exception $e){
            
            return response()->json(["success" => false, "msg" => "Something went worng", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function saveEdition(Request $request){

        try{

            $project = Project::find($request->projectId);
            $project->is_private = boolval($request->is_private);
            $project->update();

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
            
            $this->secondaryField($request, "creation", "toolsTitle", "tools");
            $this->secondaryField($request, "creation", "learningGoalsTitle", "learningGoals");
            $this->secondaryField($request, "creation", "resourcesTitle", "resources");
            $this->secondaryField($request, "creation", "projectMilestoneTitle", "projectMilestone");
            $this->secondaryField($request, "creation", "expertTitle", "expert");
            $this->secondaryField($request, "creation", "fieldWorkTitle", "fieldWork");
            $this->secondaryField($request, "creation", "globalConnectionsTitle", "globalConnections");

            if(Project::find($request->projectId)->status == "pending")
                $this->secondaryField($request, "edition", "upvoteSystemTitle", "upvoteSystem");
        
        
        }catch(\Exception $e){
            
            return response()->json(["success" => false, "msg" => "Something went worng", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function storeTitle($request, $action){

        if(isset($request->title)){
            
            if($this->checkDifferencesInTitle($request->title, $request->projectId)){
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

    }

    function checkDifferencesInTitle($newTitle, $projectId){

        $title = title::where("project_id", $projectId)->orderBy("id", "desc")->where("status", "launched")->first();
    
        if($title){
            
            if($title->title == $newTitle){
                
                return false;
            }

        }

        return true;

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
            $description = str_replace("\\n", "", $request->input($descriptionField));
            $description = str_replace("\n", "", $description);
            $secondaryField->project_id = $request->projectId;
            $secondaryField->description = $description;
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

    function pdfTemplate($projectId){ 

        $project = Project::find($projectId);

        $title = "";
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
        $projectSumary = "";

        $title = $this->titleSection($project->id)->title;
        $drivingQuestionTitle = $this->projectSection($project->id, "drivingQuestion")->title;
        $drivingQuestion = $this->projectSection($project->id, "drivingQuestion")->description;
        $timeFrameTitle = $this->projectSection($project->id, "timeFrame")->title;
        $timeFrame = $this->projectSection($project->id, "timeFrame")->description;
        $publicProductTitle = $this->projectSection($project->id, "publicProduct")->title;
        $publicProduct = $this->projectSection($project->id, "publicProduct")->description;
        $mainInfo = $this->projectSection($project->id, "mainInfo")->description;
        $bibliography = $this->projectSection($project->id, "bibliography")->description;
        $subjectTitle = $this->projectSection($project->id, "subject")->title;
        $subjects = $this->projectSection($project->id, "subject")->description;
        $levelTitle = $this->projectSection($project->id, "level")->title;
        $level = $this->projectSection($project->id, "level")->description;
        $hashtag = $this->projectSection($project->id, "hashtag")->description;
        $calendarActivities = $this->projectSection($project->id, "calendarActivities")->description;
        $upvoteSystem = $this->projectSection($project->id, "upvoteSystem")->description;
        $projectSumary = $this->projectSection($project->id, "projectSumary")->description;

        if($project->type == "own-template"){
            $pdf = PDF::loadView("pdfs.own-template", 
                [
                    "id" => $project->id, 
                    "title" => $title, 
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
                    "calendarActivities" => str_replace("'", "\'", $calendarActivities),
                    "upvoteSystem" => $upvoteSystem,
                    "projectSumary" => $projectSumary,
                    "project" => $project

                ]
            );

            return  $pdf->stream();

        }else{

            $toolsTitle = $this->projectSection($project->id, "tools")->title;
            $tools = $this->projectSection($project->id, "tools")->description;
            $learningGoalsTitle = $this->projectSection($project->id, "learningGoals")->title;
            $learningGoals = $this->projectSection($project->id, "learningGoals")->description;
            $resourcesTitle = $this->projectSection($project->id, "resources")->title;
            $resources = $this->projectSection($project->id, "resources")->description;
            $projectMilestonesTitle = $this->projectSection($project->id, "projectMilestone")->title;
            $projectMilestones = $this->projectSection($project->id, "projectMilestone")->description;
            $expertTitle = $this->projectSection($project->id, "expert")->title;
            $expert  = $this->projectSection($project->id, "expert")->description;
            $fieldWorkTitle = $this->projectSection($project->id, "fieldWork")->title;
            $fieldWork  = $this->projectSection($project->id, "fieldWork")->description;
            $globalConnectionsTitle = $this->projectSection($project->id, "globalConnections")->title;
            $globalConnections = $this->projectSection($project->id, "globalConnections")->description;

            $pdf = PDF::loadView("pdfs.wiki-template", [
                    "id" => $project->id, 
                    "title" => $title, 
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
                    "calendarActivities" => str_replace("'", "\'", $calendarActivities),
                    "upvoteSystem" => $upvoteSystem,
                    "projectSumary" => $projectSumary,
                    "project" => $project,
                    "toolsTitle" => $toolsTitle,
                    "tools" => $tools,
                    "learningGoalsTitle" => $learningGoalsTitle,
                    "learningGoals" => str_replace("'", "\'", $learningGoals),
                    "resourcesTitle" => $resourcesTitle,
                    "resources" => $resources,
                    "projectMilestonesTitle" => $projectMilestonesTitle,
                    "projectMilestones" => str_replace("'", "\'", $projectMilestones),
                    "expertTitle" => $expertTitle,
                    "expert" => $expert,
                    "fieldWorkTitle" => $fieldWorkTitle,
                    "fieldWork" => $fieldWork,
                    "globalConnectionsTitle" => $globalConnectionsTitle,
                    "globalConnections" => $globalConnections
                ]
            );

            return  $pdf->stream();

        }

    }

    function myProjects($page){

        $dataAmount = 10;
        $skip = ($page-1) * $dataAmount;

        $projectQuery = Project::where("user_id", \Auth::user()->id)->withTrashed()->orderBy("id", "desc")->with(["titles" => function($q){
                $q->orderBy("id", "desc");
            }
        ]);

        $projects = $projectQuery->skip($skip)->take($dataAmount)->get();
        $projectsCount = $projectQuery->count();

        return response()->json(["success" => true, "projects" => $projects, "projectsCount" => $projectsCount, "dataAmount" => $dataAmount]);

    }

    function myFollowProjects($page){

        $dataAmount = 10;
        $skip = ($page-1) * $dataAmount;

        $projectQuery = ProjectShare::where("user_id", \Auth::user()->id)
            ->orderBy("id", "desc")
            ->with(["project" => function($q){
                $q->with(["titles" => function($q){
                    $q->orderBy("id", "desc");
                }]);
            }]);
        
        $projects = $projectQuery->skip($skip)->take($dataAmount)->get();
        $projectsCount = $projectQuery->count();

        return response()->json(["success" => true, "projects" => $projects, "projectsCount" => $projectsCount, "dataAmount" => $dataAmount]);

    }

    function editProject($id){

        $project = Project::where("id", $id)->with(["titles" => function($q){
                if($q->where("user_id", \Auth::user()->id)->where("status", "pending")->count() > 0){
                    $q->orderBy("id", "desc")->where("user_id", \Auth::user()->id)->where("status", "pending")->take(1);
                }else{
                    $q->orderBy("id", "desc")->take(1);
                }
                
            }
        ])->with(["secondaryFields" => function($q){
            
            $q->groupBy('type')->orderBy('id', 'desc')->get(['type', 'title', 'description', DB::raw('MAX(id) as id')]);

        }])->get(); 

        if($project[0]->is_private == 1){
           return redirect()->to("/project/show/".$project[0]->id);
        }

        $title = "";
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
        $projectSumary = "";

        $title = $this->titleSection($project[0]->id)->title;
        $drivingQuestionTitle = $this->projectSection($project[0]->id, "drivingQuestion")->title;
        $drivingQuestion = $this->projectSection($project[0]->id, "drivingQuestion")->description;
        $timeFrameTitle = $this->projectSection($project[0]->id, "timeFrame")->title;
        $timeFrame = $this->projectSection($project[0]->id, "timeFrame")->description;
        $publicProductTitle = $this->projectSection($project[0]->id, "publicProduct")->title;
        $publicProduct = $this->projectSection($project[0]->id, "publicProduct")->description;
        $mainInfo = $this->projectSection($project[0]->id, "mainInfo")->description;
        $bibliography = $this->projectSection($project[0]->id, "bibliography")->description;
        $subjectTitle = $this->projectSection($project[0]->id, "subject")->title;
        $subjects = $this->projectSection($project[0]->id, "subject")->description;
        $levelTitle = $this->projectSection($project[0]->id, "level")->title;
        $level = $this->projectSection($project[0]->id, "level")->description;
        $hashtag = $this->projectSection($project[0]->id, "hashtag")->description;
        $calendarActivities = $this->projectSection($project[0]->id, "calendarActivities")->description;
        $upvoteSystem = $this->projectSection($project[0]->id, "upvoteSystem")->description;
        $projectSumary = $this->projectSection($project[0]->id, "projectSumary")->description;

        if($project[0]->type == "own-template"){
            return view("projects.ownTemplateEdit", 
                [
                    "id" => $project[0]->id, 
                    "title" => $title, 
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
                    "calendarActivities" => str_replace("'", "\'", $calendarActivities),
                    "upvoteSystem" => $upvoteSystem,
                    "projectSumary" => $projectSumary,
                    "project" => $project

                ]
            );
        }else{

            $toolsTitle = $this->projectSection($project[0]->id, "tools")->title;
            $tools = $this->projectSection($project[0]->id, "tools")->description;
            $learningGoalsTitle = $this->projectSection($project[0]->id, "learningGoals")->title;
            $learningGoals = $this->projectSection($project[0]->id, "learningGoals")->description;
            $resourcesTitle = $this->projectSection($project[0]->id, "resources")->title;
            $resources = $this->projectSection($project[0]->id, "resources")->description;
            $projectMilestonesTitle = $this->projectSection($project[0]->id, "projectMilestone")->title;
            $projectMilestones = $this->projectSection($project[0]->id, "projectMilestone")->description;
            $expertTitle = $this->projectSection($project[0]->id, "expert")->title;
            $expert  = $this->projectSection($project[0]->id, "expert")->description;
            $fieldWorkTitle = $this->projectSection($project[0]->id, "fieldWork")->title;
            $fieldWork  = $this->projectSection($project[0]->id, "fieldWork")->description;
            $globalConnectionsTitle = $this->projectSection($project[0]->id, "globalConnections")->title;
            $globalConnections = $this->projectSection($project[0]->id, "globalConnections")->description;

            return view("projects.wikiPBLTemplateEdit", [
                    "id" => $project[0]->id, 
                    "title" => $title, 
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
                    "calendarActivities" => str_replace("'", "\'", $calendarActivities),
                    "upvoteSystem" => $upvoteSystem,
                    "projectSumary" => $projectSumary,
                    "project" => $project,
                    "toolsTitle" => $toolsTitle,
                    "tools" => $tools,
                    "learningGoalsTitle" => $learningGoalsTitle,
                    "learningGoals" => str_replace("'", "\'", $learningGoals),
                    "resourcesTitle" => $resourcesTitle,
                    "resources" => $resources,
                    "projectMilestonesTitle" => $projectMilestonesTitle,
                    "projectMilestones" => str_replace("'", "\'", $projectMilestones),
                    "expertTitle" => $expertTitle,
                    "expert" => $expert,
                    "fieldWorkTitle" => $fieldWorkTitle,
                    "fieldWork" => $fieldWork,
                    "globalConnectionsTitle" => $globalConnectionsTitle,
                    "globalConnections" => $globalConnections
                ]
            );
        }
        
    }   

    function projectSection($projectId, $type){

        $count = SecondaryField::where("project_id", $projectId)->where("type", $type)->where("user_id", \Auth::user()->id)->where("status", "pending")->count();
        if($count > 0){
           
            $secondary = SecondaryField::where("project_id", $projectId)->where("type", $type)->where("user_id", \Auth::user()->id)->where("status", "pending")->orderBy("id", "desc")->first();

        }else{

            $secondary = SecondaryField::where("project_id", $projectId)->where("type", $type)->orderBy("id", "desc")->where("status", "launched")->first();

        }   
        
        return $secondary;

    }

    function titleSection($projectId){

        $count = Title::where("project_id", $projectId)->where("user_id", \Auth::user()->id)->where("status", "pending")->count();
        if($count > 0){
           
            $title = title::where("project_id", $projectId)->where("user_id", \Auth::user()->id)->where("status", "pending")->orderBy("id", "desc")->first();

        }else{

            $title = title::where("project_id", $projectId)->orderBy("id", "desc")->where("status", "launched")->first();

        }   
        
        return $title;

    }

    public function show($slug){

        //dd($slug);

        $projctId = $slug;

        $project = Project::where("id", $projctId)->with(["titles" => function($q){
            $q->orderBy("id", "desc")->where("status", "launched")->take(1);
            }
        ])->with(["secondaryFields" => function($q){

            $q->groupBy('type')->orderBy('id', 'desc')->where("status", "launched")->get(['type', 'title', 'description', DB::raw('MAX(id) as id')]);

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
        $projectSumary = "";

        $title = $this->showTitleSection($project[0]->id)->title;
        $drivingQuestionTitle = $this->showProjectSection($project[0]->id, "drivingQuestion")->title;
        $drivingQuestion = $this->showProjectSection($project[0]->id, "drivingQuestion")->description;
        $timeFrameTitle = $this->showProjectSection($project[0]->id, "timeFrame")->title;
        $timeFrame = $this->showProjectSection($project[0]->id, "timeFrame")->description;
        $publicProductTitle = $this->showProjectSection($project[0]->id, "publicProduct")->title;
        $publicProduct = $this->showProjectSection($project[0]->id, "publicProduct")->description;
        $mainInfo = $this->showProjectSection($project[0]->id, "mainInfo")->description;
        $bibliography = $this->showProjectSection($project[0]->id, "bibliography")->description;
        $subjectTitle = $this->showProjectSection($project[0]->id, "subject")->title;
        $subjects = $this->showProjectSection($project[0]->id, "subject")->description;
        $levelTitle = $this->showProjectSection($project[0]->id, "level")->title;
        $level = $this->showProjectSection($project[0]->id, "level")->description;
        $hashtag = $this->showProjectSection($project[0]->id, "hashtag")->description;
        $calendarActivities = $this->showProjectSection($project[0]->id, "calendarActivities")->description;
        $upvoteSystem = $this->showProjectSection($project[0]->id, "upvoteSystem")->description;
        $assestmentPoints = UpvoteSystemProject::where("project_id", $project[0]->id)->with("assestmentPointType")->get();
        $assestmentArray = [];

        foreach($assestmentPoints as $point){
            $assestmentPointsArray[] = [
                "name" =>  $point->assestmentPointType->name,
                "value" => UpvoteSystemProjectVote::where("project_id", $project[0]->id)->where("assestment_point_type_id", $point->assestmentPointType->id)->count()
            ];
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
                    "calendarActivities" => str_replace("'", "\'", $calendarActivities),
                    "upvoteSystem" => $upvoteSystem,
                    "projectSumary" => $projectSumary,
                    "project" => $project,
                    "assestmentPoints" => $assestmentPoints,
                    "assestmentPointsArray" => json_encode($assestmentPointsArray)

                ]
            );
        }else{

            $toolsTitle = $this->showProjectSection($project[0]->id, "tools")->title;
            $tools = $this->showProjectSection($project[0]->id, "tools")->description;
            $learningGoalsTitle = $this->showProjectSection($project[0]->id, "learningGoals")->title;
            $learningGoals = $this->showProjectSection($project[0]->id, "learningGoals")->description;
            $resourcesTitle = $this->showProjectSection($project[0]->id, "resources")->title;
            $resources = $this->showProjectSection($project[0]->id, "resources")->description;
            $projectMilestonesTitle = $this->showProjectSection($project[0]->id, "projectMilestone")->title;
            $projectMilestones = $this->showProjectSection($project[0]->id, "projectMilestone")->description;
            $expertTitle = $this->showProjectSection($project[0]->id, "expert")->title;
            $expert  = $this->showProjectSection($project[0]->id, "expert")->description;
            $fieldWorkTitle = $this->showProjectSection($project[0]->id, "fieldWork")->title;
            $fieldWork  = $this->showProjectSection($project[0]->id, "fieldWork")->description;
            $globalConnectionsTitle = $this->showProjectSection($project[0]->id, "globalConnections")->title;
            $globalConnections = $this->showProjectSection($project[0]->id, "globalConnections")->description;
            $assestmentPoints = UpvoteSystemProject::where("project_id", $project[0]->id)->with("assestmentPointType")->get();
            $assestmentPointsArray = [];

            foreach($assestmentPoints as $point){
                $assestmentPointsArray[] = [
                    "name" =>  $point->assestmentPointType->name,
                    "value" => UpvoteSystemProjectVote::where("project_id", $project[0]->id)->where("assestment_point_type_id", $point->assestmentPointType->id)->count()
                ];
            }

            return view("projects.wikiPBLTemplateShow", [
                "id" => $project[0]->id, 
                "title" => $title, 
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
                "calendarActivities" => str_replace("'", "\'", $calendarActivities),
                "upvoteSystem" => $upvoteSystem,
                "projectSumary" => $projectSumary,
                "project" => $project,
                "toolsTitle" => $toolsTitle,
                "tools" => $tools,
                "learningGoalsTitle" => $learningGoalsTitle,
                "learningGoals" => str_replace("'", "\'", $learningGoals),
                "resourcesTitle" => $resourcesTitle,
                "resources" => $resources,
                "projectMilestonesTitle" => $projectMilestonesTitle,
                "projectMilestones" => str_replace("'", "\'", $projectMilestones),
                "expertTitle" => $expertTitle,
                "expert" => $expert,
                "fieldWorkTitle" => $fieldWorkTitle,
                "fieldWork" => $fieldWork,
                "globalConnectionsTitle" => $globalConnectionsTitle,
                "globalConnections" => $globalConnections,
                "assestmentPoints" => $assestmentPoints,
                "assestmentPointsArray" => json_encode($assestmentPointsArray)
            ]);
        }


    }

    function showProjectSection($projectId, $type){

        return SecondaryField::where("project_id", $projectId)->where("type", $type)->orderBy("id", "desc")->where("status", "launched")->first();

    }

    function showTitleSection($projectId){

        return Title::where("project_id", $projectId)->orderBy("id", "desc")->where("status", "launched")->first();

    }

    function followProject(Request $request){

        try{

            if(ProjectShare::where("project_id", $request->project_id)->where("user_id", \Auth::user()->id)->exists()){

                $this->unfollowProject($request);
                return response()->json(["success" => true, "msg" => "You unfollow this project"]);
    
            }else{
    
                $projectShare = new ProjectShare;
                $projectShare->project_id = $request->project_id;
                $projectShare->user_id = \Auth::user()->id;
                $projectShare->save();
    
                return response()->json(["success" => true, "msg" => "You are now following this project"]);
    
            }

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Something went wrong", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function unfollowProject($request){

        $projectShare = ProjectShare::where("project_id", $request->project_id)->where("user_id", \Auth::user()->id)->first();
        $projectShare->delete();

    }

    function likeProject(Request $request){

        try{

            if(Like::where("project_id", $request->project_id)->where("user_id", \Auth::user()->id)->exists()){

                $this->dislikeProject($request);
                return response()->json(["success" => true, "msg" => "You disliked this project"]);
    
            }else{
    
                $like = new Like;
                $like->project_id = $request->project_id;
                $like->user_id = \Auth::user()->id;
                $like->save();
    
                return response()->json(["success" => true, "msg" => "You liked this project"]);
    
            }

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Something went wrong", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function dislikeProject($request){

        $like = Like::where("project_id", $request->project_id)->where("user_id", \Auth::user()->id)->first();
        $like->delete();

    }

    function reportProject(Request $request){

        try{

            if(ProjectReport::where("project_id", $request->project_id)->where("user_id", \Auth::user()->id)->exists()){

                $this->deleteProjectReport($request);
                return response()->json(["success" => true, "msg" => "You undo the report this project"]);

            }else{
            
                $projectReport = new ProjectReport;
                $projectReport->project_id = $request->project_id;
                $projectReport->user_id = \Auth::user()->id;
                $projectReport->save();
                
                if(ProjectReport::where("project_id", $request->project_id)->count() == 10){
                    $this->banProject($request);
                }

                return response()->json(["success" => true, "msg" => "You have reported this project"]);

            }

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Something went wrong", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function deleteProjectReport($request){

        $projectReport = ProjectReport::where("project_id", $request->project_id)->where("user_id", \Auth::user()->id)->first();
        $projectReport->delete();

    }

    function BanProject($request){

        $project = Project::find($request->project_id);
        $project->status = "banned";
        $project->update();

        if(env("SEND_EMAIL") == true){
            $this->sendAdminReportEmail();
        }

    }

    function sendAdminReportEmail($request){

        foreach(AdminMail::all() as $adminMail){

            $to_name = "Admin";
            $to_email = $adminMail->email;
            $data = ["project_id" => $request->project_id];

            \Mail::send("emails.projectReport", $data, function($message) use ($to_name, $to_email) {

                $message->to($to_email, $to_name)->subject("Project reported");
                $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

            });

        }

    }

    function upvoteAssestmentPoint(Request $request){

        if(UpvoteSystemProjectVote::where("project_id", $request->project_id)->where("user_id", \Auth::user()->id)->where("assestment_point_type_id", $request->assestmentPointTypeId)->exists()){
            
            $this->downvoteAssestmentPoint($request);
            return response()->json(["action" => "substract"]);

        }else{

            $upvote = new UpvoteSystemProjectVote;
            $upvote->project_id = $request->project_id;
            $upvote->user_id = \Auth::user()->id;
            $upvote->assestment_point_type_id = $request->assestmentPointTypeId;
            $upvote->save();

            return response()->json(["action" => "add"]); 

        }

    }

    function downvoteAssestmentPoint($request){

        $upvote = UpvoteSystemProjectVote::where("project_id", $request->project_id)->where("user_id", \Auth::user()->id)->where("assestment_point_type_id", $request->assestmentPointTypeId)->first();
        $upvote->delete();

    }

}
