<?php
//Include database configuration file
include('../dconfig.php');

if(isset($_POST["EID"]) && !empty($_POST["EID"])){
	
    /*//Get all state data
    $query = $conn->query("SELECT * FROM event_shift WHERE EID = ".$_POST['EID']."");
	while($rowSession = $query->fetch_array()){
		$sidSession = $rowSession['SID'];
    }
	
	$querySession = $conn->query("SELECT * FROM participation WHERE SID = ".$sidSession."");
	while($rowPart = $querySession->fetch_array()){
		$uniqueID = $rowPart['unique_id'];
    }
	
	$queryPart = $conn->query("SELECT * FROM acc_volunteer WHERE unique_id = ".$uniqueID."");*/
	
	//need do inner join to retrieve from 3 tables
	$queryTest = $conn->query("SELECT event_shift.*, participation.*, acc_volunteer.* FROM event_shift JOIN participation 
	WHERE EID = ".$_POST['EID']." AND event_shift.SID = participation.SID");
    
    //Count total number of rows
    $row = $queryTest->num_rows;
    
    //Display states list
    if($row > 0){
        //echo '<option value="">Select Session</option>';
        while($row = $queryTest->fetch_array()){
			$aid = $row['AID'];
			echo '
				<tr>
					<td><input type="text" value="'.$aid.'"></td>
					<td>'.$row['name'].'</td>
					<td>'.$row['nric'].'</td>
					<td>'.$row['email'].'</td>
					<td><input type="checkbox" name="chkEvent[]" value="'.$aid.'"></td>
				</tr>';
        }
    }else{
        echo '<option value="">Session not available</option>';
    }
	
}

?>