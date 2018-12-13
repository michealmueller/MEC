importScripts('https://www.gstatic.com/firebasejs/5.7.0/firebase-app.js')
importScripts('https://www.gstatic.com/firebasejs/5.7.0/firebase-messaging.js')

var config = {
    apiKey: "AIzaSyBI98RLgpZXYqaK0SKWKQjVQH4rbu2vKZ0",
    authDomain: "citizenwarfare.firebaseapp.com",
    databaseURL: "https://citizenwarfare.firebaseio.com",
    projectId: "citizenwarfare",
    storageBucket: "citizenwarfare.appspot.com",
    messagingSenderId: "548031177419"
};
firebase.initializeApp(config);

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload){
    const title = {
        body:payload.data.title
    };
    const options = {
        body:payload.data.status
    };
    return self.registration.showNotification(title, options);
});