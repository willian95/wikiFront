<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;

class StateController extends Controller
{
    function fetch($country_id){

        $states = State::where("country_id", $country_id)->get();

        return response()->json(["states" => $states]);

    }
}
