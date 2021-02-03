@extends('layouts.main')

@section('content')
<div class="container main-creation">
    <div class="row">
        <div class="col-md-6 flex-template ">
            <img class="mt-4 mb-4" alt='icno' src="{{ url('assets/img/iconos/template (1).svg') }}">
            <button class="btn btn-custom mb-3">Use Wikipbl template</button>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, maxime dolores consectetur perferendis
                nobis recusandae quas libero similique est tempora, tenetur cupiditate? Aliquid reiciendis, molestiae
                totam temporibus praesentium nihil exercitationem.</p>
        </div>
        <div class="col-md-6 flex-template ">
            <img class="mt-4 mb-4" alt='icono' src="{{ url('assets/img/iconos/template2.svg') }}">
            <button class="btn btn-custom mb-3">Use my own template</button>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, maxime dolores consectetur perferendis
                nobis recusandae quas libero similique est tempora, tenetur cupiditate? Aliquid reiciendis, molestiae
                totam temporibus praesentium nihil exercitationem.</p>
        </div>
    </div>
</div>
@endsection
