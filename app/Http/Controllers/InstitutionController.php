<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;

class InstitutionController extends Controller
{
    
    function fetchAllInstitutions(){

        $institutions = Institution::orderBy("name")->get();
        return response()->json(["institutions" => $institutions]);
        
    }

}
