@extends("layouts.main")

@section("content")


<section class="mt-5 mb-5">

    <div class="home">
        <div class="home-present">
            <h1>Best source for project based!</h1>
            <!---------------->
            <div>
                <form action="">
                    <i class="fa fa-search icon-sear "></i>
                    <input type="text" class="search-home " placeholder="PBL names, teachers, #Hashtags!">
                </form>
            </div>
            <!---------------->
            <p>9.000+ projects and counting!</p>
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
        <!---------------->
        <div class="row word">
            <div class="col-md-4">
                <h3>Type</h3>
                <div class="check-inst check-inst-home">
                    <label>
                        <input type="radio" class="option-input radio" name="example" checked />
                        School
                    </label>
                    <label>
                        <input type="radio" class="option-input radio" name="example" />
                        University
                    </label>
                </div>
            </div>
            <div class="col-md-5">
                <h3> Categories/Subjects</h3>
                <div class="abc-home">
                    <div class="abc-content">
                        <strong><a href="1">A</a></strong>
                        <p><a href="2">aritmetica</a></p>
                        <p><a href=""> art</a></p>
                    </div>
                    <div class="abc-content">
                        <strong><a href="">A</a></strong>
                        <p><a href="">aritmetica</a></p>
                        <p><a href=""> art</a></p>
                    </div>
                    <div class="abc-content">
                        <strong><a href="">A</a></strong>
                        <p><a href="">aritmetica</a></p>
                        <p><a href=""> art</a></p>
                    </div>
                    <div class="abc-content">
                        <strong><a href="">A</a></strong>
                        <p><a href="">aritmetica</a></p>
                        <p><a href=""> art</a></p>
                    </div>
                    <div class="abc-content">
                        <strong><a href="">A</a></strong>
                        <p><a href="">aritmetica</a></p>
                        <p><a href=""> art</a></p>
                    </div>
                    <!--------opcion 2-------->
                    <div class="form-group">
                        <label for=""></label>
                        <select id="" class="form-control">
                            <option value="">1st Month </option>
                            <option>18th Month </option>
                        </select>

                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <h3> Age groups</h3>
                <div class="form-group">
                    <label for=""></label>
                    <select id="" class="form-control">
                        <option value="">Nursery 0 - 3 </option>
                        <option>Early childhood 4 - 6

                        </option>
                    </select>

                </div>
            </div>
        </div>
    </div>

    <div class="feactured-home">
        <h3 class="ml-3 mb-4 font-titulos ">Today’s featured wikiPBL!</h3>
        <div class="feactured-one">
            <p class="titulo">What ever title <br> <span>by Alicia Suarez</span> </p>
            <div class="row">
                <div class="col-md-6">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum fugit dignissimos praesentium
                        fuga
                        eveniet labore neque quos officiis earum eaque unde minima corporis voluptatum voluptatem
                        molestiae,
                        voluptatibus consequatur tenetur impedit?Lorem, ipsum dolor sit amet consectetur adipisicing
                        elit. Ipsum fugit dignissimos praesentium
                        fuga
                        eveniet labore neque quos officiis earum eaque unde minima corporis voluptatum voluptatem
                        molestiae,
                        voluptatibus consequatur tenetur impedit?</p>
                </div>
                <div class="col-md-3">
                    <p>Level & Age</p>
                    <p> Subject Name</p>
                    <p>Skills</p>
                    <p> Driving question</p>
                </div>
                <div class="col-md-3">
                    #Hashtag#Hashtag #Hashtag
                    #Hashtag
                    #Hashtag #Hashtag
                    <button class="btn btn-custom">View complete PBL</button>
                </div>





            </div>
        </div>
    </div>







    @endsection
