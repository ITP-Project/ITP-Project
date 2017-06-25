<?php

include '../dconfig.php';

	$result = $conn->query("SELECT * FROM created_event WHERE EID=$eventID");
	while($row = $result->fetch_assoc()){
		$eventID=$row['EID'];
	}

	for($i = 0; $i < count($_POST['sessionStart']); $i++)
	{
		$eventDate = mysqli_real_escape_string($conn, $_POST['eventDate'][$i]);
		$sessionStart = mysqli_real_escape_string($conn, $_POST['sessionStart'][$i]);
		$sessionEnd = mysqli_real_escape_string($conn, $_POST['sessionEnd'][$i]);
		$max_part = mysqli_real_escape_string($conn, $_POST['maxPart'][$i]);

		if (empty(trim($sessionStart))) continue;

		$sql = "INSERT INTO event_shift(EID, event_date, event_startTime, event_endTime, max_participation)
				VALUES('$eventID', '$eventDate', '$sessionStart', '$sessionEnd', '$max_part')";
		mysqli_query($conn, $sql);
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