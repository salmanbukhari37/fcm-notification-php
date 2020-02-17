importScripts('https://www.gstatic.com/firebasejs/7.8.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.8.1/firebase-messaging.js');

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

// Retrieve Firebase Messaging object.
const messaging = firebase.messaging(); 

messaging.setBackgroundMessageHandler(function(payload) {
	console.log('[firebase-messaging-sw.js] Received background message ', payload);
	const { title, body, icon, image, click_action } = payload.data;

    const options = {
        title, body, icon, image, data : {
            time: new Date(Date.now()).toString(),
            click_action: click_action
        }
    }

    var myNotification = new Notification(title, options);	
	return self.registration.showNotification(title, options);
});

self.addEventListner('notificationclick', function (event) {
	console.log(event.notification);
	var action_click = event.notification.data.click_action;
	event.notification.close();

	event.waitUntil(
		clients.openWindow(action_click)
	);
})