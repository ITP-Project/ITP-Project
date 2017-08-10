<?php
include '../dconfig.php';

$eventDate = '';

if(isset($_POST["event_date"]))
{
	$eventDate = trim($_POST['event_date']);
	//Get all state data
    $query = $conn->query("SELECT * 
							FROM 
								acc_volunteer
							INNER JOIN
								volunteer_availability ON acc_volunteer.unique_id = volunteer_availability.unique_id
							WHERE
								'$eventDate' BETWEEN DATE(volunteer_availability.start) AND DATE(volunteer_availability.end)");
    
    //Count total number of rows
    $row = $query->num_rows;
    
    //Display states list
    if($row > 0){
        while($row = $query->fetch_assoc()){
			$aid = $row['AID'];
			$uid = $row['unique_id'];
			echo '
				<tr>
					<td hidden><input type="text" value="'.$row["AID"].'"></td>
					<td hidden><input type="text" value="'.$uid.'"></td>
					<td>'.$row["name"].'</td>  
					<td>'.$row["email"].'</td>  
					<td>'.$row["nric"].'</td>  
					<td>'.$row["org_name"].'</td>  
					<td>'.$row["liason_contact"].'</td>
					<td><input type="checkbox" class="chk-box pull-left" name="chk[]" value="'.$row["AID"].'"></td>
				</tr>';
        }
    }else{
        echo 'No volunteer is available!';
    }
} 

?>