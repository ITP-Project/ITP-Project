<?php
include '../dconfig.php';

if(isset($_POST["EID"]) && !empty($_POST["EID"])){
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
					<td>'.$rowEvent['participation_count'].'</td>
					<td>'.$rowEvent['max_participation'].'</td>
				</tr>';
        }
    }else{
        echo 'No session is available!';
    }
	
}

?>