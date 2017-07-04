
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
function createClick(){

  var testingEvent = 
  {
    firstName:"Jooohn",
    lastName:"Doeooooo",
    age:60,
    eyeColor:"blue"
  };
// const firebaseRef = firebase.database().ref().child('Test').child('111').set(testingEvent);
// 
  // const firebaseRef = firebase.database().ref().child('TestingObject').child('111').child('sessions').child('67').set('hello');

 // Get a key fr new Post
var newPostKey = firebase.database().ref().child('Test').push().key; 
  window.alert(newPostKey);

//Write new post's data 
var updates={};
updates['/Test/' + newPostKey] = testingEvent;
updates['/user-posts/' + '999' + '/' + newPostKey] = testingEvent;

return firebase.database.ref().update(updates);

}

