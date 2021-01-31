@extends('layouts.main')

@section('content')
<div class="container">

    <div class="main-profile">
        <div class="main-profile_content">
            <h1 class="text-center">Educator profile</h1>
            <p>Stats</p>
        </div>
        <div class="main-profile_dates mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <p><strong> Name:</strong>Harvard University</p>
                        <p>
                            <strong>Email:</strong> 22/NOV/2020
                            <!-- Rounded switch -->
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </p>
                        <p><strong>Institution:</strong> Stanford</p>
                        <p><strong>Member since: </strong> 11/22/202</p>
                        <p><strong>Country:</strong> United States of America</p>
                        <p><strong>City: </strong>Cambridge, MA</p>
                        <p><strong>CV/Resume:</strong> Https://www.myresume/cv/linkdln.com</p>
                        <p><strong>Portfolio:</strong>Https://www.myportafolio</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3> “ Why do you educate? ”</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est nesciunt sunt ratione
                        recusandae, nisi reiciendis, rerum pariatur, voluptates consectetur modi eveniet vitae ex
                        natus. Atque quia dolor repudiandae veritatis cupiditate.</p>

                    <div class="text-right">
                        <button class="btn btn-custom">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-wikis mt-5">
            <div class="text-center">
                <h3>My projects - Dashboard</h3>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        My wikiPBL

                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    12
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        My Public wikiPB

                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                                <div class="card-body">
                                    3
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Following
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">
                                    11
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">

                    <div id="accordion" class="wiki-accordion">
                        <div class="card">
                            <div class="" id="wikigOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#wikiOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        <p>1. PBL Title, Name of the educator, Name of the institution</p>
                                    </button>
                                </h5>
                            </div>

                            <div id="wikiOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <button class="btn btn-custom">ORIGINAL DOCUMENT</button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="" id="wikiTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#wikiTwo"
                                        aria-expanded="false" aria-controls="wikiTwo">
                                        <p>2. PBL Title, Name of the educator, Name of the institution</p>
                                    </button>
                                </h5>
                            </div>
                            <div id="wikiTwo" class="collapse" aria-labelledby="wikiTwo" data-parent="#accordion">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                    sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                    cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                    Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                    you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="" id="wikithree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#wikithree" aria-expanded="false" aria-controls="collapseThree">
                                        <p>3. PBL Title, Name of the educator, Name of the institution</p>
                                    </button>
                                </h5>
                            </div>
                            <div id="wikithree" class="collapse" aria-labelledby="wikithree" data-parent="#accordion">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                    sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                    cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                    Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                    you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <footer class="footer-estyle">
        <div class="footer container mt-5 text-center">
            <p> <a href="#">Privacy Policy </a> - <a href="#">Terms & Conditions</a> - <a href="#">About WikiPBL</a>
                - 2021 Copyrights - Contact us! </p>
        </div>
    </footer>
</div>
@endsection
