<?php
	$eventNameErr = null;
	$eventLocationErr = null;
	$eventDescErr = null;
	$sessionOneErr = null;
	$sessionTwoErr = null;
	$volunteerNumErr = null;
	
	if (isset($_POST['update']) && !empty($_POST['update'])) {
		$errMsg="";
		$eventID = trim($_POST['eID']);
		$eventName = trim($_POST['eventName']);
		$eventLocation = trim($_POST['eventLocation']);
		$eventDesc = trim($_POST['eventDesc']);
		$sessionOne = trim($_POST['sessionOne']);
		$sessionTwo = trim($_POST['sessionTwo']);
		$volunteerNum = trim($_POST['volunteerNum']);

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
		if (empty($sessionOne)) {
			$sessionOneErr = 'Choose your session dates';
			$error=true;
		}
		if (empty($volunteerNum)) {
			$volunteerNumErr = 'Enter number of volunteers';
			$errMsg="Please fill in the blanks!";
			$error=true;
		}
		else{
			$eventName = trim($_POST['eventName']);
			$eventLocation = trim($_POST['eventLocation']);
			$eventDesc = trim($_POST['eventDesc']);
			$sessionOne = trim($_POST['sessionOne']);
			$sessionTwo = trim($_POST['sessionTwo']);
			$volunteerNum = trim($_POST['volunteerNum']);
			$sqli="UPDATE event set eventName='$eventName', eventLocation='$eventLocation', eventSession1='$sessionOne', eventSession2='$sessionTwo'
				, volNum=$volunteerNum, eventDesc='$eventDesc' WHERE eventID='$eventID'";
			if (mysql_query($sqli)) {
				echo '<script>';
				echo 'alert("Event successfully updated!");';
				echo 'window.location.href="CharityEvent.php";';
				echo '</script>';
			} else {
				echo "Error: " . $sqli . "<br>" . mysql_error($con);
			}
			
			include 'upload.php';
		}
	}
?>