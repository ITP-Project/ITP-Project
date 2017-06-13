<?php
	$eventHostErr = null;
	$eventNameErr = null;
	$eventLocationErr = null;
	$eventDescErr = null;
	$eventDateErr = null;
	$sessionOneErr = null;
	$sessionTwoErr = null;
	$max_participantErr = null;
	
	if (isset($_POST['create']) && !empty($_POST['create'])) {
		$errMsg="";
		$eventHost = trim($_POST['eventHost']);
		$eventName = trim($_POST['eventName']);
		$eventLocation = trim($_POST['eventLocation']);
		$eventDesc = trim($_POST['eventDesc']);
		$eventDate = trim($_POST['eventDate']);
		$sessionOne = trim($_POST['sessionOne']);
		$sessionTwo = trim($_POST['sessionTwo']);
		$max_participants = trim($_POST['max_participants']);
		
		if (empty($eventHost)) {
			$eventHostErr = 'Event host required';
			$errMsg="Please fill in the blanks!";
			$error=true;
		}
		if (empty($eventName)) {
			$eventNameErr = 'Event name required';
			$errMsg="Please fill in the blanks!";
			$error=true;
		}
		if (empty($eventLocation)) {
			$eventLocationErr = 'Enter your location';
			$errMsg="Please fill in the blanks!";
			$error=true;
		}

		if (empty($eventDesc)) {
			$eventDescErr = 'Enter your event description';
			$errMsg="Please fill in the blanks!";
			$error=true;
		}
		if (empty($eventDate)) {
			$eventDateErr = 'Enter your date';
			$errMsg="Please fill in the blanks!";
			$error=true;
		}
		if (empty($sessionOne)) {
			$sessionOneErr = 'Choose your session dates';
			$error=true;
		}
		if (empty($max_participants)) {
			$max_participantErr = 'Enter max number of participants';
			$errMsg="Please fill in the blanks!";
			$error=true;
		}
		else{
			$eventHost = trim($_POST['eventHost']);
			$eventName = trim($_POST['eventName']);
			$eventLocation = trim($_POST['eventLocation']);
			$eventDesc = trim($_POST['eventDesc']);
			$sessionOne = trim($_POST['sessionOne']);
			$sessionTwo = trim($_POST['sessionTwo']);
			$max_participants = trim($_POST['max_participants']);
			$sqli="INSERT INTO created_event(host, event_name, event_date, max_participants, event_desc, event_location) VALUES ('$eventHost', '$eventName', $eventDate, '$max_participants', '$eventDesc'
			, '$eventLocation')";
			if (mysql_query($sqli)) {
				echo '<script>';
				echo 'alert("Event successfully created!");';
				echo 'window.location.href="CharityEvent.php";';
				echo '</script>';
			} else {
				echo "Error: " . $sqli . "<br>" . mysql_error($con);
			}
			
			include 'upload.php';
		}
	}
?>