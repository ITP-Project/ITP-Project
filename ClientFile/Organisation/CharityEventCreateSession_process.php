<?php

include '../dconfig.php';
$result = $conn->query("SELECT * FROM created_event ORDER BY EID ASC");
while($row = $result->fetch_assoc()){
	$eventID=$row['EID'];
}

function check_time($time) {
	if(strtotime($time)) {
		return "TRUE";
	} else {
		return "FALSE";
	}
}

for($i = 0; $i < count($_POST['sessionStart']); $i++)
{
	$eventDate = mysqli_real_escape_string($conn, $_POST['eventDate'][$i]);
	$sessionStart = mysqli_real_escape_string($conn, $_POST['sessionStart'][$i]);
	$sessionEnd = mysqli_real_escape_string($conn, $_POST['sessionEnd'][$i]);
	$max_part = mysqli_real_escape_string($conn, $_POST['maxPart'][$i]);
	$part_count = mysqli_real_escape_string($conn, $_POST['partCount'][$i]);

	if($eventStartDate >= $currentDate)
	{
		if(validateDate($eventStartDate, $eventEndDate) == TRUE)
		{
			if($eventDate < $eventStartDate)
			{
				$Smsg = check_time($sessionStart);
				if (empty(trim($sessionStart))) continue;

				$sql = "INSERT INTO event_shift(EID, event_date, event_startTime, event_endTime, max_participation, participation_count)
				VALUES('$eventID', '$eventDate', '$sessionStart', '$sessionEnd', '$max_part', '$part_count')";
				mysqli_query($conn, $sql);


			}


		}

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