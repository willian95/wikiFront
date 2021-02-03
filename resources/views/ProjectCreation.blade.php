@extends("layouts.main")

@section("content")

<div class="container  main-template mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="menu-template">
                <p>Edit mode </p>
                <div class="menu-template_option">
                    <ul>
                        <p>Main info</p>
                        <li> wikiPBL Title</li>
                        <li> Driving Question</li>
                        <li> Subject (s)</li>
                        <li> Time Frame</li>
                        <li>Project Summary</li>
                        <li> Public Product (Individual and in
                            Groups)</li>
                        <li> Level & Age</li>
                        <li> #hashtags</li>

                    </ul>
                </div>
                <div class="menu-template_option">
                    <ul>
                        <p>Main info</p>
                        <li><button class="btn btn-custom">Launch</button></li>

                    </ul>
                </div>
            </div>

        </div>
        <!----------------info----------------->
        <div class="col-md-9 info-template">
            <!--------------------general--------------------------->
            <ul class="content_template content_template-general">
                <li class="content_template-general-item">
                    <h3 class="titulo-templates">wikiPBL Title <a class="txt-edit" href="#">
                            Click to edit
                            <img alt='icon' class="icnon-edit" src="{{ url('assets/img/iconos/edit-pinc.svg') }}">
                        </a>
                    </h3>

                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates">Driving question</h3>
                    <p>(you can edit Driving question for whatever Title)</p>
                    <textarea name="" id="" cols="30" rows="10"></textarea>

                </li>
                <li class="content_template-general-item">
                    <h3 class="titulo-templates">Subject (s)</h3>
                    <p>(you can edit Subject(s) for whatever Title)</p>
                    <input type="text" placeholder="asdfg">
                    <div>
                        Subject (s)
                    </div>
                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates">Time Frame</h3>
                    <p>(you can edit Time Frame for whatever Title) </p>
                    <textarea name="" placeholder="3 Week - 5 hours a week
" id="" cols="30" rows="10"></textarea>
                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates">Project summary</h3>
                    <textarea name="" placeholder="This will be shown as a preview of your wikiPBL project.........
" id="" cols="30" rows="10"></textarea>
                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates">Public Product
                        (Individual and in
                        Groups)</h3>
                    <p>(you can edit this for whatever Title)
                    </p>
                    <textarea name="" placeholder="What will be the product that students will show to an audience? 
" id="" cols="30" rows="10"></textarea>
                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates">Level</h3>
                    <p>(you can edit this for whatever Title)
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inp"></label>
                                <select id="inpt" class="form-control">
                                    <option value="">Choose your level </option>
                                    <option>Pre-School </option>
                                    <option value="">Primary/Elementary School
                                    </option>
                                    <option value="">Middle School
                                    </option>
                                    <option value="">High School
                                    </option>
                                    <option value="">Doesn’t Apply
                                    </option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    13
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    15
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    16
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    17
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    +18
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    This project is suitable for all age

                                </label>
                            </div>


                        </div>
                    </div>
                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates">#hashtags</h3>
                    <div>
                        Math
                    </div>
                    <input type="text" placeholder="Type and enter to add each #hashtag">
                </li>

            </ul>
            <!-----------------------END general------------------------>

            <div class="content_template">

                <textarea name="" placeholder="" id="" cols="30" rows="10"></textarea>

                <div class="contente_item">
                    <h3 class="titulo-templates">Calendar of activities </h3>
                    <select id="inpt" class="form-control">
                        <option value="">Week 1 to 4</option>
                        <option value="">Week 1 to 4</option>
                        <option value="">Week 1 to 4</option>
                        <option value="">Week 1 to 4</option>
                    </select>

                </div>

                <div class="contente_item">
                    <h3 class="titulo-templates">Bibliography (mandatory)</h3>
                    <textarea name="" lang="" placeholder="Always cite!" id="" cols="30" rows="10"></textarea>
                </div>

                <div>
                    <h1>Which Upvote System
                        options will your WikiPBL
                        have?
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
