<?php

//Use to insert into participation table
include_once '../dconfig.php';
include_once 'BookSession_process.php';
	
	$chk = $_POST['chk'];
	$chkcount = count($chk);
	
	for($i=0; $i<$chkcount; $i++){
		$id = $chk[$i];
		$result=$conn->query("SELECT * FROM acc_volunteer WHERE AID=".$id);
		while($row = $result->fetch_assoc()){
			$aid = $row['AID'];
			$uniqueID = $row['unique_id'];
		}
		
		$status = "registered";
		$insert = $conn->query("INSERT INTO participation (sid, unique_id, status) VALUES ('$sid', '$uniqueID', '$status')");
	
		if($insert){
			echo '<script>';
			echo 'alert("Volunteer added successfully!");';
			echo 'window.location.href="CharityRegVolunteer.php";';
			echo '</script>';
		} else {
			echo '<script>';
			echo 'alert("Duplicate volunteer in one session!");';
			echo 'window.location.href="CharityRegVolunteer.php";';
			echo '</script>';
			die('Error : ('. $conn->errno .') '. $conn->error);
		}
	}

?>