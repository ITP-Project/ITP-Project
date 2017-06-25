<?php
	//define variables 
	$eventName = $eventLocation = $eventDesc = $eventStartDate = $eventEndDate = $eventDesc = $eventCategory = "";
	
	if (isset($_POST['update']) && !empty($_POST['update'])) {
		// get the form data
		$eventID = trim($_POST["eventID"]);
		$eventName = trim($_POST["eventName"]);
		$eventLocation = trim($_POST["eventLocation"]);
		$eventDesc = trim($_POST["eventDesc"]);
		$eventStartDate = trim($_POST["eventStartDate"]);
		$eventEndDate = trim($_POST["eventEndDate"]);
		$eventCategory = trim($_POST["eventCategory"]);
		
		// Perform insert queries
		$update_rows = $conn->query("UPDATE created_event SET event_name='$eventName', event_location='$eventLocation', event_desc='$eventDesc',
										event_startDate='$eventStartDate', event_endDate='$eventEndDate', event_category='$eventCategory' WHERE EID='$eventID'");
		
		if($update_rows)
		{
			echo '<script>';
			echo 'alert("Event successfully updated!");';
			echo 'window.location.href="CharityEvent.php";';
			echo '</script>';
		}
		else{
			echo '<script>';
			echo 'alert("Event cannot be updated!");';
			echo 'window.location.href="CharityEvent.php";';
			echo '</script>';
			die('Error : ('. $conn->errno .') '. $conn->error);
		}
		
		include 'CharityEventUpdateSession_process.php';
	}
?>