<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;

class ProfileController extends Controller
{
    
    function delete(){

        $userId = \Auth::user()->id;

        $projects = Project::where("user_id", $userId)->get();
        foreach($projects as $project){

            $project->delete();

        }

        $user = User::find($userId);
        $user->email = $user->email.uniqid();
        $user->update();
        $user->delete();

        return response()->json(["success" => true, "msg" => "Profile successfully deleted"]);

    }

}
