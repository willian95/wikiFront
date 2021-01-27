<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\PendingInstitution;
use Illuminate\Support\Str;
use App\User;
use Carbon\Carbon;

class RegisterController extends Controller
{
    
    function teacherRegister(RegisterRequest $request){

        try{
           
            $user = new User;
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role_id = 2;
            $user->register_hash = Str::random(40);
            
            if(!$request->pendingInstitution){

                $user->institution_email = $request->institution_email;
                $user->institution_id = $request->institution_id;

            }else{

                $pendingInstitution = $this->storePendingInstitution($request);

                $user->pending_institution_name = $request->institution_name;
                $user->pending_insitution_id = $pendingInstitution->id;

            }

            $user->save();

            if(env("SEND_EMAIL") == true){
                $this->sendEmail($user);
            }
            
            return response()->json(["success" => true, "msg" => "Successfully registered", "user" => $user]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Something went wrong", "err" => $e->getMessage(), "ln" => $e->getLine() ]);

        }

    }

    function storePendingInstitution($request){

        $pendingInstitution = new PendingInstitution;
        $pendingInstitution->name = $request->pending_institution_name;
        $pendingInstitution->website = $request->pending_institution_website;
        $pendingInstitution->email = $request->pending_institution_email;
        $pendingInstitution->save();

        return $pendingInstitution;

    }

    function sendEmail($user){

        $to_name = $user->name;
        $to_email = $user->email;
        $data = ["user" => $user, "registerHash" => $user->register_hash];

        \Mail::send("emails.register", $data, function($message) use ($to_name, $to_email) {

            $message->to($to_email, $to_name)->subject("Welcome to WikiPBL, just one more step!");
            $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

        });

    }

    function resendEmail(Request $request){

        $user = User::find($request->id);

        if($user->register_hash){
            $this->sendEmail($user);
            return response()->json(["success" => true, "msg" => "Email sended"]);
        }else{
            return response()->json(["success" => false, "msg" => "Register code already used"]);
        }

        

    }

    function verify($registerHash){

        try{

            $user = User::where("register_hash", $registerHash)->firstOrFail();
            $user->register_hash = null;
            $user->email_verified_at = Carbon::now();
            $user->update();
            
            return redirect()->to('/');

        }catch(\Exception $e){
            
            abort(403);
        }

    }


}
