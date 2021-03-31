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
                                <a class="drop-text" href="#">
                                <button class="menu-effect" style="    margin-left: 40px;" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))" aria-label="Main Menu">
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
                                    <p class="menu-titulo">MENÚ</p>
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
                <button class='navbar-toggler p-2 border-0 hamburger hamburger--elastic d-none-lg' data-toggle='offcanvas' type='button'>
                    <span class='hamburger-box'>
                        <span class='hamburger-inner'></span>
                    </span>
                </button>
                @if(\Auth::check() && \Auth::user()->id)
                <div class='menu-show_xs' >
                    <ul class=''>
                        <div class="row">
                            <div class="col-md-12  mt-3">
                                <div class="menu-flex">
                                    <!-- Iconos temlate option-->
                                    <div class="header-icons mr-0">


                                        @if($project[0]->is_private == 0)
                                        <li class="nav-item   flex-main">
                                            <a href="{{ url('project/edit/'.$project[0]->id) }}">
                                                <img alt='icon' class="login_icon  hover-svg" src="{{ url('assets/img/iconos/edit.svg') }}">
                                                <span class="tooltip-nav">Edit</span>
                                            </a>
                                        </li>
                                        @endif

                                        <li class="nav-item  flex-main mr-0">
                                            <a target="_blank" href="{{ url('/project/pdf/'.$project[0]->id) }}">
                                                <svg class="login_icon  hover-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M20,8.94a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19l-.1,0A1.1,1.1,0,0,0,13.06,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V9S20,9,20,8.94ZM14,5.41,16.59,8H15a1,1,0,0,1-1-1ZM18,19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V5A1,1,0,0,1,7,4h5V7a3,3,0,0,0,3,3h3Zm-4.71-4.71-.29.3V12a1,1,0,0,0-2,0v2.59l-.29-.3a1,1,0,0,0-1.42,1.42l2,2a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l2-2a1,1,0,0,0-1.42-1.42Z" />
                                                </svg>
                                                <span class="tooltip-nav">Download file</span>

                                            </a>
                                        </li>


                                    </div>
                              

                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
                <!---------------nav------------------------>

              <!----  <div class='offcanvas-collapse fil xs_show-edit' id='navbarNav'>--->
              <div class=' xs_show-edit' id='navbarNav'>
                    <ul class='navbar-nav container'>
                        <div class="row">
                            <div class="col-md-12  mt-3">
                                <div class="menu-flex  " >
                                    <!-- Iconos temlate option-->
                                    <div class="header-icons menu-botoom">


                                    <!----------    @if($project[0]->is_private == 0)
                                        <li class="nav-item   flex-main">
                                            <a href="{{ url('project/edit/'.$project[0]->id) }}">
                                                <img alt='icon' class="login_icon  hover-svg" src="{{ url('assets/img/iconos/edit.svg') }}">
                                                <span class="tooltip-nav">Edit</span>
                                            </a>
                                        </li>
                                        @endif

                                        <li class="nav-item  flex-main">
                                            <a target="_blank" href="{{ url('/project/pdf/'.$project[0]->id) }}">
                                                <svg class="login_icon  hover-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M20,8.94a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19l-.1,0A1.1,1.1,0,0,0,13.06,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V9S20,9,20,8.94ZM14,5.41,16.59,8H15a1,1,0,0,1-1-1ZM18,19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V5A1,1,0,0,1,7,4h5V7a3,3,0,0,0,3,3h3Zm-4.71-4.71-.29.3V12a1,1,0,0,0-2,0v2.59l-.29-.3a1,1,0,0,0-1.42,1.42l2,2a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l2-2a1,1,0,0,0-1.42-1.42Z" />
                                                </svg>
                                                <span class="tooltip-nav">Download file</span>

                                            </a>
                                        </li>--------------->

                                        <li class="nav-item  flex-main">
                                            <a style="cursor:pointer;" @click="followProject()">
                                                <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                <svg id="followIcon" class="login_icon  hover-svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                    <path d="M492,127.5h-18v-18c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v18h-18c-11.046,0-20,8.954-20,20s8.954,20,20,20h18v18c0,11.046,8.954,20,20,20c11.046,0,20-8.954,20-20v-18h18c11.046,0,20-8.954,20-20S503.046,127.5,492,127.5z" />
                                                    <path d="M315.409,249.231C345.854,225.711,365.5,188.86,365.5,147.5C365.5,76.645,307.855,19,237,19S108.5,76.645,108.5,147.5c0,41.359,19.646,78.211,50.091,101.731C68.293,280.793,0,367.427,0,473c0,11.046,8.954,20,20,20h434c11.046,0,20-8.954,20-20C474,367.401,405.656,280.775,315.409,249.231z M148.5,147.5c0-48.799,39.701-88.5,88.5-88.5s88.5,39.701,88.5,88.5S285.799,236,237,236S148.5,196.299,148.5,147.5z M41.008,453C51.061,353.73,135.123,276,237,276s185.939,77.73,195.992,177H41.008z" />
                                                </svg>
                                                <span class="tooltip-nav">
                                                    <span v-if="follow == '0'">Follow</span>
                                                    <span v-else>Unfollow</span>
                                                </span>
                                            </a>
                                        </li>

                                        <li class="nav-item  flex-main">
                                            <a style="cursor:pointer;" @click="likeProject()">
                                                <svg id="likeIcon" class="login_icon  hover-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M21.3,10.08A3,3,0,0,0,19,9H14.44L15,7.57A4.13,4.13,0,0,0,11.11,2a1,1,0,0,0-.91.59L7.35,9H5a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H17.73a3,3,0,0,0,2.95-2.46l1.27-7A3,3,0,0,0,21.3,10.08ZM7,20H5a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H7Zm13-7.82-1.27,7a1,1,0,0,1-1,.82H9V10.21l2.72-6.12A2.11,2.11,0,0,1,13.1,6.87L12.57,8.3A2,2,0,0,0,14.44,11H19a1,1,0,0,1,.77.36A1,1,0,0,1,20,12.18Z" />
                                                </svg>
                                                <span class="like-xs"> @{{ likes }}</span>
                                                <span class="tooltip-nav">
                                                    <span v-if="like == '0'">Like</span>
                                                    <span v-else>Dislike</span>
                                                </span>


                                            </a>
                                        </li>

                                        <li class="nav-item  flex-main">
                                            <a style="cursor:pointer;" @click="showReportConfirmation()">
                                                <svg id="reportIcon" class="login_icon  hover-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                                    <path d="M2.00146 4.00134C2.00146 2.89677 2.8969 2.00134 4.00146 2.00134H12.0001C13.1047 2.00134 14.0001 2.89677 14.0001 4.00134V10.1312L13.0001 8.43571V4.00134C13.0001 3.44906 12.5524 3.00134 12.0001 3.00134H4.00146C3.44918 3.00134 3.00146 3.44906 3.00146 4.00134V12C3.00146 12.5523 3.44918 13 4.00146 13H6.30766L6.26747 13.0681C6.10029 13.3516 6.0083 13.672 6.00054 14H4.00146C2.89689 14 2.00146 13.1046 2.00146 12V4.00134Z" />
                                                    <path d="M7.19234 11.5L7.78213 10.5H7.00317C6.72703 10.5 6.50317 10.7239 6.50317 11 6.50317 11.2761 6.72703 11.5 7.00317 11.5H7.19234zM8.96155 8.50029L9.26972 7.9778C9.37807 7.79407 9.51219 7.63441 9.66466 7.5004L7.00325 7.5C6.72711 7.49996 6.50322 7.72378 6.50317 7.99993 6.50313 8.27607 6.72696 8.49996 7.0031 8.5L8.96155 8.50029zM5.5 5C5.5 5.41421 5.16421 5.75 4.75 5.75 4.33579 5.75 4 5.41421 4 5 4 4.58579 4.33579 4.25 4.75 4.25 5.16421 4.25 5.5 4.58579 5.5 5zM4.75 8.75189C5.16421 8.75189 5.5 8.41611 5.5 8.00189 5.5 7.58768 5.16421 7.25189 4.75 7.25189 4.33579 7.25189 4 7.58768 4 8.00189 4 8.41611 4.33579 8.75189 4.75 8.75189zM5.5 11C5.5 11.4142 5.16421 11.75 4.75 11.75 4.33579 11.75 4 11.4142 4 11 4 10.5858 4.33579 10.25 4.75 10.25 5.16421 10.25 5.5 10.5858 5.5 11zM7.00317 4.5C6.72703 4.5 6.50317 4.72386 6.50317 5 6.50317 5.27614 6.72703 5.5 7.00317 5.5H11.4773C11.7535 5.5 11.9773 5.27614 11.9773 5 11.9773 4.72386 11.7535 4.5 11.4773 4.5H7.00317zM10.7349 8.03453C10.9857 7.96839 11.2604 7.99559 11.5012 8.1296 11.6558 8.21564 11.7822 8.33911 11.8687 8.48581L14.8709 13.5761C15.005 13.8034 15.031 14.059 14.9659 14.2919 14.9007 14.5249 14.7436 14.737 14.5035 14.8706 14.3517 14.955 14.1788 15 14.0021 15H7.99763C7.7173 15 7.467 14.8901 7.28702 14.7152 7.1073 14.5407 7 14.3042 7 14.0453 7 13.8816 7.04402 13.7199 7.12882 13.5761L10.1311 8.48581C10.2656 8.25769 10.4843 8.10064 10.7349 8.03453zM11.5 9.5022C11.5 9.22606 11.2761 9.0022 11 9.0022 10.7239 9.0022 10.5 9.22606 10.5 9.5022V11.498C10.5 11.7741 10.7239 11.998 11 11.998 11.2761 11.998 11.5 11.7741 11.5 11.498V9.5022zM11 14.5C11.4142 14.5 11.75 14.1642 11.75 13.75 11.75 13.3358 11.4142 13 11 13 10.5858 13 10.25 13.3358 10.25 13.75 10.25 14.1642 10.5858 14.5 11 14.5z" />
                                                </svg>
                                                <span class="tooltip-nav">
                                                    <span v-if="report == '0'">Report</span>
                                                    <span v-else>Unreport</span>
                                                </span>

                                            </a>

                                        </li>


                                    </div>
                                    <!-- Iconos temlate option-->
                                  <!----  <li class='nav-item  flex-main'>
                                        <img alt='icon' class="teacher-icon " src="{{ url('assets/img/iconos/user-teacher.png') }}">
                                        <a @if(\Auth::user()->role_id == 2) href="{{ url('/teacher/profile') }}" @else href="{{ url('/institution/profile') }}" @endif class='nav-link'>{{ \Auth::user()->name }}
                                            {{ substr(\Auth::user()->lastname, 0, 1) }}.</a>
                                    </li>
                                    <li class="nav-item   flex-main">
                                        <a href="{{ url('logout') }}">
                                            <img alt='icon' class="login_icon  hover-svg" src="{{ url('assets/img/iconos/logout.svg') }}">
                                        </a>
                                    </li>--->

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
                                        <a class='nav-link  '> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="92px" height="92px" viewBox="0 0 92 92" xml:space="preserve">
                                                <path id="XMLID_1253_" d="M46 57.1c14.8 0 26.9-12.1 26.9-27C72.9 15.1 60.8 3 46 3S19.1 15.1 19.1 30c0 15 12.1 27.1 26.9 27.1zM46 11c10.4 0 18.9 8.5 18.9 19S56.4 49 46 49s-18.9-8.5-18.9-19S35.6 11 46 11zm12.5 48.7c-1.3-.4-2.8-.1-3.8.8L46 67.9l-8.7-7.4c-1.1-.9-2.5-1.2-3.8-.8C27.9 61.5 0 71.1 0 85c0 2.2 1.8 4 4 4h84c2.2 0 4-1.8 4-4 0-13.9-27.9-23.5-33.5-25.3zM10.1 81c4.4-4.7 15-9.9 23.8-12.9l9.5 8.1c1.5 1.3 3.7 1.3 5.2 0l9.5-8.1c8.8 3.1 19.4 8.3 23.8 12.9H10.1z" />
                                                <metadata>
                                                    <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                        <rdf:Description about="https://iconscout.com/legal#licenses" dc:title="user" dc:description="user" dc:publisher="Iconscout" dc:date="2017-09-24" dc:format="image/svg+xml" dc:language="en">
                                                            <dc:creator>
                                                                <rdf:Bag>
                                                                    <rdf:li>Amit Jakhu</rdf:li>
                                                                </rdf:Bag>
                                                            </dc:creator>
                                                        </rdf:Description>
                                                    </rdf:RDF>
                                                </metadata>
                                            </svg>
                                            Register</a>
                                    </li>
                                    <li class='nav-item w-nav' data-toggle="modal" data-target=".institution-modal">
                                        <a class='nav-link'><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 464 464" style="enable-background:new 0 0 464 464;" xml:space="preserve">
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
                                            </svg>Institution Registration</a>
                                    </li>
                                </div>
                            </div>

                    </ul>
                </div>
                @endif
            </div>
        </nav>
    </header>


    <!-- registro modal -->
    @include("partials.authModals.teacherRegistrationModal")


    <!-- institution-modal modal -->
    @include("partials.authModals.institutionRegistrationModal")


    <!------------------------------mensaje de confimacion de regitro instituto------------------------------------------->

    <!-- Modal -->
    @include("partials.authModals.messageModal")

    <!-- Login -->
    @include("partials.authModals.loginModal")

    <!-- forgot Password -->
    @include("partials.authModals.forgotPasswordModal")

    <!------------------------------mensaje de confimacion de regitro instituto------------------------------------------->
</div>