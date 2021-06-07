<div id="auth">
    <link rel="stylesheet" href="{{ url('assets/css/new.css') }}">
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
                <div class="nav nav_menu1">
                    <ul>
                        <li class="menu" id="dropMenu">
                            <div class="drop-box">
                                <a class="drop-text" href="#"> <button class="menu-effect" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))" aria-label="Main Menu">
                                        <svg width="100" height="100" viewBox="0 0 100 100">
                                            <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                                            <path class="line line2" d="M 20,50 H 80" />
                                            <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                            <!-------menu flotante------------>
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
                               <!----<li class="nav-box_li"><a href="{{ url('/about') }}">
                                        <div class="blue-box"></div>About wikiPBL
                                    </a></li>
                                <li class="nav-box_li"><a data-toggle="modal" data-target=".faq-modal">
                                        <div class="blue-box"></div>FAQ'S
                                    </a></li>-->
                                    @if(\Auth::check())
                                    <li class="nav-item   flex-main cerrar_sesion-xs">
                                    <a href="{{ url('logout') }}">
                                        Logout
                                    </a>
                                </li>
                                @endif
                               
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class='brand ' href="">
                <a href="{{ url('/') }}">    <img alt='redes' src="{{ url('assets/img/logo.png') }}"></a>
                </div>
                <button class='navbar-toggler p-2 border-0 hamburger hamburger--elastic d-none-lg' data-toggle='offcanvas' type='button'>
                    <span class='hamburger-box'>
                        <span class='hamburger-inner'></span>
                    </span>
                </button>
                @if(\Auth::check() && \Auth::user()->id)
                <li class="nav-item  flex-main mr-0 new_wiki mr-probelm">

                <!-- <img alt='icon' class="login_icon" src="{{ url('assets/img/iconos/add-file.svg') }}">--->
                    <button class='btn problem-btn' data-toggle="modal" data-target=".problems-modal">
                    <p>     Problems with this page?</p>
                        <i class="fa fa-info-circle" aria-hidden="true"></i>                   
                    </button>
                </li>
                @endif
                @if(\Auth::check() && \Auth::user()->id)
             
                    <ul class='navbar-nav container container nav_1'>
                        <div class="row">
                            <div class="col-md-12  flex-new">
                                <div class="menu-flex menu-flex_1">
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

                                        @if($action == "edit")
                                            @if(\Auth::user()->id == $project[0]->user_id)
                                            <li class="nav-item last-style mb-2 mr-4 trash-style" style="cursor: pointer;" @click="erase()" v-if="!isIncubator"><svg class="login_icon color-blue_icon hover-trash"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                                </svg>
                                                <span>Delete project</span>
                                                <span class="tooltip-nav">Delete project</span>
                                            </li>
                                            @endif
                                            @if($project[0]->status == 'pending')
                                                <li><button class="btn btn-custom button-launch" @click="launch()">Launch</button></li>
                                            @else
                                                <li><button class="btn btn-custom button-launch" @click="launch()">Update</button></li>
                                            @endif
                                        @else
                                            <li><button class="btn btn-custom button-launch" @click="launch()">Launch</button></li>
                                        @endif
                                        
                                        
                                        
                                        
                                        <li class="nav-item   flex-main ml-5 save-option" @if($projectAction=='creation' ) @click="saveProject()" @else @click="saveEditionProject()" @endif>
                                            <svg class="login_icon color-blue_icon " xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                                                <path d="M20.71,9.29l-6-6a1,1,0,0,0-.32-.21A1.09,1.09,0,0,0,14,3H6A3,3,0,0,0,3,6V18a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10A1,1,0,0,0,20.71,9.29ZM9,5h4V7H9Zm6,14H9V16a1,1,0,0,1,1-1h4a1,1,0,0,1,1,1Zm4-1a1,1,0,0,1-1,1H17V16a3,3,0,0,0-3-3H10a3,3,0,0,0-3,3v3H6a1,1,0,0,1-1-1V6A1,1,0,0,1,6,5H7V8A1,1,0,0,0,8,9h6a1,1,0,0,0,1-1V6.41l4,4Z" />
                                            </svg>
                                            <span class="tooltip-nav">Save wikiPBL</span>
                                            
                                        </li>


                                        <li class="nav-itm last-style last-xs" v-if="lastSave != ''">
                                            <p v-cloak>@{{ lastSave }}</p>
                                            <p>Last update</p>
                                        </li>

                                        {{--<li class="nav-item  flex-main">
                                <img alt='icon' class="login_icon "
                                src="{{ url('assets/img/iconos/edit.svg') }}">
                                        </li>--}}


                                    </div>
                                    <!-- Iconos temlate option-->
                                    <div class="menu-flex menu-flex_1 ">
                                                <li class='nav-item  flex-main option-none_menu'>
                                                    <a @if(\Auth::user()->role_id == 2) href="{{ url('/teacher/profile') }}" @else href="{{ url('/institution/profile') }}" @endif class='nav-link pl-2 verse-row'><p class="mb-0">{{ \Auth::user()->name }}
                                                            {{ substr(\Auth::user()->lastname, 0, 1) }}
                                                        </p> <img alt='icon' class="teacher-icon mr-2" src="{{ url('assets/img/iconos/user-teacher.png') }}">
                                                      
                                                    </a>
                                                    <span class="tooltip-nav"> Profile</span>
                                                </li>
                                                <li class="nav-item   flex-main cerrar_sesion">
                                                    <a href="{{ url('logout') }}">
                                                        <img alt='icon' class="login_icon " src="{{ url('assets/img/iconos/logout.svg') }}">
                                                        <span class="tooltip-nav"> Logout</span>
                                                    </a>
                                                </li>
                                            </div>

                                </div>
                            </div>
                        </div>
                    </ul>
             

                @else
                <div class='menu-registro_xs ml-auto'>
                    <ul class='navbar-nav container'>
                        <div class="row">
                            <div class="col-md-12  mt-3">
                                <div class="menu-flex">
                                    
                                    <li class='nav-item  border-nav' data-toggle="modal" data-target=".register-modal" @click="resetRegistrationForm()">
                                        <a class='nav-link  '>
                                            <svg height="512pt" viewBox="0 -32 512.016 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
                                                <path d="m192 213.339844c-58.816406 0-106.667969-47.847656-106.667969-106.664063 0-58.816406 47.851563-106.6679685 106.667969-106.6679685s106.667969 47.8515625 106.667969 106.6679685c0 58.816407-47.851563 106.664063-106.667969 106.664063zm0-181.332032c-41.171875 0-74.667969 33.492188-74.667969 74.667969 0 41.171875 33.496094 74.664063 74.667969 74.664063s74.667969-33.492188 74.667969-74.664063c0-41.175781-33.496094-74.667969-74.667969-74.667969zm0 0" />
                                                <path d="m368 448.007812h-352c-8.832031 0-16-7.167968-16-16v-74.667968c0-55.871094 45.460938-101.332032 101.332031-101.332032h181.335938c55.871093 0 101.332031 45.460938 101.332031 101.332032v74.667968c0 8.832032-7.167969 16-16 16zm-336-32h320v-58.667968c0-38.226563-31.105469-69.332032-69.332031-69.332032h-181.335938c-38.226562 0-69.332031 31.105469-69.332031 69.332032zm0 0" />


                                            </svg>


                                            <span> Register</span></a>
                                    </li>
                                    <li class='nav-item w-nav border-nav' data-toggle="modal" data-target=".institution-modal">
                                        <a class='nav-link'>
                                            <svg class="ml-2 " version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 464 464" style="enable-background:new 0 0 464 464;" xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path d="M456,217.12H353.68v-19.76c-0.005-2.886-1.564-5.546-4.08-6.96L240,128.8V97.44h21.68v11.92c0,4.418,3.582,8,8,8h65.36
                                        c4.418-0.002,7.998-3.585,7.997-8.003c0-0.926-0.162-1.845-0.477-2.717L336,88l6.64-18.24c1.502-4.155-0.648-8.741-4.803-10.243
                                        c-0.871-0.315-1.79-0.476-2.717-0.477h-29.76v-11.6c0-4.418-3.582-8-8-8H240v-9.76c0-4.418-3.582-8-8-8s-8,3.582-8,8v99.12
                                        l-109.6,61.52c-2.516,1.414-4.075,4.074-4.08,6.96v19.76H8c-4.418,0-8,3.582-8,8v209.28c0,4.418,3.582,8,8,8h448
                                        c4.418,0,8-3.582,8-8v-209.2C464,220.702,460.418,217.12,456,217.12z M305.36,89.44l-0.32-0.32V75.36h18.24L320,85.6
                                        c-0.655,1.782-0.655,3.738,0,5.52l3.76,10.24h-46.08v-3.92h19.68C301.778,97.44,305.36,93.858,305.36,89.44z M240,55.44h49.36
                                        v11.92v14.08H240V55.44z M110.32,426.32H16v-193.2h94.32V426.32z M224,426.32h-42v-91.36h42V426.32z M282,426.32h-42v-91.36h42
                                        V426.32z M338,426.32h-40v-99.36c0-4.418-3.582-8-8-8H174c-4.418,0-8,3.582-8,8v99.36h-40v-224l106-59.68L337.68,202l0.32,23.04
                                        V426.32z M448,426.32h-94.32v-193.2H448V426.32z" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <path d="M232,167.12c-18.526,0.044-33.52,15.074-33.52,33.6c0.044,18.513,15.087,33.484,33.6,33.44
                                        c18.513-0.044,33.484-15.087,33.44-33.6C265.476,182.079,250.481,167.12,232,167.12z M232,218.16
                                        c-9.676-0.044-17.484-7.924-17.44-17.6c0.044-9.613,7.826-17.396,17.44-17.44c9.689,0.044,17.52,7.911,17.52,17.6h0.08
                                        C249.556,210.396,241.676,218.204,232,218.16z" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="35.28" y="250.72" width="16" height="32" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="74.72" y="250.72" width="16" height="32" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="150.32" y="250.72" width="32" height="16" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="216" y="250.72" width="32" height="16" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="281.68" y="250.72" width="32" height="16" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="150.32" y="288" width="32" height="16" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="216" y="288" width="32" height="16" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="281.68" y="288" width="32" height="16" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="35.28" y="313.68" width="16" height="32" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="74.72" y="313.68" width="16" height="32" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="35.28" y="376.72" width="16" height="32" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="74.72" y="376.72" width="16" height="32" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="373.28" y="250.72" width="16" height="32" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="412.72" y="250.72" width="16" height="32" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="373.28" y="313.68" width="16" height="32" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="412.72" y="313.68" width="16" height="32" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="373.28" y="376.72" width="16" height="32" />
                                                    </g>
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="412.72" y="376.72" width="16" height="32" />
                                                    </g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                            </svg>

                                            <span> Institution Registration</span></a>
                                    </li>
                                    <li class='nav-item  border-nav signin-btn' data-toggle="modal" data-target=".login">
                                        <a class='nav-link '><svg height="512pt" viewBox="0 -32 512.016 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
                                                <path d="m192 213.339844c-58.816406 0-106.667969-47.847656-106.667969-106.664063 0-58.816406 47.851563-106.6679685 106.667969-106.6679685s106.667969 47.8515625 106.667969 106.6679685c0 58.816407-47.851563 106.664063-106.667969 106.664063zm0-181.332032c-41.171875 0-74.667969 33.492188-74.667969 74.667969 0 41.171875 33.496094 74.664063 74.667969 74.664063s74.667969-33.492188 74.667969-74.664063c0-41.175781-33.496094-74.667969-74.667969-74.667969zm0 0" />
                                                <path d="m368 448.007812h-352c-8.832031 0-16-7.167968-16-16v-74.667968c0-55.871094 45.460938-101.332032 101.332031-101.332032h181.335938c55.871093 0 101.332031 45.460938 101.332031 101.332032v74.667968c0 8.832032-7.167969 16-16 16zm-336-32h320v-58.667968c0-38.226563-31.105469-69.332032-69.332031-69.332032h-181.335938c-38.226562 0-69.332031 31.105469-69.332031 69.332032zm0 0" />
                                                <path d="m496 218.675781h-181.332031c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h181.332031c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0" />

                                                <path d="m410.667969 304.007812c-4.097657 0-8.191407-1.558593-11.308594-4.691406-6.25-6.253906-6.25-16.386718 0-22.636718l74.027344-74.027344-74.027344-74.027344c-6.25-6.25-6.25-16.382812 0-22.632812s16.382813-6.25 22.636719 0l85.332031 85.332031c6.25 6.25 6.25 16.386719 0 22.636719l-85.332031 85.332031c-3.136719 3.15625-7.234375 4.714843-11.328125 4.714843zm0 0" />
                                            </svg> <span>Sign In</span></a>
                                    </li>
                                </div>
                            </div>
                    </ul>
                </div>
                <ul class='navbar-nav container none-menu menu-desk_registres'>
                    <div class="row">
                        <div class="col-md-12  flex-new">
                            <div class="menu-flex">

                                <li class='nav-item  border-nav' data-toggle="modal" data-target=".register-modal" @click="resetRegistrationForm()">
                                    <a class='nav-link  '>
                                        <svg class="rregistro-icon" height="512pt" viewBox="0 -32 512.016 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m192 213.339844c-58.816406 0-106.667969-47.847656-106.667969-106.664063 0-58.816406 47.851563-106.6679685 106.667969-106.6679685s106.667969 47.8515625 106.667969 106.6679685c0 58.816407-47.851563 106.664063-106.667969 106.664063zm0-181.332032c-41.171875 0-74.667969 33.492188-74.667969 74.667969 0 41.171875 33.496094 74.664063 74.667969 74.664063s74.667969-33.492188 74.667969-74.664063c0-41.175781-33.496094-74.667969-74.667969-74.667969zm0 0" />
                                            <path d="m368 448.007812h-352c-8.832031 0-16-7.167968-16-16v-74.667968c0-55.871094 45.460938-101.332032 101.332031-101.332032h181.335938c55.871093 0 101.332031 45.460938 101.332031 101.332032v74.667968c0 8.832032-7.167969 16-16 16zm-336-32h320v-58.667968c0-38.226563-31.105469-69.332032-69.332031-69.332032h-181.335938c-38.226562 0-69.332031 31.105469-69.332031 69.332032zm0 0" />


                                        </svg> Register</a>
                                </li>
                                <li class='nav-item w-nav ' data-toggle="modal" data-target=".institution-modal">
                                    <a class='nav-link'>
                                        <svg class="instituto-icon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 464 464" style="enable-background:new 0 0 464 464;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M456,217.12H353.68v-19.76c-0.005-2.886-1.564-5.546-4.08-6.96L240,128.8V97.44h21.68v11.92c0,4.418,3.582,8,8,8h65.36
                                        c4.418-0.002,7.998-3.585,7.997-8.003c0-0.926-0.162-1.845-0.477-2.717L336,88l6.64-18.24c1.502-4.155-0.648-8.741-4.803-10.243
                                        c-0.871-0.315-1.79-0.476-2.717-0.477h-29.76v-11.6c0-4.418-3.582-8-8-8H240v-9.76c0-4.418-3.582-8-8-8s-8,3.582-8,8v99.12
                                        l-109.6,61.52c-2.516,1.414-4.075,4.074-4.08,6.96v19.76H8c-4.418,0-8,3.582-8,8v209.28c0,4.418,3.582,8,8,8h448
                                        c4.418,0,8-3.582,8-8v-209.2C464,220.702,460.418,217.12,456,217.12z M305.36,89.44l-0.32-0.32V75.36h18.24L320,85.6
                                        c-0.655,1.782-0.655,3.738,0,5.52l3.76,10.24h-46.08v-3.92h19.68C301.778,97.44,305.36,93.858,305.36,89.44z M240,55.44h49.36
                                        v11.92v14.08H240V55.44z M110.32,426.32H16v-193.2h94.32V426.32z M224,426.32h-42v-91.36h42V426.32z M282,426.32h-42v-91.36h42
                                        V426.32z M338,426.32h-40v-99.36c0-4.418-3.582-8-8-8H174c-4.418,0-8,3.582-8,8v99.36h-40v-224l106-59.68L337.68,202l0.32,23.04
                                        V426.32z M448,426.32h-94.32v-193.2H448V426.32z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M232,167.12c-18.526,0.044-33.52,15.074-33.52,33.6c0.044,18.513,15.087,33.484,33.6,33.44
                                        c18.513-0.044,33.484-15.087,33.44-33.6C265.476,182.079,250.481,167.12,232,167.12z M232,218.16
                                        c-9.676-0.044-17.484-7.924-17.44-17.6c0.044-9.613,7.826-17.396,17.44-17.44c9.689,0.044,17.52,7.911,17.52,17.6h0.08
                                        C249.556,210.396,241.676,218.204,232,218.16z" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="35.28" y="250.72" width="16" height="32" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="74.72" y="250.72" width="16" height="32" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="150.32" y="250.72" width="32" height="16" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="216" y="250.72" width="32" height="16" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="281.68" y="250.72" width="32" height="16" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="150.32" y="288" width="32" height="16" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="216" y="288" width="32" height="16" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="281.68" y="288" width="32" height="16" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="35.28" y="313.68" width="16" height="32" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="74.72" y="313.68" width="16" height="32" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="35.28" y="376.72" width="16" height="32" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="74.72" y="376.72" width="16" height="32" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="373.28" y="250.72" width="16" height="32" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="412.72" y="250.72" width="16" height="32" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="373.28" y="313.68" width="16" height="32" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="412.72" y="313.68" width="16" height="32" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="373.28" y="376.72" width="16" height="32" />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="412.72" y="376.72" width="16" height="32" />
                                                </g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                        </svg>

                                        Institution Registration</a>
                                </li>
                                <li class='nav-item  border-nav signin-btn' data-toggle="modal" data-target=".login">
                                    <a class='nav-link '><svg height="512pt" viewBox="0 -32 512.016 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m192 213.339844c-58.816406 0-106.667969-47.847656-106.667969-106.664063 0-58.816406 47.851563-106.6679685 106.667969-106.6679685s106.667969 47.8515625 106.667969 106.6679685c0 58.816407-47.851563 106.664063-106.667969 106.664063zm0-181.332032c-41.171875 0-74.667969 33.492188-74.667969 74.667969 0 41.171875 33.496094 74.664063 74.667969 74.664063s74.667969-33.492188 74.667969-74.664063c0-41.175781-33.496094-74.667969-74.667969-74.667969zm0 0" />
                                            <path d="m368 448.007812h-352c-8.832031 0-16-7.167968-16-16v-74.667968c0-55.871094 45.460938-101.332032 101.332031-101.332032h181.335938c55.871093 0 101.332031 45.460938 101.332031 101.332032v74.667968c0 8.832032-7.167969 16-16 16zm-336-32h320v-58.667968c0-38.226563-31.105469-69.332032-69.332031-69.332032h-181.335938c-38.226562 0-69.332031 31.105469-69.332031 69.332032zm0 0" />
                                            <path d="m496 218.675781h-181.332031c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h181.332031c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0" />
                                            <path d="m410.667969 304.007812c-4.097657 0-8.191407-1.558593-11.308594-4.691406-6.25-6.253906-6.25-16.386718 0-22.636718l74.027344-74.027344-74.027344-74.027344c-6.25-6.25-6.25-16.382812 0-22.632812s16.382813-6.25 22.636719 0l85.332031 85.332031c6.25 6.25 6.25 16.386719 0 22.636719l-85.332031 85.332031c-3.136719 3.15625-7.234375 4.714843-11.328125 4.714843zm0 0" />
                                        </svg> Sign In</a>
                                </li>
                            </div>
                        </div>

                </ul>
                @endif
            </div>
        </nav>
    </header>

    <!-- problems modal -->
    <div class="modal fade problems-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">


                <div class="modal-body">
                    <div class="text-center">
                        <div class="btn-cerrar">
                        <button type="button" class="modalClose btn text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                
                        <div class="content-titulo mb-3">
                            <p class="titulo m-0 text-info">wikiPBL User Experience Feedback Form</p>
                        </div>

                        <div class="form-group">
                            <label for="">Enter your comments on any aspect of your experience in the field below.</label>
                            <textarea name="" id="" class="form-control" cols="30" rows="6" v-model="problemDescription"></textarea>
                            <small style="color:red" v-if="problemErrors.hasOwnProperty('description')" v-cloak>@{{ problemErrors['description'][0] }}</small>
                        </div>

                    </div>
                   
                </div>
                <div class="modal-footer">
                    <span class="mr-3">Thank you for your valuable feedback.</span>
                    <button type="button" class="btn btn-primary" @click="reportProblem()">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- problems modal -->


</div>