<?php
	//define variables 
$eventName = $eventLocation = $eventDesc = $eventStartDate = $eventEndDate = $eventDesc = $eventCategory = "";
$msg = $Smsg = "";
if (isset($_POST['duplicate']) && !empty($_POST['duplicate'])) {
		// get the form data
	$eventID = trim($_POST["eventID"]);
	$eventName = trim($_POST["eventName"]);
	$eventLocation = trim($_POST["eventLocation"]);
	$eventDesc = trim($_POST["eventDesc"]);
	$eventStartDate = trim($_POST["eventStartDate"]);
	$eventEndDate = trim($_POST["eventEndDate"]);
	$eventCategory = trim($_POST["eventCategory"]);
		//$sessionStart = trim($_POST["sessionStart"]);
	$currentDate = date("Y-m-d" , time() + 259200);

	function validateDate($start, $end){
		if($end < $start)
		{
			return FALSE;
		}
		else
		{
			return TRUE; 
		}
	}

	if($eventStartDate >= $currentDate)
	{
		if(validateDate($eventStartDate, $eventEndDate) == TRUE)
		{
			// Perform insert queries
			$insert_rows = $conn->query("INSERT INTO created_event (event_name, event_desc, event_location, event_startDate, event_endDate, event_category, created_by) VALUES 
				('$eventName','$eventDesc','$eventLocation','$eventStartDate','$eventEndDate','$eventCategory', '$eventUSERNAME')");

			if(!$insert_rows)	
			{	
				echo '<script>';
				echo 'alert("Event already exist!");';
				echo 'window.location.href="CharityEvent.php";';
				echo '</script>';
				die('Error : ('. $conn->errno .') '. $conn->error);
			} 
		}
		else
		{
			echo '<script>
				alert("Please enter a valid Start and End Time");
				window.location.href="CharityEventDuplicate.php?id='.$eventID.'";
				</script>';
			//header("Location:CharityEventDuplicate.php?id=$eventID");
			//$msg = "PLease enter a valid Start and End Date";
		}
	}
	else 
	{
		echo '<script>
				alert("Please enter a valid Date");
				window.location.href="CharityEventDuplicate.php?id='.$eventID.'";
				</script>';
		//echo "<script>alert('Please enter a valid Date');</script>";
		//header("Location:CharityEventDuplicate.php?id=$eventID");
		//$msg = "Please enter a valid Date";		
	}


	include 'CharityEventDuplicateSession_process.php';


}
?>