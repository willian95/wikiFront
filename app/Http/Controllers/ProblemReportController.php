<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProblemReportRequest;

class ProblemReportController extends Controller
{
    
    function report(ProblemReportRequest $request){

        $name = $request->name;
        $email = $request->email;
        $url = $request->url;
        $description = $request->description;

        $to_name = "Admin";
        $to_email = "rodriguezwillian95@gmail.com";
        $data = ["name" => $name, "email" => $email, "url" => $url, "description" => $description];

        \Mail::send("emails.problemReport", $data, function($message) use ($to_name, $to_email) {

            $message->to($to_email, $to_name)->subject("Problem reported!");
            $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

        });

        return response()->json(["success" => true, "msg" => "Problem reported"]);

    }

}
