//real time data retrieve
/*var firebaseHeadingRef = firebase.database().ref().child("Heading");

firebaseHeadingRef.on('value', function(datasnapshot){
	fireHeading.innerText = datasnapshot.val();
});*/

//write to database
function submitClick(){
	//get the html element
	var x = document.getElementById("eventID").value;
	var eventName = document.getElementsByName("eventName");
	var eventLocation = document.getElementsByName("eventLocation");
	var sessionDate = document.getElementsByClassName("eventDate");

	//Increase event id in firebase
	//var eventIDIncrement = parseInt(x) + parseInt(1);

	var firebaseRef = firebase.database().ref(); //object for the database

	//Create event
	var newPostRef = firebaseRef.child("events/"+x+"");
	newPostRef.set({
		//adding child value to event
		name: eventName[0].value,
		location: eventLocation[0].value
	});
	
	/*//Create sessions in event
	var test1 = newPostRef.child("sessions/"+mainText2+"");
	test1.set({
		//adding child value to sessions
		date: sessionDate[0].value
	});*/
	
	for(i=0; i<tableRow.length; i++){
		//Create sessions in event
		var test1 = newPostRef.child("sessions/"+i+"");
		test1.set({
			//adding child value to sessions
			date: sessionDate[i].value
		});
	}

	/*var messageText = mainText.value;
	var messageText2 = mainText2.value;

	firebaseRef.push().set(messageText); //manually set the data in firebase
	firebaseRef.push().set(messageText2); //manually set the data in firebase*/

}

//Retrieve data from firebase
$(document).ready(function(){
	var rootRef = firebase.database().ref().child("events");

	rootRef.on("child_added", snap => {
		var name = snap.child("category").val();
		var email = snap.child("description").val();

		$("#table_body").append("<tr><td>"+name+"</td><td>"+email+"</td><td><button>Remove</button></td></tr>");
	});
});