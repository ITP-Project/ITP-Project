<?php

include '../dconfig.php';

$result = $conn->query("SELECT * FROM created_event WHERE EID=$eventID");
while($row = $result->fetch_assoc()){
	$eventID=$row['EID'];
}

function check_time($startTime, $endTime) {
	if(strtotime($startTime) < strtotime($endTime)) {
		return TRUE;
	} else {
		return FALSE;
	}
}
$insertCounter = 0; 
for($i = 0; $i < count($_POST['sessionStart']); $i++)
{
	$eventDate = mysqli_real_escape_string($conn, $_POST['eventDate'][$i]);
	$sessionStart = mysqli_real_escape_string($conn, $_POST['sessionStart'][$i]);
	$sessionEnd = mysqli_real_escape_string($conn, $_POST['sessionEnd'][$i]);
	$max_part = mysqli_real_escape_string($conn, $_POST['maxPart'][$i]);
	$vol_part = mysqli_real_escape_string($conn, $_POST['volPart'][$i]);


	if(($eventDate >= $eventStartDate) AND ($eventDate <= $eventEndDate))
	{
		if(check_time($sessionStart,$sessionEnd) )
		{

			if (empty(trim($sessionStart))) continue;

			$sql = "INSERT INTO event_shift(EID, event_date, event_startTime, event_endTime, max_participation, participation_count)
			VALUES('$eventID', '$eventDate', '$sessionStart', '$sessionEnd', '$max_part', '$vol_part')";
			mysqli_query($conn, $sql);

			if($sql)
			{
				$insertCounter ++;
				if($insertCounter == count($_POST['sessionStart']))
				{
					echo '<script>';
					echo 'alert("Event successfully updated!");';
					echo 'window.location.href="CharityEventDisplayCreated.php?id='.$eventID.'";';
					echo '</script>';
				}
			}

		}
		else
		{
			echo '<script>
				alert("Please enter a valid Start and End Time");
				window.location.href="CharityEventUpdate.php?id='.$eventID.'";
				</script>';
			//$Smsg = "Please enter a valid Start and End Time";
		}
	}
	else
	{
		echo '<script>
				alert("Please enter a session date within the Range");
				window.location.href="CharityEventUpdate.php?id='.$eventID.'";
				</script>';
		//$Smsg = "Please enter a session date within the Range";
	}


}

if(mysqli_error($conn))
{
	echo "Data base error occured";
}
else
{
	echo $i . " rows added";
}
?>