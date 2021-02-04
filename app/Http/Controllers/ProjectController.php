<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

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

    function pdfTemplate(){

        $pdf = PDF::loadView('pdfs.project');
        return $pdf->stream();

    }


}
