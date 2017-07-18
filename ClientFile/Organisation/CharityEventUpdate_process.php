<?php
	//define variables 
$eventName = $eventLocation = $eventDesc = $eventStartDate = $eventEndDate = $eventDesc = $eventCategory = $msg = $Smsg  = "";

if (isset($_POST['update']) && !empty($_POST['update'])) {
		// get the form data
	$eventID = trim($_POST["eventID"]);
	$eventName = trim($_POST["eventName"]);
	$eventLocation = trim($_POST["eventLocation"]);
	$eventDesc = trim($_POST["eventDesc"]);
	$eventStartDate = trim($_POST["eventStartDate"]);
	$eventEndDate = trim($_POST["eventEndDate"]);
	$eventCategory = trim($_POST["eventCategory"]);


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
			$update_rows = $conn->query("UPDATE created_event SET event_name='$eventName', event_location='$eventLocation', event_desc='$eventDesc',
				event_startDate='$eventStartDate', event_endDate='$eventEndDate', event_category='$eventCategory' WHERE EID='$eventID'");

			if((count($_POST['sessionStart'])) == 0)
			{
				echo '<script>';
				echo 'alert("Event successfully updated!");';
				echo 'window.location.href="CharityEventDisplayCreated.php?id='.$eventID.'";';
				echo '</script>';
			}

			if(!$update_rows){
				echo '<script>';
				echo 'alert("Event cannot be updated!");';
				echo 'window.location.href="CharityEvent.php";';
				echo '</script>';
				die('Error : ('. $conn->errno .') '. $conn->error);
			}
		}
		else
		{
			echo '<script>
				alert("PLease enter a valid Start and End Date");
				window.location.href="CharityEventUpdate.php?id='.$eventID.'";
				</script>';
			//$msg = "PLease enter a valid Start and End Date";
		}
	}
	else 
	{
		echo '<script>
				alert("Please enter a valid Date");
				window.location.href="CharityEventUpdate.php?id='.$eventID.'";
				</script>';
		//$msg = "Please enter a valid Date"; 
	}



	include 'CharityEventUpdateSession_process.php';
}
?>