<?php
//Include database configuration file
include('../dconfig.php');

$eventCategory = '';

if(isset($_POST["event_category"])){
    //Get all state data
	$eventCategory = trim($_POST["event_category"]);
    $query = $conn->query("SELECT * FROM created_event WHERE event_category='$eventCategory'");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        //echo '<option value="">Select Session</option>';
        while($rowEvent = $query->fetch_array()){
			$sid = $rowEvent['EID'];
			echo '
				<tr>
					<td>'.$rowEvent['EID'].'</td>
					<td>'.$rowEvent['event_name'].'</td>
					<td>'.$rowEvent['event_category'].'</td>
				</tr>';
        }
    }else{
        echo 'No volunteer is available!';
    }
}

?>