<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/img/favicon.png') }}">
    <title>Wikipbl</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300;400;500;700;900&family=Montserrat:wght@300;400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/responsive.css') }}">
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
    <main>
        @include("partials.header")
        <div class="container p5">
            @yield("content")
            <footer class="footer-estyle">
                <div class="footer container mt-5 text-center">
                    <p> <a data-toggle="modal" data-target=".privacypolicy">Privacy Policy </a> - <a data-toggle="modal" data-target=".tyc" >Terms & Conditions</a> - <a href="#">About WikiPBL</a> - 2021
                    Copyrights - Contact us! </p>
                </div>
            </footer>
        </div>
    </main>
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


    <script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-messaging.js"></script>

    <script>

        $(document).ready(function(){

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
                    .then(function () {
                        console.log("Notification Permission");
                        return messaging.getToken();
                    })
                    .then(function (token) {
                        localStorage.setItem("fcm_token", token)
                        console.log("Token : "+token);
                    })
                    .catch(function (reason) {
                        console.log(reason);
                    });
            }

            messaging.onMessage(function(payload){
                console.log("payload", payload.data.notification)

                const notificationOption={
                    body:payload.notification.body,
                    icon:payload.notification.icon
                };

                if(Notification.permission==="granted"){
                    var notification=new Notification(payload.notification.title,notificationOption);

                    notification.onclick=function (ev) {
                        ev.preventDefault();
                        window.open(payload.notification.click_action,'_blank');
                        notification.close();
                    }
                }

            })

            messaging.onTokenRefresh(function(payload){
                messaging.getToken().then(function(newToken){
                    console.log("new token: "+newToken)
                })
                .catch(function(reason){
                    console.log(reason)
                })
            })

            InititalizeFireBaseMessaging()

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
                        <p><strong>Question 1</strong></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ipsa, pariatur ex a saepe voluptas perferendis, fuga adipisci placeat eligendi tenetur amet! Inventore recusandae tempora quibusdam cumque asperiores deserunt voluptas.</p>
                    </div>
                    <div class="mt-5 mb-5">
                        <p><strong>Question 2</strong></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ipsa, pariatur ex a saepe voluptas perferendis, fuga adipisci placeat eligendi tenetur amet! Inventore recusandae tempora quibusdam cumque asperiores deserunt voluptas.</p>
                    </div>
                    <div class="mt-5 mb-5">
                        <p><strong>Question 3</strong></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ipsa, pariatur ex a saepe voluptas perferendis, fuga adipisci placeat eligendi tenetur amet! Inventore recusandae tempora quibusdam cumque asperiores deserunt voluptas.</p>
                    </div>
                    <div class="mt-5 mb-5">
                        <p><strong>Question 4</strong></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ipsa, pariatur ex a saepe voluptas perferendis, fuga adipisci placeat eligendi tenetur amet! Inventore recusandae tempora quibusdam cumque asperiores deserunt voluptas.</p>
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
