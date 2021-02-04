<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    function chooseTemplate(){

        return view("projects.templateOptions");

    }

    function createOwnTemplate(){

        return view("projects.ownTemplateCreate");

    }

    function wikiPBLTemplate(){

        return view("projects.wikiPBLTemplateCreate");

    }

    function publicOwnTemplate(){

        return view("projects.ownTemplatePublic");

    }

    function publicWikiPblTemplate(){
        return view("projects.wikiPBLTemplatePublic");
    }


}
