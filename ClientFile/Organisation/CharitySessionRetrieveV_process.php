<?php
//Include database configuration file
include('../dconfig.php');

if(isset($_POST["SID"])){
	
    //Get all state data
	$queryTest = $conn->query("SELECT AID, name, email, nric, org_name, uen, nationality, liason_contact
							FROM
								event_shift
							INNER JOIN
								created_event ON event_shift.EID = created_event.EID
							INNER JOIN
								participation ON event_shift.SID = participation.SID
							INNER JOIN
								acc_volunteer ON acc_volunteer.unique_id = participation.unique_id
							INNER JOIN
								volunteer_availability ON volunteer_availability.unique_id = acc_volunteer.unique_id
							WHERE
								event_shift.SID = ".$_POST['SID']."");
    
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
        echo 'No volunteer is available!';
    }
	
}

?>