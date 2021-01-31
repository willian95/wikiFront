@extends('layouts.main')

@section('content')


<div class="main-results">
    <div class="home-present">
        <!---------------->
        <div>
            <form action="">
                <i class="fa fa-search icon-sear "></i>
                <input type="text" class="search-home " placeholder="PBL names, teachers, #Hashtags!">
            </form>
        </div>
        <!---------------->
        <div class="hashtag-home">
            <a href="#"> <span>#Hashtag</span></a>
            <a href="#"> <span>#Hashtag</span></a>
            <a href="#"> <span>#Hashtag</span></a>
            <a href="#"> <span>#Hashtag</span></a>
            <a href="#"> <span>#Hashtag</span></a>
            <a href="#"> <span>#Hashtag</span></a>
            <a href="#"> <span>#Hashtag</span></a>
        </div>
    </div>
    <!------------------------>
    <div class="row word">
        <div class="col-md-12">
            <h3 class="text-center"> Subjects</h3>
            <div class="abc-home abc-categories">
                <div class="abc-content">
                    <strong><a href="1">M</a></strong>
                    <p><a href="2">Math</a></p>
                    <p><a href="">Math II</a></p>
                    <p><a href="">Micro Economics</a></p>
                    <p><a href="">Micro Physics</a></p>
                </div>
                <div class="abc-content">
                    <strong><a href="1">M</a></strong>
                    <p><a href="2">Math</a></p>
                    <p><a href="">Math II</a></p>
                    <p><a href="">Micro Economics</a></p>
                    <p><a href="">Micro Physics</a></p>
                </div>


            </div>

        </div>

        <div class="col-md-12">
            <h3 class="text-center"> Educators</h3>
            <div class="abc-home abc-categories">
                <div class="abc-content">
                    <strong><a href="1">M</a></strong>
                    <p><a href="2">Martin Luther King</a></p>

                </div>
            </div>

        </div>

        <!--------------wikiPBL’s Projects---------------------->
        <div class="col-md-12">
            <h3 class="text-center"> wikiPBL’s Projects</h3>
            <div class="abc-home abc-categories">
                <div class="abc-content">
                    <strong><a href="1">M</a></strong>
                    <p><a href="2">Martin Luther King</a></p>

                </div>
            </div>

        </div>




    </div>
</div>


@endsection
