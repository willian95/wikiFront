@extends('layouts.main')

@section('content')
<div class="container main-creation p5">
    <div class="row">
        <div class="col-md-6 flex-template ">
            <img class="mt-4 mb-4" alt='icno' src="{{ url('assets/img/iconos/template (1).svg') }}">
            <a href="{{ url('project/wikiPBL-template/create') }}" class="btn btn-custom mb-3">Create using wikiPBL project template</a>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, maxime dolores consectetur perferendis
                nobis recusandae quas libero similique est tempora, tenetur cupiditate? Aliquid reiciendis, molestiae
            totam temporibus praesentium nihil exercitationem.</p>
        </div>
        <div class="col-md-6 flex-template ">
            <img class="mt-4 mb-4" alt='icono' src="{{ url('assets/img/iconos/template2.svg') }}">
            <a href="{{ url('project/own-template/create') }}" class="btn btn-custom btn-custom-green mb-3">Start whith a blank slate </a>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, maxime dolores consectetur perferendis
                nobis recusandae quas libero similique est tempora, tenetur cupiditate? Aliquid reiciendis, molestiae
            totam temporibus praesentium nihil exercitationem.</p>
        </div>
    </div>
</div>
@endsection
