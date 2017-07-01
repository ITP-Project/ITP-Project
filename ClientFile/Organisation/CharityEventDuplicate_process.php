<?php
	//define variables 
	$eventName = $eventLocation = $eventDesc = $eventStartDate = $eventEndDate = $eventDesc = $eventCategory = "";
	
	if (isset($_POST['duplicate']) && !empty($_POST['duplicate'])) {
		// get the form data
		$eventName = trim($_POST["eventName"]);
		$eventLocation = trim($_POST["eventLocation"]);
		$eventDesc = trim($_POST["eventDesc"]);
		$eventStartDate = trim($_POST["eventStartDate"]);
		$eventEndDate = trim($_POST["eventEndDate"]);
		$eventCategory = trim($_POST["eventCategory"]);
		
		// Perform insert queries
		$duplicate_rows = $conn->query("INSERT INTO created_event (event_name, event_desc, event_location, event_startDate, event_endDate, event_category) VALUES 
		('$eventName','$eventDesc','$eventLocation','$eventStartDate','$eventEndDate','$eventCategory')");
		
		if($duplicate_rows)
		{
			echo '<script>';
			echo 'alert("Event successfully duplicated!");';
			echo 'window.location.href="CharityEvent.php";';
			echo '</script>';
		}
		else{
			echo '<script>';
			echo 'alert("Event cannot be duplicated!");';
			echo 'window.location.href="CharityEvent.php";';
			echo '</script>';
			die('Error : ('. $conn->errno .') '. $conn->error);
		}
		
		include 'CharityEventDuplicateSession_process.php';
	}
?>