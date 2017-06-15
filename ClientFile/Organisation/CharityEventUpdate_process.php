<?php
	$eventNameErr = null;
	$eventLocationErr = null;
	$eventDescErr = null;
	$eventDateErr = null;
	$max_participantErr = null;
	
	if (isset($_POST['update']) && !empty($_POST['update'])) {
		$errMsg="";
		$eventID = trim($_POST['EID']);
		$eventName = trim($_POST['eventName']);
		$eventLocation = trim($_POST['eventLocation']);
		$eventDesc = trim($_POST['eventDesc']);
		$eventDate = trim($_POST['eventDate']);
		$max_participants = trim($_POST['max_participants']);

		if (empty($eventName)) {
			$eventNameErr = 'Event name required';
			$errMsg="Please fill in the blanks!";
			$error=true;
		}
		if (empty($eventLocation)) {
			$eventLocationErr = 'Event location required';
			$errMsg="Please fill in the blanks!";
			$error=true;
		}

		if (empty($eventDesc)) {
			$eventDescErr = 'Event description required';
			$errMsg="Please fill in the blanks!";
			$error=true;
		}
		if (empty($eventDate)) {
			$eventDateErr = 'Event date required';
			$errMsg="Please fill in the blanks!";
			$error=true;
		}
		if (empty($max_participants)) {
			$max_participantErr = 'Max number of participants required';
			$errMsg="Please fill in the blanks!";
			$error=true;
		}
		else{
			$eventName = trim($_POST['eventName']);
			$eventLocation = trim($_POST['eventLocation']);
			$eventDesc = trim($_POST['eventDesc']);
			$eventDate = trim($_POST['eventDate']);
			$max_participants = trim($_POST['max_participants']);
			$sqli="UPDATE created_event set event_name='$eventName', event_location='$eventLocation'
				, max_participants=$max_participants, event_desc='$eventDesc', event_date='$eventDate' WHERE EID='$eventID'";
			if (mysql_query($sqli)) {
				echo '<script>';
				echo 'alert("Event successfully updated!");';
				echo 'window.location.href="CharityEvent.php";';
				echo '</script>';
			} else {
				echo "Error: " . $sqli . "<br>" . mysql_error($con);
			}
			
		}
	}
?>