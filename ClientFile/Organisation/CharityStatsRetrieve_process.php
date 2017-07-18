<?php
//Include database configuration file
include('../dconfig.php');

$eventCategory = '';

if(isset($_POST["event_category"])){
    //Get all state data
	$eventCategory = trim($_POST["event_category"]);





    if($query = $conn->query("SELECT av.name, SUM(((es.event_endTime - es.event_startTime)/100)) AS 'total Time' FROM participation p, acc_volunteer av, event_shift es, created_event ce WHERE p.unique_id = av.unique_id AND p.SID = es.SID AND p.status = 'registered' AND ce.EID = es.EID AND es.event_category = '$eventCategory'"))
    {
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
        }
    }
    
    else{
        echo 'No volunteer is available!';
    }
}

?>