//real time data retrieve
/*var firebaseHeadingRef = firebase.database().ref().child("Heading");

firebaseHeadingRef.on('value', function(datasnapshot){
	fireHeading.innerText = datasnapshot.val();
});*/

//write to database
function submitClick(){
	//get the html element
	var x = document.getElementById("eventID").value;
	var eventName = document.getElementById("eventName");
	var eventLocation = document.getElementById("eventLocation");
	var eventStartDate = document.getElementById("eventStartDate");
	var eventEndDate = document.getElementById("eventEndDate");
	var eventDesc = document.getElementById("eventDesc");
	var eventCategory = document.getElementById("eventCategory");
	var hostName = "SPD";
	
	//Session
	var sessionID = document.getElementById("sessionID");
	var sessionStart = document.getElementById("sessionStart");
	var sessionEnd = document.getElementById("sessionEnd");
	var sessionDate = document.getElementById("eventDate");
	var maxPart = document.getElementById("maxPart");
	var volPart = document.getElementById("volPart");


	var firebaseRef = firebase.database().ref(); //object for the database

	//Create event
	var newPostRef = firebaseRef.child("events/"+x+"");
	newPostRef.set({
		//adding child value to event
		name: eventName.value,
		location: eventLocation.value,
		startDate: eventStartDate.value,
		endDate: eventEndDate.value,
		category: eventCategory.value,
		description: eventDesc.value,
		eventID: x,
		hostName: hostName
	});
	
	//Create sessions in event
	var test1 = newPostRef.child("sessions/"+sessionID.value+"");
	test1.set({
		//adding child value to sessions
		date: sessionDate.value,
		sessionID: sessionID.value,
		endTime: sessionStart.value,
		startTime: sessionEnd.value,
		volunteerMax: maxPart.value,
		volunteerNo: volPart.value
	});
	
	/*for(i=0; i<tableRow.length; i++){
		//Create sessions in event
		var test1 = newPostRef.child("sessions/"+i+"");
		test1.set({
			//adding child value to sessions
			date: sessionDate[i].value
		});
	}*/

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