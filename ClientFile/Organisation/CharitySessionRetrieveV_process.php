<?php
//Include database configuration file
include('../dconfig.php');

if(isset($_POST["EID"]) && !empty($_POST["EID"])){
	
    //Get all state data
	$queryTest = $conn->query("SELECT AID, name, nric, email, nric, email, org_name, uen, nationality, liason_contact, event_name
							FROM
								event_shift
							INNER JOIN
								created_event ON event_shift.EID = created_event.EID
							INNER JOIN
								participation ON event_shift.SID = participation.SID
							INNER JOIN
								acc_volunteer ON acc_volunteer.unique_id = participation.unique_id
							WHERE
								event_shift.EID = ".$_POST['EID']."");
    
    //Count total number of rows
    $row = $queryTest->num_rows;
    
    //Display states list
    if($row > 0){
        while($row = $queryTest->fetch_array()){
			$aid = $row['AID'];
			echo '
				<tr>
					<td>'.$row["name"].'</td>  
					<td>'.$row["email"].'</td>  
					<td>'.$row["nric"].'</td>  
					<td>'.$row["org_name"].'</td>  
					<td>'.$row["uen"].'</td>
					<td>'.$row["nationality"].'</td>
					<td>'.$row["liason_contact"].'</td>
				</tr>';
        }
    }else{
        echo '<option value="">Session not available</option>';
    }
	
}

?>