<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    function fetchLast(){

        $notifications = Notification::orderBy("id", "desc")->where("user_id", \Auth::user()->id)->take(6)->get();
        return response()->json(["notifications" => $notifications]);
    }


    function seen(){

        Notification::where("user_id", \Auth::user()->id)->update([
            "is_seen" => 1
        ]);

    }
}
