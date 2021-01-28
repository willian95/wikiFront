<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\User;
use Auth;

class AuthController extends Controller
{
    function login(LoginRequest $request){

        try{

            $user = User::where("email", $request->login_email)->first();
            if($user){

                if (Auth::attempt(['email' => $request->login_email, 'password' => $request->login_password], true)) {

                    if($user->email_verified_at == null){

                        return response()->json(["success" => false, "msg" => "You haven't validate your email"]);

                    }else{
                        $url = redirect()->intended()->getTargetUrl();
                        return response()->json(["success" => true, "msg" => "Signed in", "role_id" => Auth::user()->role_id, "url" => $url]);
                    }

                }
                    
                return response()->json(["success" => false, "msg" => "Wrong password"]);
                

            }else{
                return response()->json(["success" => false, "msg" => "User not found"]);
            }

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Something went wrong", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function logout(){
        Auth::logout();
        return redirect()->to("/");
    }
}
