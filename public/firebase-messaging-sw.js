importScripts("https://www.gstatic.com/firebasejs/8.2.6/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/8.2.6/firebase-messaging.js");

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

messaging.onBackgroundMessage((payload) => {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    // Customize notification here
    const notificationTitle = 'Background Message Title';
    const notificationOptions = {
      body: 'Background Message body.',
      icon: '/firebase-logo.png'
    };
  
    self.registration.showNotification(notificationTitle,
      notificationOptions);
  });

/*messaging.setBackgroundMessageHandler(function(payload){


    const notification=payload.data

    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(notification.title,notificationOption);
})*/