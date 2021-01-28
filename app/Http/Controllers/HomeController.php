<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $showModal = false;
        if(\Auth::user()->role_id == 3){

            $isProfileComplete = Institution::where("id", \Auth::user()->institution_id)->first()->is_profile_complete;

            if($isProfileComplete == 0){
                $showModal = true;
            }

        }

        return view('welcome', ["showModal" => $showModal]);
    }
}
