<?php
	//define variables 
	$eventName = $eventLocation = $eventDesc = $eventStartDate = $eventEndDate = $eventDesc = $eventCategory = "";
	
	if (isset($_POST['create']) && !empty($_POST['create'])) {
		// get the form data
		$eventName = trim($_POST["eventName"]);
		$eventLocation = trim($_POST["eventLocation"]);
		$eventDesc = trim($_POST["eventDesc"]);
		$eventStartDate = trim($_POST["eventStartDate"]);
		$eventEndDate = trim($_POST["eventEndDate"]);
		$eventCategory = trim($_POST["eventCategory"]);
		//$sessionStart = trim($_POST["sessionStart"]);
		
		// Perform insert queries
		$insert_rows = $conn->query("INSERT INTO created_event (event_name, event_desc, event_location, event_startDate, event_endDate, event_category) VALUES 
		('$eventName','$eventDesc','$eventLocation','$eventStartDate','$eventEndDate','$eventCategory')");
		
		if(!$insert_rows)
		{	
			echo '<script>';
			echo 'alert("Event already exist!");';
			echo 'window.location.href="CharityEvent.php";';
			echo '</script>';
			die('Error : ('. $conn->errno .') '. $conn->error);
		} else {
			echo '<script>';
			echo 'alert("Event Successfully created!");';
			echo 'window.location.href="CharityEventDisplayCreated.php";';
			echo '</script>';
		}
		
		include 'CharityEventCreateSession_process.php';
	}
?>