<?php
include '../dconfig.php';

if(isset($_POST["SID"]))
{
	//Get all state data
    $query = $conn->query("SELECT *
							FROM
								acc_volunteer
							INNER JOIN
								volunteer_availability ON volunteer_availability.unique_id = acc_volunteer.unique_id
							INNER JOIN
								event_shift ON event_shift.event_date = volunteer_availability.start
							WHERE
								event_shift.SID = ".$_POST['SID']." AND event_shift.event_date BETWEEN volunteer_availability.start AND volunteer_availability.end");
    
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
					<td>'.$row["uen"].'</td>
					<td>'.$row["nationality"].'</td>
					<td>'.$row["liason_contact"].'</td>
					<td><input type="checkbox" class="chk-box pull-left" name="chk[]" value="'.$row["AID"].'"></td>
				</tr>';
        }
    }else{
        echo 'No volunteer is available!';
    }
} 

?>