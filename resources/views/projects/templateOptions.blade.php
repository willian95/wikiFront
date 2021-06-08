@extends('layouts.main')

@section('content')
<div class="container main-creation pt3 ">
    <div class="row">
        <div class="col-md-6 flex-template ">
            <img class="mt-4 mb-4" alt='icno' src="{{ url('assets/img/iconos/template (1).svg') }}">
            <a href="{{ url('project/wikiPBL-template/create') }}" class="btn btn-custom mb-3 mt-13 w-btns"><strong>wikiPBL</strong> Project Builder Template</a>
            <p class="mt-3">Have a project that others should hear about? Let our wikiPBL Project Builder Template guide you through the necessary steps to ensure educators around the world have the chance to replicate and build on your project process. This template uses required fields which will ensure that you include the basic components of a quality PBL project. Using this template will also help to ensure that wikiPBL projects have a minimum level commonality, which will facilitate the sharing and cooperative development of wikiPBL projects. Good for novices and experts alike!</p>
        </div>
        <div class="col-md-6 flex-template ">
            <img class="mt-4 mb-4" alt='icono' src="{{ url('assets/img/iconos/template2.svg') }}">
            <a href="{{ url('project/own-template/create') }}" class="btn btn-custom btn-custom-green mb-3 w-btns">Awesome Project Idea? <br> Freeform <strong>wikiPBL</strong> Project Builder</a>
            <p style="margin-top: 5px;">If you have a project idea without all the details, don’t hold back, be brave and get it out there. Our world of wikiPBL educators love taking projects from idea to Awesome! Choosing this freeform builder will automatically engage the incubator feature.</p>
        </div>
    </div>
</div>
@endsection
