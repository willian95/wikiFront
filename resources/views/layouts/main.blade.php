<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/img/favicon.png') }}">
    <title>wikiPBL</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300;400;500;700;900&family=Montserrat:wght@300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
 
    <link rel="stylesheet" href="{{ url('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/new.css') }}">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <style>
        .ajs-message.ajs-custom {
            color: #31708f;
            background-color: #d9edf7;
            border-color: #31708f;
        }
    </style>

    <style>
        .elipse {
            background: #fff;
            position: fixed;
            z-index: 9999999;
            height: 100%;
            width: 100%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            left: 0;
            right: 0;
        }

        .elipse img {
            opacity: 0.3;
            width: 15rem;
            position: absolute;
            animation-name: animates;
            animation-duration: 2s;
            /* or: Xms */
            animation-iteration-count: infinite;
            animation-direction: alternate;
            /* or: normal */
            animation-timing-function: ease-out;
            animation-fill-mode: forwards;
            /* or: backwards, both, none */
            animation-delay: 1s;
        }



        @-webkit-keyframes animates {
            0% {
                opacity: 0.3;
            }

            100% {
                opacity: 0.8;
            }
        }
    </style>
    @stack("css")
</head>

<body>
    <main>
        @include("partials.header")
        <div class="container p5">
            @yield("content")
            <footer class="footer-estyle">
                <div class="footer container mt-5 text-center">

                    <p class="items-footer">
                        <a data-toggle="modal" data-target="."> Terms and conditions</a>
                        <a data-toggle="modal" data-target=".privacypolicy">Privacy Policy </a>
                        <a data-toggle="modal" data-target=".faq-modal">FAQ'S</a>
                        <a href="{{ url('/about') }}">About wikiPBL</a>
                    </p>
                    <span class="copy-footer"> © 2021 Copyrights <strong>wikiPBL</strong> </span>
                </div>
            </footer>
        </div>
    </main>
    <!-- partial -->
    <script src="{{ url('assets/js/script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    </script>

    <script src="{{ url('assets/js/stepform.js') }}"></script>
    <script src="{{ url('assets/js/main.js') }}"></script>
    <script src="{{ url('js/app.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-messaging.js"></script>

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        $(document).ready(function() {

            var firebaseConfig = {
                apiKey: "AIzaSyBb0uKwppvkQM-ZgwJTPz0DondwITp5cr4",
                authDomain: "wikipbl-cc8f6.firebaseapp.com",
                projectId: "wikipbl-cc8f6",
                storageBucket: "wikipbl-cc8f6.appspot.com",
                messagingSenderId: "1025334549968",
                appId: "1:1025334549968:web:4fd31998bf2f1001c7add5",
                measurementId: "G-9V2ELKNRET"
            };

            firebase.initializeApp(firebaseConfig)
            const messaging = firebase.messaging();

            function InititalizeFireBaseMessaging() {
                messaging
                    .requestPermission()
                    .then(function() {
                        console.log("Notification Permission");
                        return messaging.getToken();
                    })
                    .then(function(token) {
                        localStorage.setItem("fcm_token", token)
                        console.log("Token : " + token);
                    })
                    .catch(function(reason) {
                        console.log(reason);
                    });
            }

            messaging.onMessage(function(payload) {
                console.log(payload)
                let data = payload.data

                const notificationOption = {
                    body: data.body,
                    icon: data.icon
                };


                if (Notification.permission === "granted") {

                    /*var notification=new Notification(data.title, notificationOption);

                    notification.onclick=function (ev) {
                        ev.preventDefault();
                        window.open(data.click_action,'_blank');
                    }*/

                    window.localStorage.setItem("show_notifications", "1")
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.notify(data.body, 'custom', 5, function() {
                        console.log('dismissed');
                    });

                }

            })

            messaging.onTokenRefresh(function(payload) {
                messaging.getToken().then(function(newToken) {
                        console.log("new token: " + newToken)
                    })
                    .catch(function(reason) {
                        console.log(reason)
                    })
            })

            InititalizeFireBaseMessaging()

            @if(\Auth::check())
            window.setTimeout(() => {
                window.location.href = "{{ url('logout') }}"
            }, 900000);
            @endif

        })
    </script>

    <!-- Modal FAQ -->
    <div class="modal fade faq-modal " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="text-center">
                        <h3>FAQ’S </h3>
                    </div>
                    <div class="mt-5 mb-5">
                        <p>Q: Can I delete my wikiPBL once I have started the development process?</p>
                        <p>A: Any wikiPBL you develop lives initially in your personal folder. You can delete this wikiPBL any time. However, once you have published your wikiPBLfor shared development and use by others, it lives in two distinct and independent places: your personal folder and the public space. Once published to the public space, you will be unable to delete this version of the wikiPBL. However, you can still delete the version of the wikiPBL that lives in your personal folder. In other words, once you share a wikiPBL, the shared version cannot be deleted.</p>
                    </div>
                    <div class="mt-5 mb-5">
                        <p>Q: Will I retain ownership of my wikiPBL once I publish it?</p>
                        <p>A: You will always be credited as the Original Poster (OP) of any wikiPBL you initiate or publish (including incubator wikiPBLs.) Resource sharing is a core philosophy at wikiPBL. Once a wikiPBL is published (in any stage of completion), it will become free to use and edit by our wikiPBL community.</p>

                    </div>
                    <div class="mt-5 mb-5">
                        <p> Q: Do I have to be associated with a school to use wikiPBL? What if I am a freelance educator or private tutor?</p>
                        <p>A: wikiPBL is a closed community (for safety reasons) intended for educators. You don’t have to be a associated with a school so if you are an educator outside of a school please send us an email at info@wikipbl.org </p>
                    </div>



                    <div class="mt-5 mb-5">
                        <p> Q: Can I share my wikiPBL without letting people edit it?</p>
                        <p>A: Yes you can by selecting “view only,” however the goal of wikiPBL is to encourage shared project development and open resource sharing. You will always have access to the original version of your wikiPBL (which will live in your personal folder), and you can edit on your own. Remember you can always use the ideas others suggest for your project for your own personal version, which can remain unpublished, but we encourage you to share your genius with others as well.</p>

                    </div>
                    <div class="mt-5 mb-5">
                        <p> Q: Why will my wikiPBL make my projects better?</p>
                        <p>A: Your project ideas will benefit from suggestions by users around the world with varying levels of expertise, and a variety of experiences.</p>

                    </div>
                    <div class="mt-5 mb-5">
                        <p>Q. Can I have a private wikiPBL that no one can see?</p>
                        <p>A: Any wikiPBL you develop lives initially in your personal folder which only you can see. You can edit or delete this wikiPBL at any time.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade tyc " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="text-center">
                        <h3>Terms & Conditions - Privacy Policy </h3>
                    </div>
                    <div class="mt-5 mb-5">
                        <p><strong>Term 1</strong></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ipsa, pariatur ex a saepe voluptas perferendis, fuga adipisci placeat eligendi tenetur amet! Inventore recusandae tempora quibusdam cumque asperiores deserunt voluptas.</p>
                    </div>
                    <div class="mt-5 mb-5">
                        <p><strong>Term 1</strong></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ipsa, pariatur ex a saepe voluptas perferendis, fuga adipisci placeat eligendi tenetur amet! Inventore recusandae tempora quibusdam cumque asperiores deserunt voluptas.</p>
                    </div>
                    <div class="mt-5 mb-5">
                        <p><strong>Term 1</strong></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ipsa, pariatur ex a saepe voluptas perferendis, fuga adipisci placeat eligendi tenetur amet! Inventore recusandae tempora quibusdam cumque asperiores deserunt voluptas.</p>
                    </div>
                    <div class="mt-5 mb-5">
                        <p><strong>Term 1</strong></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ipsa, pariatur ex a saepe voluptas perferendis, fuga adipisci placeat eligendi tenetur amet! Inventore recusandae tempora quibusdam cumque asperiores deserunt voluptas.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stack("script")
</body>

</html>