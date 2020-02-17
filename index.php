<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FCM</title>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.8.2/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.8.2/firebase-analytics.js"></script>

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
    </script>
</head>
<body>
    <h1>FCM</h1>
</body>
</html>