<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/img/favicon.png') }}">
    <title>Wikipbl</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300;400;500;700;900&family=Montserrat:wght@300;400;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <style>
        .loader-cover-custom {
            position: fixed;
            left: 0;
            right: 0;
            z-index: 99999999;
            background-color: rgba(0, 0, 0, 0.6);
            top: 0;
            bottom: 0;
        }

        .loader-custom {
            margin-top: 45vh;
            margin-left: 45%;
            border: 16px solid #f3f3f3;
            /* Light grey */
            border-top: 16px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

    </style>

    @stack("css")

</head>

<body>
    <header>
        <nav class='navbar navbar-expand-md navbar-fixed-js'>
            <div class='flex-custom'>
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
                                    <li class='nav-item  border-nav'>
                                        <a class='nav-link'>{{ \Auth::user()->name }}
                                            {{ substr(\Auth::user()->lastname, 0, 1) }}.</a>
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
    <div class="container">

        <div class="main-profile">
            <div class="main-profile_content">
                <h1 class="text-center">Institution profile</h1>
                <p>Stats</p>
            </div>

            <div class="row main-dates">
                <div class="col-md-4">
                    <p>Registered Educators:</p>
                    <span>32</span>

                </div>
                <div class="col-md-4">
                    <p>WikiPBL Pages (public):</p>
                    <span>32</span>
                </div>
                <div class="col-md-4">
                    <p> Private wikiPBL Pages:</p>
                    <span>32</span>
                </div>
            </div>

            <div class="main-profile_dates">
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <p><strong> Name:</strong>Harvard University</p>
                            <p><strong>Member since:</strong> 22/NOV/2020</p>
                            <p><strong> Country:</strong> United States of America +</p>
                            <p><strong>City:</strong> Cambridge, MA</p>
                            <p><strong>Lowest Age:</strong>4</p>
                            <p><strong>Highest Age:</strong>18</p>
                            <p><strong> Type:</strong> Mixed</p>
                            <p><strong>Type:</strong>Private</p>
                            <p><strong>PBL Network:</strong> The PBL Network</p>
                            <p><strong> # students enrolled:</strong>100 - 500</p>
                            <p><strong> # faculty members:</strong> 0 - 50</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3> Created by</h3>
                        <p><strong> Name:</strong>Frank Locker</p>
                        <p><strong> Email:</strong>fl@harvard.com</p>

                        <button class="btn btn-custom">Update profile!</button>
                    </div>
                </div>
            </div>
        </div>






        <footer class="footer-estyle">
            <div class="footer container mt-5 text-center">
                <p> <a href="#">Privacy Policy </a> - <a href="#">Terms & Conditions</a> - <a href="#">About WikiPBL</a>
                    - 2021 Copyrights - Contact us! </p>
            </div>
        </footer>
    </div>
    <!-- partial -->
    <script src="{{ url('assets/js/script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js">
    </script>
    <script src="{{ url('assets/js/stepform.js') }}"></script>
    <script src="{{ url('assets/js/main.js') }}"></script>
    <script src="{{ url('js/app.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @stack("script")

</body>

</html>
