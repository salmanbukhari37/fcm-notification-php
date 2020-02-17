<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCM</title>
    <link rel="manifest" href="./manifest.json">
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.8.1/firebase-app.js"></script>

    <script src="https://www.gstatic.com/firebasejs/7.8.1/firebase-messaging.js"></script>
    
    <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.8.2/firebase-analytics.js"></script>

    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

    <script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyAxlCrBnR7yiOSJbbYcVQ7N3VOIYecVaJk",
        authDomain: "testing-app-d6a98.firebaseapp.com",
        databaseURL: "https://testing-app-d6a98.firebaseio.com",
        projectId: "testing-app-d6a98",
        storageBucket: "testing-app-d6a98.appspot.com",
        messagingSenderId: "120757646415",
        appId: "1:120757646415:web:f82aaeb0ec608d54c0263a",
        measurementId: "G-XLL4HHS6N9"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();

    // Retrieve Firebase Messaging object.
    const messaging = firebase.messaging(); 

    // Get Instance ID token. Initially this makes a network call, once retrieved
    // subsequent calls to getToken will return from cache.
    messaging.getToken().then((currentToken) => {
    if (currentToken) {
        console.log(currentToken);
        saveToken(currentToken);

        sendTokenToServer(currentToken);
        // updateUIForPushEnabled(currentToken);
    } else {
        // Show permission request.
        console.log('No Instance ID token available. Request permission to generate one.');
        // Show permission UI.
        // updateUIForPushPermissionRequired();
        setTokenSentToServer(false);
    }
    }).catch((err) => {
        console.log('An error occurred while retrieving token. ', err);
        showToken('Error retrieving Instance ID token. ', err);
        setTokenSentToServer(false);
    });

    function showToken(currentToken) {
        // Show token in console and UI.
        const tokenElement = document.querySelector('#token');
        tokenElement.textContent = currentToken;
    }

    // Send the Instance ID token your application server, so that it can:
    // - send messages back to this app
    // - subscribe/unsubscribe the token from topics
    function sendTokenToServer(currentToken) {
        if (!isTokenSentToServer()) {
        console.log('Sending token to server...');
        // TODO(developer): Send the current token to your server.
        setTokenSentToServer(true);
        } else {
        console.log('Token already sent to server so won\'t send it again ' +
            'unless it changes');
        }

    }

    function isTokenSentToServer() {
        return window.localStorage.getItem('sentToServer') === '1';
    }

    function setTokenSentToServer(sent) {
        window.localStorage.setItem('sentToServer', sent ? '1' : '0');
    }

    function saveToken( token ) {
        $.ajax({
            data: {token: token},
            type: 'POST',
            url: 'saveFcmToken.php',
            success: (res) => {
                
            }
        });
    }

    </script>
</head>
<body>
    <h1>FCM</h1>
</body>
</html>