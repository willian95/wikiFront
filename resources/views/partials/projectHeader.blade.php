<div id="auth">


    <div class="loader-cover-custom" v-if="loading == true">
        <div class="loader-custom"></div>
    </div>

    <div class="modal fade" tabindex="-1" id="privacyModalAlert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Shared wikiPBL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Hey! Launching your wikiPBL project means you will have input from teachers all over the world, so once you launch it you will no longer be able to delete it.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <header class="header-shadow">
        <nav class='navbar navbar-expand-md navbar-fixed-js container'>
            <div class='flex-custom'>
                <div class="nav">
                    <ul>
                        <li class="menu" id="dropMenu">
                            <div class="drop-box">
                                <a class="drop-text" href="#"><button class="menu-effect" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))" aria-label="Main Menu">
                                        <svg width="100" height="100" viewBox="0 0 100 100">
                                            <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                                            <path class="line line2" d="M 20,50 H 80" />
                                            <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                            <ul id="ul" class="nav-fixed">
                                <li>
                                    <p class="menu-titulo">MENU</p>
                                </li>
                                <li class="nav-box_li">
                                    <div class="blue-box"></div>
                                    <div class="dropdown">
                                        <div class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Institutions &
                                            Organizations
                                        </div>
                                        <div class="dropdown-menu down-header" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ url('/school/all') }}">Schools</a>
                                            <a class="dropdown-item" href="{{ url('/university/all') }}">Universities</a>
                                            <a class="dropdown-item" href="{{ url('/organization/all') }}">Organizations</a>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-box_li"><a href="{{ url('/subjects/all') }}">
                                        <div class="blue-box"></div>Subjects
                                    </a></li>
                                <li class="nav-box_li"><a href="{{ url('/teacher/all') }}">
                                        <div class="blue-box"></div>Educators
                                    </a></li>
                                <li class="nav-box_li"><a href="{{ url('/about') }}">
                                        <div class="blue-box"></div>About wikiPBL
                                    </a></li>
                                <li class="nav-box_li"><a data-toggle="modal" data-target=".faq-modal">
                                        <div class="blue-box"></div>FAQ'S
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <a class='brand ' href='{{ url('/front-test') }}'>
                    <img alt='redes' src="{{ url('assets/img/logo.svg') }}">
                </a>
                <button class='navbar-toggler p-2 border-0 hamburger hamburger--elastic d-none-lg' data-toggle='offcanvas' type='button'>
                    <span class='hamburger-box'>
                        <span class='hamburger-inner'></span>
                    </span>
                </button>
                @if(\Auth::check() && \Auth::user()->id)

                <div class='offcanvas-collapse fil' id='navbarNav'>
                    <ul class='navbar-nav container'>
                        <div class="row">
                            <div class="col-md-12  mt-3">
                                <div class="menu-flex">
                                    <!-- Iconos temlate option-->
                                    <div class="header-icons">
                                        <!--  <li class="nav-item  flex-main mr-2">
                                            @if($action == "create" || $project[0]->status != "launched")

                                            <div>

                                                <svg class="login_icon mt-2 " id="shared-icon" xmlns="http://www.w3.org/2000/svg" version="1.2" baseProfile="tiny" width="24" height="24" viewBox="0 0 24 24">
                                                    <path d="M12 14c1.381 0 2.631-.56 3.536-1.465C16.44 11.631 17 10.381 17 9s-.56-2.631-1.464-3.535C14.631 4.56 13.381 4 12 4s-2.631.56-3.536 1.465C7.56 6.369 7 7.619 7 9s.56 2.631 1.464 3.535A4.985 4.985 0 0 0 12 14zm8 1a2.495 2.495 0 0 0 2.5-2.5c0-.69-.279-1.315-.732-1.768A2.492 2.492 0 0 0 20 10a2.495 2.495 0 0 0-2.5 2.5A2.496 2.496 0 0 0 20 15zm0 .59c-1.331 0-2.332.406-2.917.968C15.968 15.641 14.205 15 12 15c-2.266 0-3.995.648-5.092 1.564C6.312 15.999 5.3 15.59 4 15.59c-2.188 0-3.5 1.09-3.5 2.182 0 .545 1.312 1.092 3.5 1.092.604 0 1.146-.051 1.623-.133l-.04.27c0 1 2.406 2 6.417 2 3.762 0 6.417-1 6.417-2l-.02-.255c.463.073.995.118 1.603.118 2.051 0 3.5-.547 3.5-1.092 0-1.092-1.373-2.182-3.5-2.182zM4 15c.69 0 1.315-.279 1.768-.732A2.492 2.492 0 0 0 6.5 12.5 2.495 2.495 0 0 0 4 10a2.496 2.496 0 0 0-2.5 2.5A2.495 2.495 0 0 0 4 15z" />
                                                    <metadata>
                                                        <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                            <rdf:Description about="https://iconscout.com/legal#licenses" dc:title="group" dc:description="group" dc:publisher="Iconscout" dc:date="2017-09-24" dc:format="image/svg+xml" dc:language="en">
                                                                <dc:creator>
                                                                    <rdf:Bag>
                                                                        <rdf:li>Typicons</rdf:li>
                                                                    </rdf:Bag>
                                                                </dc:creator>
                                                            </rdf:Description>
                                                        </rdf:RDF>
                                                    </metadata>
                                                </svg>
                                                <p class="titulo-men">Shared wikiPBL</p>
                                            </div>
                                            <span class="tooltip-nav">Shared wikiPBL</span>
                                        </li>--->



                                        <!-----<li class="nav-item  flex-main mr-2">


                                                    <div class="check-inst check-header">
                                                        <label>
                                                            <div class="check-herader--info mr-2">

                                                                <svg class="login_icon mr-2  " id="shared-icon" xmlns="http://www.w3.org/2000/svg" version="1.2" baseProfile="tiny" width="24" height="24" viewBox="0 0 24 24">
                                                                    <path d="M12 14c1.381 0 2.631-.56 3.536-1.465C16.44 11.631 17 10.381 17 9s-.56-2.631-1.464-3.535C14.631 4.56 13.381 4 12 4s-2.631.56-3.536 1.465C7.56 6.369 7 7.619 7 9s.56 2.631 1.464 3.535A4.985 4.985 0 0 0 12 14zm8 1a2.495 2.495 0 0 0 2.5-2.5c0-.69-.279-1.315-.732-1.768A2.492 2.492 0 0 0 20 10a2.495 2.495 0 0 0-2.5 2.5A2.496 2.496 0 0 0 20 15zm0 .59c-1.331 0-2.332.406-2.917.968C15.968 15.641 14.205 15 12 15c-2.266 0-3.995.648-5.092 1.564C6.312 15.999 5.3 15.59 4 15.59c-2.188 0-3.5 1.09-3.5 2.182 0 .545 1.312 1.092 3.5 1.092.604 0 1.146-.051 1.623-.133l-.04.27c0 1 2.406 2 6.417 2 3.762 0 6.417-1 6.417-2l-.02-.255c.463.073.995.118 1.603.118 2.051 0 3.5-.547 3.5-1.092 0-1.092-1.373-2.182-3.5-2.182zM4 15c.69 0 1.315-.279 1.768-.732A2.492 2.492 0 0 0 6.5 12.5 2.495 2.495 0 0 0 4 10a2.496 2.496 0 0 0-2.5 2.5A2.495 2.495 0 0 0 4 15z" />

                                                                </svg>
                                                                <p class="titulo-men">Shared wikiPBL</p>
                                                            </div>
                                                            <input type="radio" class="option-input radio" name="example" checked />

                                                            <span class="tooltip-nav">Shared wikiPBL</span>
                                                        </label>
                                                        <label>
                                                            <div class="check-herader--info ml-4 mr-2">
                                                                <svg class="login_icon mr-2 " id="private-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                                                    <path d="M28.707,15.293l-2.412-2.412a14.574,14.574,0,0,0-20.59,0L3.293,15.293a1,1,0,0,0,0,1.414l2.412,2.412a14.575,14.575,0,0,0,20.59,0l2.412-2.412A1,1,0,0,0,28.707,15.293Zm-3.826,2.412a12.574,12.574,0,0,1-17.762,0L5.414,16l1.705-1.705a12.574,12.574,0,0,1,17.762,0L26.586,16Z" />
                                                                    <path d="M16,11a5,5,0,1,0,5,5A5.006,5.006,0,0,0,16,11Zm0,8a3,3,0,1,1,3-3A3,3,0,0,1,16,19Z" />
                                                                </svg>

                                                                <p class="titulo-men">View Only</p>
                                                            </div>
                                                            <input type="radio" class="option-input radio" name="example" />

                                                            <span class="tooltip-nav">View Only</span>
                                                        </label>
                                                    </div>

                                                    <label class="switch" @change="showProjectPrivacyAlert()">
                                                        <input type="checkbox" v-model="private">
                                                        <span class="slider slider-nav round"></span>
                                                    </label>


                                                </li>---->


                                        <!----  <li class="nav-item  flex-main ">
                                            <div>
                                                <svg class="login_icon " id="private-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                                    <path d="M28.707,15.293l-2.412-2.412a14.574,14.574,0,0,0-20.59,0L3.293,15.293a1,1,0,0,0,0,1.414l2.412,2.412a14.575,14.575,0,0,0,20.59,0l2.412-2.412A1,1,0,0,0,28.707,15.293Zm-3.826,2.412a12.574,12.574,0,0,1-17.762,0L5.414,16l1.705-1.705a12.574,12.574,0,0,1,17.762,0L26.586,16Z" />
                                                    <path d="M16,11a5,5,0,1,0,5,5A5.006,5.006,0,0,0,16,11Zm0,8a3,3,0,1,1,3-3A3,3,0,0,1,16,19Z" />
                                                </svg>

                                                <p class="titulo-men">View Only</p>
                                            </div>
                                            <span class="tooltip-nav">View Only</span>

                                        </li>--->

                                        @endif
                                        {{--<li class="nav-item   flex-main ">
                                    <img alt='icon' class="login_icon "
                                    src="{{ url('assets/img/iconos/group.svg') }}">
                                        <!-- Rounded switch -->
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider slider-nav round"></span>
                                        </label>
                                        </li>--}}

                                        {{--@if($action == "edit")
                                            @if(\Auth::user()->id == $project[0]->user_id && $project[0]->is_private == 1)
                                            <li class="nav-itm last-style mb-2 mr-4 " style="cursor: pointer;" @click="erase()"><svg class="login_icon color-blue_icon hover-trash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                                </svg></li>
                                            @endif
                                        @endif--}}

                                        <li class="nav-item   flex-main ml-5" @if($projectAction=='creation' ) @click="saveProject()" @else @click="saveEditionProject()" @endif>
                                            <svg class="login_icon color-blue_icon " xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                                                <path d="M20.71,9.29l-6-6a1,1,0,0,0-.32-.21A1.09,1.09,0,0,0,14,3H6A3,3,0,0,0,3,6V18a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10A1,1,0,0,0,20.71,9.29ZM9,5h4V7H9Zm6,14H9V16a1,1,0,0,1,1-1h4a1,1,0,0,1,1,1Zm4-1a1,1,0,0,1-1,1H17V16a3,3,0,0,0-3-3H10a3,3,0,0,0-3,3v3H6a1,1,0,0,1-1-1V6A1,1,0,0,1,6,5H7V8A1,1,0,0,0,8,9h6a1,1,0,0,0,1-1V6.41l4,4Z" />
                                            </svg>
                                            <span class="tooltip-nav">Save wikiPBL</span>
                                            <!-- <img alt='icon' class="login_icon "
                                src="{{ url('assets/img/iconos/save.svg') }}">---->
                                        </li>


                                        <li class="nav-itm last-style" v-if="lastSave != ''">
                                            <p v-cloak>@{{ lastSave }}</p>
                                            <p>Last update</p>
                                        </li>

                                        {{--<li class="nav-item  flex-main">
                                <img alt='icon' class="login_icon "
                                src="{{ url('assets/img/iconos/edit.svg') }}">
                                        </li>--}}


                                    </div>
                                    <!-- Iconos temlate option-->
                                    <li class='nav-item  flex-main'>
                                        <img alt='icon' class="teacher-icon " src="{{ url('assets/img/iconos/user-teacher.png') }}">
                                        <a @if(\Auth::user()->role_id == 2) href="{{ url('/teacher/profile') }}" @else href="{{ url('/institution/profile') }}" @endif class='nav-link'>{{ \Auth::user()->name }}
                                            {{ substr(\Auth::user()->lastname, 0, 1) }}.</a>
                                    </li>
                                    <li class="nav-item   flex-main">
                                        <a href="{{ url('logout') }}">
                                            <img alt='icon' class="login_icon " src="{{ url('assets/img/iconos/logout.svg') }}">
                                        </a>
                                    </li>

                                </div>
                            </div>
                        </div>
                    </ul>
                </div>

                @else
                <div class='offcanvas-collapse fil' id='navbarNav'>
                    <ul class='navbar-nav container'>
                        <div class="row">
                            <div class="col-md-12  mt-3">
                                <div class="menu-flex">
                                    <li class='nav-item  border-nav' data-toggle="modal" data-target=".login">
                                        <a class='nav-link '>Sign In</a>
                                    </li>
                                    <li class='nav-item  border-nav' data-toggle="modal" data-target=".register-modal" @click="resetRegistrationForm()">
                                        <a class='nav-link  '>Register</a>
                                    </li>
                                    <li class='nav-item w-nav' data-toggle="modal" data-target=".institution-modal">
                                        <a class='nav-link'>Institution Registration</a>
                                    </li>
                                </div>
                            </div>

                    </ul>
                </div>
                @endif
            </div>
        </nav>
    </header>


</div>