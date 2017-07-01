
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBoSpzhFZLwPubJ6lgYjH50cEitXiMEXvU",
    authDomain: "matchit-e3c39.firebaseapp.com",
    databaseURL: "https://matchit-e3c39.firebaseio.com",
    projectId: "matchit-e3c39",
    storageBucket: "matchit-e3c39.appspot.com",
    messagingSenderId: "1097349398020"
  };
  firebase.initializeApp(config);

  window.alert("OKAY");

const firebaseRef = firebase.database().ref().child('object').set("well fuck you");