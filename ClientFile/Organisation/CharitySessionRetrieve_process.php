<?php
//Include database configuration file
include('../dconfig.php');

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
					<td>'.$rowEvent['event_startTime'].'</td>
					<td>'.$rowEvent['event_endTime'].'</td>
					<td><input type="checkbox" name="chkEvent[]" value="'.$sid.'"></td>
				</tr>';
        }
    }else{
        echo '<option value="">Session not available</option>';
    }
}

?>