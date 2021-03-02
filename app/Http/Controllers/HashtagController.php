<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Hashtag;
use App\HashtagProject;

class HashtagController extends Controller
{
    function index($hashtag){

        $count = HashtagProject::whereHas("hashtag", function($q) use($hashtag){
            $q->where("id", $hashtag);
        })->count();

        $hashtag = Hashtag::find($hashtag);


        return view("hashtag.projects", ["hashtag" => $hashtag, "count" => $count]);

    }


    function projects($hashtag){

        $projects = Project::with("titles")->with("user")->with("user.institution")->with("user.pendingInstitution")->where("status", "launched")->whereHas("hashtagProject", function($hashtagProjectQuery) use($hashtag){

            $hashtagProjectQuery->whereHas("hashtag", function($hashtagQuery) use($hashtag){

                $hashtagQuery->where("id", $hashtag);

            });

        })->with("likes")->with("user")->get();

        return response()->json(["projects" => $projects]);

    }

}
