<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\InstitutionRegisterRequest;
use App\PendingInstitution;
use Illuminate\Support\Str;
use App\AdminMail;
use App\User;
use App\Institution;
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
            $user->show_my_email = 0;
            $user->register_hash = Str::random(40);
            
            if($request->institution_not_registered == "false" || $request->institution_not_registered == "false"){
                
                $user->institution_email = $request->institution_email;
                $user->institution_id = $request->institution_id;

            }else{

                $pendingInstitution = $this->storePendingInstitution($request);

                $user->pending_institution_name = $request->institution_name;
                $user->pending_institution_id = $pendingInstitution->id;

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

        $institution = PendingInstitution::where("name", strtolower($request->institution_name))->first();
        if($institution == null){

            $pendingInstitution = new PendingInstitution;
            $pendingInstitution->name = strtolower($request->institution_name);
            $pendingInstitution->website = $request->institution_website;
            $pendingInstitution->email = $request->institution_contact_email;
            $pendingInstitution->save();

            return $pendingInstitution;

            if(env("SEND_EMAIL") == true){
                $this->sendAdminEmail("New pending institution registered", "The ".$pendingInstitution->name." has been registered", "", false);
            }

        }else{
            return $institution;
        }

    }

    function sendEmail($user){

        $to_name = $user->name;
        $to_email = $user->email;
        $data = ["user" => $user, "registerHash" => $user->register_hash];

        \Mail::send("emails.register", $data, function($message) use ($to_name, $to_email) {

            $message->to($to_email, $to_name)->subject("Welcome to wikiPBL, just one more step!");
            $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

        });

    }

    function resendEmail(Request $request){

        $user = User::find($request->id);

        if($user->register_hash){
            $this->sendEmail($user);
            return response()->json(["success" => true, "msg" => "Email sent"]);
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
            
            dd($e);
        }

    }

    function sendAdminEmail($title, $description, $link, $showLink){

        foreach(AdminMail::all() as $adminMail){

            $to_name = "admin";
            $to_email = $adminMail->email;
            $data = ["title" => $title, "description" => $description, "link" => $link, "showLink" => $showLink];

            \Mail::send("emails.adminMail", $data, function($message) use ($to_name, $to_email, $title) {

                $message->to($to_email, $to_name)->subject($title);
                $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

            });

        }

    }

    function institutionRegister(InstitutionRegisterRequest $request){

        try{

            $institution = $this->storeInstitution($request);

            $user = new User;
            $user->name = $request->admin_institution_name;
            $user->lastname = $request->admin_institution_lastname;
            $user->email = $request->admin_institution_email;
            $user->password = bcrypt($request->admin_institution_password);
            $user->role_id = 3;
            $user->phone = $request->admin_institution_phone;
            $user->register_hash = Str::random(40);
            $user->institution_email = $request->admin_institution_email;
            $user->institution_id = $institution->id;
            $user->save();

            if(env("SEND_EMAIL") == true){
                $this->sendEmail($user);
                $this->sendAdminEmail("New institution registered", "The ".$institution->name." ".$institution->type." has been registered", url('/institution/show/'.$institution->id), true);
            }
            
            return response()->json(["success" => true, "msg" => "Successfully registered", "user" => $user]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Something went wrong", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function storeInstitution($request){

        $institution = new Institution;
        $institution->name = $request->institution_name;
        $institution->type = $request->institution_type;
        $institution->website = $request->institution_website;
        $institution->save();

        return $institution;

    }


}
