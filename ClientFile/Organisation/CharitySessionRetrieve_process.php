<?php
if(isset($_POST["action"]))
{
	//Include database configuration file
	include('../dconfig.php');
	$output = '';
	if($_POST["action"] == "eventSelect")
	{
		$query = "SELECT * FROM event_shift WHERE EID = '".$_POST["query"]."'";
		$result = mysqli_query($conn, $query);
		$output .= '<option value="">Select Session</option>';
		while($row = mysqli_fetch_array($result))
		{
			$sid = $row['SID'];
			$output .= '<option value="'.$row["SID"].'">'.$row["event_date"].'</option>';
		}
	}
	echo $output;
}

/*if(isset($_POST["EID"]) && !empty($_POST["EID"])){
    //Get all state data
    $query = $conn->query("SELECT * FROM event_shift WHERE EID = ".$_POST['EID']."");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        //echo '<option value="">Select Session</option>';
        while($rowEvent = $query->fetch_array()){
			$sid = $rowEvent['SID'];
			echo '
				<tr>
					<td>'.$rowEvent['event_date'].'</td>
					<td>'.$rowEvent['max_participation'].'</td>
					<td>'.$rowEvent['participation_count'].'</td>
				</tr>';
        }
    }else{
        echo 'No volunteer is available!';
    }
	
	//include 'RetrieveVolunteer.php';
}*/

?>