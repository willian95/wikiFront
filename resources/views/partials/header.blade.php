<header>
    <nav class='navbar navbar-expand-md navbar-fixed-js'>
        <div class='flex-custom'>
            <a class='brand ' href='{{ url('/front-test') }}'>
                <img alt='redes' src="{{ url('assets/img/logo.svg') }}">
            </a>
            <button class='navbar-toggler p-2 border-0 hamburger hamburger--elastic d-none-lg' data-toggle='offcanvas'
                type='button'>
                <span class='hamburger-box'>
                    <span class='hamburger-inner'></span>
                </span>
            </button>
            <div class='offcanvas-collapse fil' id='navbarNav'>
                <ul class='navbar-nav container'>
                    <div class="row">
                        <div class="col-md-12  mt-3">
                            <div class="menu-flex">
                                <li class='nav-item  border-nav' data-toggle="modal" data-target=".login-modal">
                                    <a class='nav-link '>Sign In</a>
                                </li>
                                <li class='nav-item  border-nav' data-toggle="modal" data-target=".register-modal">
                                    <a class='nav-link  '>Register</a>
                                </li>
                                <li class='nav-item w-nav' data-toggle="modal" data-target=".institution-modal">
                                    <a class='nav-link'>Institution Registration</a>
                                </li>
                            </div>
                        </div>

                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- LOGIN modal -->
<div class="modal fade login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="content-modal_register main-modal container">
                <div class="content-titulo">
                    <p class="titulo">Educator Registration - Welcome!</p>
                    <div class="info-regrister info-regrister-2">
                        <img src="{{ url('assets/img/iconos/graduation-hat.svg') }}" alt="">
                        <p class="m-0 ml-2"> Harvard School </p>

                    </div>
                </div>
                <div action="">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last name ">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Institutional Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Personal Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 center-flex">
                            <!--bnt--->
                            <button type="submit" class="btn btn-custom">Continue</button>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- registro modal -->
<div class="modal fade register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="content-modal_register main-modal container">
                <div class="content-titulo">
                    <p class="titulo">Educator Registration - Welcome!</p>
                    <div class="info-regrister">
                        <img src="{{ url('assets/img/iconos/info.svg') }}" alt="">
                        <p> Before registering, remember that your email address must be valid and approved by your
                            Institution & the wikiPB Admin
                        </p>
                    </div>
                </div>
                <div action="">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="inputinstitutioe"></label>
                                <select id="inputinstitutio" class="form-control">
                                    <option selected>Choose your institution </option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="">
                                <!---check--->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            My institution is not registered/listed
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 center-flex">
                            <!--bnt--->
                            <button type="submit" class="btn btn-custom">Continue</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>


<!-- institution-modal modal -->
<div class="modal fade bd-example-modal-lg institution-modal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="content-modal_register main-modal container ">
                <div class="content-titulo mb-3">
                    <p class="titulo">Institution Registration - Welcome!</p>
                </div>
                <div>

                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-regrister   info-regrister--inst mb-4">
                                    <img src="{{ url('assets/img/iconos/user.svg') }}" alt="">
                                    <p>Designated
                                        Institution User</p>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last name ">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="John@harvard.org">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="+1()123)4567890">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="info-regrister   info-regrister--inst">
                                    <img src="{{ url('assets/img/iconos/university.svg') }}" alt="">
                                    <p>Institution Info</p>
                                </div>
                                <div class="check-inst">

                                    <label>
                                        <input type="radio" class="option-input radio" name="example" checked />
                                        School
                                    </label>
                                    <label>
                                        <input type="radio" class="option-input radio" name="example" />
                                        University
                                    </label>
                                    <label>
                                        <input type="radio" class="option-input radio" name="example" />
                                        Organization
                                    </label>
                                </div>


                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Url">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Confirm Password">
                                </div>
                            </div>

                            <div class="col-md-12 text-center mt-2 mb-4">
                                <!--bnt--->
                                <button type="submit" class="btn btn-custom">Register</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


<!------------------------------MODAL ESTEP DE instituto DEPUES DE REGISTRO------------------------------------------->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    2nd Institution Register Layout <strong>AQUI ES DONDE ESTA EL PUTO STEP</strong>

</button>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form id="regForm">

                    <!-- One "tab" for each step in the form: -->
                    <div class="tab">
                        <div class="content-titulo">
                            <p class="titulo"> Welcome back John! <span>Step 1/2</span></p>
                            <div class="info-regrister">
                                <img src="{{ url('assets/img/iconos/like.svg') }}" alt="">
                                <p>The institution: Harvard University was
                                    approved! Thanks for your time, please fill ' out the following info and your
                                    good
                                    to go!

                                </p>
                            </div>
                        </div>
                        <!-----------------------selct--------------------------------->
                        <div class="contenido-select">
                            <div class="form-group">
                                <label for="inputinstitutioe"></label>
                                <select id="inputinstitutio" class="form-control">
                                    <option selected>Country </option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputinstitutioe"></label>
                                <select id="inputinstitutio" class="form-control">
                                    <option selected>Lowest Age </option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputinstitutioe"></label>
                                <select id="inputinstitutio" class="form-control">
                                    <option selected>Type </option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputinstitutioe"></label>
                                <select id="inputinstitutio" class="form-control">
                                    <option selected>City</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputinstitutioe"></label>
                                <select id="inputinstitutio" class="form-control">
                                    <option selected>Highest Age</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <!-----------------------selct--------------------------------->
                    </div>
                    <!----------------STEP 2-------------------->
                    <div class="tab">
                        <div class="content-titulo">
                            <p class="titulo"> Welcome back John! <span>Step 2/2</span></p>
                        </div>
                        <!-----------------------selct--------------------------------->
                        <div class="contenido-select contenido-select-2">
                            <div class="form-group">
                                <label for="">Are you part of a network of institutions?</label>
                                <select id="" class="form-control">
                                    <option selected>Yes </option>
                                    <option>No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type-of-Institution">Type of Institution?</label>
                                <select id="type-of-Institution" class="form-control">
                                    <option selected>Private </option>
                                    <option>Public</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for=""># of students enrolled:</label>
                                <select id="" class="form-control">
                                    <option selected>Type </option>
                                    <option>0 - 100</option>
                                    <option>100- 500</option>
                                    <option>1000 - 15000</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for=""># of faculty members:</label>
                                <select id="" class="form-control">
                                    <option selected>City</option>
                                    <option>0-50</option>
                                    <option>50-100</option>
                                </select>
                            </div>

                        </div>
                        <!-----------------------selct--------------------------------->


                    </div>
                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button class="btn btn-custom" type="button" id="prevBtn"
                                onclick="nextPrev(-1)">Previous</button>
                            <button class="btn btn-custom" type="button" id="nextBtn"
                                onclick="nextPrev(1)">Continue</button>
                        </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>





<!------------------------------mensaje de confimacion de regitro instituto------------------------------------------->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mensaje">
    Institution Register Confirmation Pop Ups
</button>
<!-- Modal -->
<div class="modal fade" id="mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p> Thanks!</p><br>
                    You just submitted your institution to be
                    part of wikiPBL! You should get a
                    confirmation email to finish the
                    registration, so all of your teachers and
                    associates can start creating WikiPBL
                    projects ASAP! Remember to check y
                </div>
            </div>
            <div class="modal-footers">
                <button type="button" class="btn " data-dismiss="modal">Close
                </button>
                <button type="button" class="btn ">Resend confirmation</button>
            </div>
        </div>
    </div>
</div>

<!------------------------------mensaje de confimacion de regitro instituto------------------------------------------->
