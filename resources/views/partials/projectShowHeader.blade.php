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
                                        
                                        
                                        @if($project[0]->is_private == 0)
                                            <li class="nav-item   flex-main" >
                                                <a href="{{ url('project/edit/'.$project[0]->id) }}">
                                                    <img alt='icon' class="login_icon  hover-svg"
                                                    src="{{ url('assets/img/iconos/edit.svg') }}">
                                                    <span class="tooltip-nav">Edit</span>
                                                </a>
                                            </li>
                                        @endif

                                        <li class="nav-item  flex-main">
                                            <a target="_blank" href="{{ url('/project/pdf/'.$project[0]->id) }}">
                                            <svg class="login_icon  hover-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,8.94a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19l-.1,0A1.1,1.1,0,0,0,13.06,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V9S20,9,20,8.94ZM14,5.41,16.59,8H15a1,1,0,0,1-1-1ZM18,19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V5A1,1,0,0,1,7,4h5V7a3,3,0,0,0,3,3h3Zm-4.71-4.71-.29.3V12a1,1,0,0,0-2,0v2.59l-.29-.3a1,1,0,0,0-1.42,1.42l2,2a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l2-2a1,1,0,0,0-1.42-1.42Z"/></svg>
                                            <span class="tooltip-nav">Download file</span>
                                                
                                            </a>
                                        </li>

                                        <li class="nav-item  flex-main">
                                            <a style="cursor:pointer;" @click="followProject()">
                                            <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                <svg id="followIcon" class="login_icon  hover-svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><path d="M492,127.5h-18v-18c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v18h-18c-11.046,0-20,8.954-20,20s8.954,20,20,20h18v18c0,11.046,8.954,20,20,20c11.046,0,20-8.954,20-20v-18h18c11.046,0,20-8.954,20-20S503.046,127.5,492,127.5z"/><path d="M315.409,249.231C345.854,225.711,365.5,188.86,365.5,147.5C365.5,76.645,307.855,19,237,19S108.5,76.645,108.5,147.5c0,41.359,19.646,78.211,50.091,101.731C68.293,280.793,0,367.427,0,473c0,11.046,8.954,20,20,20h434c11.046,0,20-8.954,20-20C474,367.401,405.656,280.775,315.409,249.231z M148.5,147.5c0-48.799,39.701-88.5,88.5-88.5s88.5,39.701,88.5,88.5S285.799,236,237,236S148.5,196.299,148.5,147.5z M41.008,453C51.061,353.73,135.123,276,237,276s185.939,77.73,195.992,177H41.008z"/></svg>
                                                        <span class="tooltip-nav">
                                                            <span v-if="follow == '0'">Follow</span>
                                                            <span v-else>Unfollow</span>
                                                        </span>            
                                            </a>
                                        </li>

                                        <li class="nav-item  flex-main">
                                            <a style="cursor:pointer;" @click="likeProject()">
                                            <svg id="likeIcon" class="login_icon  hover-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.3,10.08A3,3,0,0,0,19,9H14.44L15,7.57A4.13,4.13,0,0,0,11.11,2a1,1,0,0,0-.91.59L7.35,9H5a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H17.73a3,3,0,0,0,2.95-2.46l1.27-7A3,3,0,0,0,21.3,10.08ZM7,20H5a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H7Zm13-7.82-1.27,7a1,1,0,0,1-1,.82H9V10.21l2.72-6.12A2.11,2.11,0,0,1,13.1,6.87L12.57,8.3A2,2,0,0,0,14.44,11H19a1,1,0,0,1,.77.36A1,1,0,0,1,20,12.18Z"/></svg>
                                            <span class="tooltip-nav">
                                                <span v-if="like == '0'">Like</span>
                                                <span v-else>Dislike</span>
                                            </span>
                                            
                                          
                                            </a>
                                        </li>

                                        <li class="nav-item  flex-main">
                                            <a style="cursor:pointer;" @click="showReportConfirmation()">
                                                <svg id="reportIcon" class="login_icon  hover-svg" xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 16 16"><path  d="M2.00146 4.00134C2.00146 2.89677 2.8969 2.00134 4.00146 2.00134H12.0001C13.1047 2.00134 14.0001 2.89677 14.0001 4.00134V10.1312L13.0001 8.43571V4.00134C13.0001 3.44906 12.5524 3.00134 12.0001 3.00134H4.00146C3.44918 3.00134 3.00146 3.44906 3.00146 4.00134V12C3.00146 12.5523 3.44918 13 4.00146 13H6.30766L6.26747 13.0681C6.10029 13.3516 6.0083 13.672 6.00054 14H4.00146C2.89689 14 2.00146 13.1046 2.00146 12V4.00134Z"/><path d="M7.19234 11.5L7.78213 10.5H7.00317C6.72703 10.5 6.50317 10.7239 6.50317 11 6.50317 11.2761 6.72703 11.5 7.00317 11.5H7.19234zM8.96155 8.50029L9.26972 7.9778C9.37807 7.79407 9.51219 7.63441 9.66466 7.5004L7.00325 7.5C6.72711 7.49996 6.50322 7.72378 6.50317 7.99993 6.50313 8.27607 6.72696 8.49996 7.0031 8.5L8.96155 8.50029zM5.5 5C5.5 5.41421 5.16421 5.75 4.75 5.75 4.33579 5.75 4 5.41421 4 5 4 4.58579 4.33579 4.25 4.75 4.25 5.16421 4.25 5.5 4.58579 5.5 5zM4.75 8.75189C5.16421 8.75189 5.5 8.41611 5.5 8.00189 5.5 7.58768 5.16421 7.25189 4.75 7.25189 4.33579 7.25189 4 7.58768 4 8.00189 4 8.41611 4.33579 8.75189 4.75 8.75189zM5.5 11C5.5 11.4142 5.16421 11.75 4.75 11.75 4.33579 11.75 4 11.4142 4 11 4 10.5858 4.33579 10.25 4.75 10.25 5.16421 10.25 5.5 10.5858 5.5 11zM7.00317 4.5C6.72703 4.5 6.50317 4.72386 6.50317 5 6.50317 5.27614 6.72703 5.5 7.00317 5.5H11.4773C11.7535 5.5 11.9773 5.27614 11.9773 5 11.9773 4.72386 11.7535 4.5 11.4773 4.5H7.00317zM10.7349 8.03453C10.9857 7.96839 11.2604 7.99559 11.5012 8.1296 11.6558 8.21564 11.7822 8.33911 11.8687 8.48581L14.8709 13.5761C15.005 13.8034 15.031 14.059 14.9659 14.2919 14.9007 14.5249 14.7436 14.737 14.5035 14.8706 14.3517 14.955 14.1788 15 14.0021 15H7.99763C7.7173 15 7.467 14.8901 7.28702 14.7152 7.1073 14.5407 7 14.3042 7 14.0453 7 13.8816 7.04402 13.7199 7.12882 13.5761L10.1311 8.48581C10.2656 8.25769 10.4843 8.10064 10.7349 8.03453zM11.5 9.5022C11.5 9.22606 11.2761 9.0022 11 9.0022 10.7239 9.0022 10.5 9.22606 10.5 9.5022V11.498C10.5 11.7741 10.7239 11.998 11 11.998 11.2761 11.998 11.5 11.7741 11.5 11.498V9.5022zM11 14.5C11.4142 14.5 11.75 14.1642 11.75 13.75 11.75 13.3358 11.4142 13 11 13 10.5858 13 10.25 13.3358 10.25 13.75 10.25 14.1642 10.5858 14.5 11 14.5z"/></svg>
                                                <span class="tooltip-nav">
                                                <span v-if="report == '0'">Report</span>
                                                    <span v-else>Unreport</span>
                                                </span>    
                                         
                                            </a>
                                            
                                        </li>

                                          
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
                                            <img alt='icon' class="login_icon  hover-svg" src="{{ url('assets/img/iconos/logout.svg') }}">
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

