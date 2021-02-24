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

        @yield("content")

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

    @stack("script")

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

                    window.localStorage.setItem("show_notifications", "1")

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

</body>

</html>
