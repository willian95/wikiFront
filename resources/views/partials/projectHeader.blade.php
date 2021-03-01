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
                           
                            <svg class="login_icon mt-2 " xmlns="http://www.w3.org/2000/svg" version="1.2" baseProfile="tiny" width="24" height="24" viewBox="0 0 24 24"><path d="M12 14c1.381 0 2.631-.56 3.536-1.465C16.44 11.631 17 10.381 17 9s-.56-2.631-1.464-3.535C14.631 4.56 13.381 4 12 4s-2.631.56-3.536 1.465C7.56 6.369 7 7.619 7 9s.56 2.631 1.464 3.535A4.985 4.985 0 0 0 12 14zm8 1a2.495 2.495 0 0 0 2.5-2.5c0-.69-.279-1.315-.732-1.768A2.492 2.492 0 0 0 20 10a2.495 2.495 0 0 0-2.5 2.5A2.496 2.496 0 0 0 20 15zm0 .59c-1.331 0-2.332.406-2.917.968C15.968 15.641 14.205 15 12 15c-2.266 0-3.995.648-5.092 1.564C6.312 15.999 5.3 15.59 4 15.59c-2.188 0-3.5 1.09-3.5 2.182 0 .545 1.312 1.092 3.5 1.092.604 0 1.146-.051 1.623-.133l-.04.27c0 1 2.406 2 6.417 2 3.762 0 6.417-1 6.417-2l-.02-.255c.463.073.995.118 1.603.118 2.051 0 3.5-.547 3.5-1.092 0-1.092-1.373-2.182-3.5-2.182zM4 15c.69 0 1.315-.279 1.768-.732A2.492 2.492 0 0 0 6.5 12.5 2.495 2.495 0 0 0 4 10a2.496 2.496 0 0 0-2.5 2.5A2.495 2.495 0 0 0 4 15z"/><metadata><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/"><rdf:Description about="https://iconscout.com/legal#licenses" dc:title="group" dc:description="group" dc:publisher="Iconscout" dc:date="2017-09-24" dc:format="image/svg+xml" dc:language="en"><dc:creator><rdf:Bag><rdf:li>Typicons</rdf:li></rdf:Bag></dc:creator></rdf:Description></rdf:RDF></metadata></svg>
                            <span class="tooltip-nav">Shared wikiPBL</span>
                                </li>



                                <li class="nav-item  flex-main">
                                    
                                    <!-- Rounded switch -->
                                    <label class="switch" >
                                        <input type="checkbox" v-model="private">
                                        <span class="slider slider-nav round"></span>
                                    </label>

                                    
                                </li>
                                <li class="nav-item  flex-main">

                                    <img alt='icon' class="login_icon " src="{{ url('assets/img/iconos/eye.svg') }}">
                                    <span class="tooltip-nav">View Only</span>

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
                                <span class="tooltip-nav">Save wikiPBL</span>
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

