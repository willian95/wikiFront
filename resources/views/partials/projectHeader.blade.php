<div id="auth">


    <div class="loader-cover-custom" v-if="loading == true">
        <div class="loader-custom"></div>
    </div>
    <header class="header-shadow">
        <nav class='navbar navbar-expand-md navbar-fixed-js container'>
            <div class='flex-custom'>
                <div class="nav">
                    <ul>
                        <li class="menu" id="dropMenu">
                            <div class="drop-box">
                                <a class="drop-text" href="#"><i class="hamburger-menu fa fa-bars"
                                        aria-hidden="true"></i>
                                </a>
                            </div>
                            <ul id="ul" class="nav-fixed">
                                <li>
                                    <p class="menu-titulo">MENÚ</p>
                                </li>
                                <li class="nav-box_li">
                                    <div class="blue-box"></div>
                                    <div class="dropdown">
                                        <div class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <li class="nav-box_li"><a href="#">
                                        <div class="blue-box"></div>About wikiPBL
                                    </a></li>
                                <li class="nav-box_li"><a href="#">
                                        <div class="blue-box"></div>FAQ'S
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <a class='brand ' href='{{ url('/front-test') }}'>
                    <img alt='redes' src="{{ url('assets/img/logo.svg') }}">
                </a>
                <button class='navbar-toggler p-2 border-0 hamburger hamburger--elastic d-none-lg'
                    data-toggle='offcanvas' type='button'>
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
                                        
                                        
                                        <li class="nav-item  flex-main">
                                            <img alt='icon' class="login_icon "
                                                src="{{ url('assets/img/iconos/eye.svg') }}">
                                            <!-- Rounded switch -->
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider slider-nav round"></span>
                                            </label>
                                        </li>
                                        <li class="nav-item   flex-main">
                                            <img alt='icon' class="login_icon "
                                                src="{{ url('assets/img/iconos/group.svg') }}">
                                            <!-- Rounded switch -->
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider slider-nav round"></span>
                                            </label>
                                        </li>
                                        <li class="nav-item   flex-main" 
                                            @if(isset($project[0]))
                                                @if($project[0]->status == 'pending')
                                                    @click="saveProject()"
                                                @else
                                                    @click="saveEditionProject()"
                                                @endif
                                            @else
                                                @click="saveProject()"
                                            @endif
                                            
                                        >
                                            <img alt='icon' class="login_icon "
                                                src="{{ url('assets/img/iconos/save.svg') }}">
                                        </li>

                                        <li class="nav-itm" style="margin-top: -20px; font-size: 9px;" v-if="lastSave != ''">
                                            <p>@{{ lastSave }}</p>
                                            <p>Last update</p>
                                        </li>

                                        {{--<li class="nav-item  flex-main">
                                            <img alt='icon' class="login_icon "
                                                src="{{ url('assets/img/iconos/edit.svg') }}">
                                        </li>--}}

                                          
                                    </div>
                                    <!-- Iconos temlate option-->
                                    <li class='nav-item  flex-main'>
                                        <img alt='icon' class="teacher-icon "
                                            src="{{ url('assets/img/iconos/user-teacher.png') }}">
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
                                    <li class='nav-item  border-nav' data-toggle="modal" data-target=".register-modal"
                                        @click="resetRegistrationForm()">
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

