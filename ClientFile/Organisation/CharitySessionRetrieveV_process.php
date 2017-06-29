<?php
//Include database configuration file
include('../dconfig.php');

if(isset($_POST["EID"]) && !empty($_POST["EID"])){
	
    //Get all state data
	$queryTest = $conn->query("SELECT AID, name, nric, email
							FROM
								event_shift
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
					<td hidden><input type="text" value="'.$aid.'"></td>
					<td>'.$row['name'].'</td>
					<td>'.$row['nric'].'</td>
					<td>'.$row['email'].'</td>
				</tr>';
        }
    }else{
        echo '<option value="">Session not available</option>';
    }
	
}

?>