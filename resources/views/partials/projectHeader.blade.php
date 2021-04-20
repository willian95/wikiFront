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
                    <img alt='redes' src="{{ url('assets/img/logo.png') }}">
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
                            <div class="col-md-12 flex-new">
                                <div class="menu-flex">
                                    <!-- Iconos temlate option-->
                                    <div class="header-icons">
                                        
                                        {{--<li class="nav-item   flex-main ">
                                    <img alt='icon' class="login_icon mt-1"
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
                                            {{ substr(\Auth::user()->lastname, 0, 1) }}.
                                            <span class="tooltip-nav">profile</span>
                                        </a>
                                    </li>
                                    <li class="nav-item   flex-main">
                                        <a href="{{ url('logout') }}">
                                            <img alt='icon' class="login_icon " src="{{ url('assets/img/iconos/logout.svg') }}">
                                            <span class="tooltip-nav"> logout</span>
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