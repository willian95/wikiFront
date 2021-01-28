<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    
    function fetch(){

        $countries = Country::all();

        return response()->json(["countries" => $countries]);

    }


}
