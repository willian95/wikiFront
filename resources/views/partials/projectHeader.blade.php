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
                                    <label class="switch" >
                                        <input type="checkbox" v-model="private">
                                        <span class="slider slider-nav round"></span>
                                    </label>
                                </li>
                                {{--<li class="nav-item   flex-main">
                                    <img alt='icon' class="login_icon "
                                    src="{{ url('assets/img/iconos/group.svg') }}">
                                    <!-- Rounded switch -->
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider slider-nav round"></span>
                                    </label>
                                </li>--}}
                                <li class="nav-item   flex-main" 
                                @if($projectAction == 'creation')
                                
                                    @click="saveProject()"
                                
                                @else
                                    @click="saveEditionProject()"
                                @endif

                                >
                                <svg class="login_icon color-blue_icon " xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"><path d="M20.71,9.29l-6-6a1,1,0,0,0-.32-.21A1.09,1.09,0,0,0,14,3H6A3,3,0,0,0,3,6V18a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10A1,1,0,0,0,20.71,9.29ZM9,5h4V7H9Zm6,14H9V16a1,1,0,0,1,1-1h4a1,1,0,0,1,1,1Zm4-1a1,1,0,0,1-1,1H17V16a3,3,0,0,0-3-3H10a3,3,0,0,0-3,3v3H6a1,1,0,0,1-1-1V6A1,1,0,0,1,6,5H7V8A1,1,0,0,0,8,9h6a1,1,0,0,0,1-1V6.41l4,4Z"/></svg>
                               <!-- <img alt='icon' class="login_icon "
                                src="{{ url('assets/img/iconos/save.svg') }}">---->
                            </li>

                            <li class="nav-itm last-style"  v-if="lastSave != ''">
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

