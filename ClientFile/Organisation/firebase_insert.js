//write to database
function submitClick(){
	//get the html element
	var eventID = document.getElementById("eventID").value;
	var eventName = document.getElementById("eventName");
	var eventLocation = document.getElementById("eventLocation");
	var eventStartDate = document.getElementById("eventStartDate");
	var eventEndDate = document.getElementById("eventEndDate");
	var eventDesc = document.getElementById("eventDesc");
	var eventCategory = document.getElementById("eventCategory");
	var hostName = "SPD";

	var firebaseRef = firebase.database().ref(); //object for the database

	//Create event
	var eventCreate = firebaseRef.child("events/"+eventID+"");
	eventCreate.set({
		//adding child value to event
		name: eventName.value,
		location: eventLocation.value,
		startDate: eventStartDate.value,
		endDate: eventEndDate.value,
		category: eventCategory.value,
		description: eventDesc.value,
		eventID: eventID,
		hostName: hostName
	});
	
	$("tr#rowID").each(function(){
		//get session elements
		var sessionID = $(this).find("input#sessionID").val();
		var sessionStart = $(this).find("input#sessionStart").val();
		var sessionEnd = $(this).find("input#sessionEnd").val();
		var sessionDate = $(this).find("input#eventDate").val();
		var maxPart = $(this).find("input#maxPart").val();
		var volPart = $(this).find("input#volPart").val();

		//Create sessions in event
		var sessionCreate = eventCreate.child("sessions/"+sessionID+"");
		sessionCreate.set({
			//adding child value to sessions
			date: sessionDate,
			sessionID: sessionID,
			endTime: sessionEnd,
			startTime: sessionStart,
			volunteerMax: maxPart,
			volunteerNo: volPart
		});
	});
	
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