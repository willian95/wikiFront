<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RestorePasswordRequest;
use App\Http\Requests\PasswordChangeRequest;
use App\User;
use Illuminate\Support\Str;

class RestorePasswordController extends Controller
{
    
    function sendEmail(RestorePasswordRequest $request){

        $user = User::where("email", $request->email)->first();
        $user->recovery_hash = Str::random(40);
        $user->update();

        $to_name = $user->name;
        $to_email = $user->email;
        $data = ["user" => $user, "recovery_hash" => $user->recovery_hash];

        if(env("SEND_EMAIL") == true){
            
            \Mail::send("emails.restorePassword", $data, function($message) use ($to_name, $to_email) {

                $message->to($to_email, $to_name)->subject("Restore your password!");
                $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));
    
            });
        }

        return response()->json(["success" => true, "msg" => "Email sent"]);

    }

    function index($recoveryHash){

        try{

            $user = User::where("recovery_hash", $recoveryHash)->firstOrFail();
            return view("passwordRestore", ["user" => $user]);

        }catch(\Exception $e){
            abort(503);
        }

    }

    function change(PasswordChangeRequest $request){

        try{

            $user = User::where("recovery_hash", $request->recoveryHash)->firstOrFail();
            $user->password = bcrypt($request->password);
            $user->recovery_hash = null;
            $user->update();

            return response()->json(["success" => true, "msg" => "You have successfully restored your password"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Something went wrong", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }


}
