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
                
                if($user->is_banned == 1){

                    return response()->json(["success" => false, "msg" => "Your account has been flagged by
                    another user. Please contact wikiPBL customer support"]);

                }

                if($user->email_verified_at == null){

                    return response()->json(["success" => false, "msg" => "You haven't validate your email"]);

                }else{
                    
                    if (Auth::attempt(['email' => $request->login_email, 'password' => $request->login_password], true)) {

                        if(isset($request->token)){
                            $user->fcm_token = $request->token;
                            $user->update();
                        }

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
        return redirect()->to("/front-test");
    }
}
