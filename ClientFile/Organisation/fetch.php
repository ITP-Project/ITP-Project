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
        while($row = $query->fetch_assoc()){ 
            //echo '<option value="'.$row['SID'].'">'.$row['event_date'].'</option>';
			
			echo '
				<tr>
					<td hidden>'.$row['SID'].'</td>
					<td>'.$row['event_date'].'</td>
					<td>'.$row['event_startTime'].'</td>
					<td>'.$row['event_endTime'].'</td>
					<td><input type="checkbox" name="chk[]"></td>
				</tr>';
        }
    }else{
        echo '<option value="">Session not available</option>';
    }
}

/*if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    //Get all city data
    $query = $conn->query("SELECT * FROM cities WHERE state_id = ".$_POST['state_id']." AND status = 1 ORDER BY city_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Select city</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}*/
?>