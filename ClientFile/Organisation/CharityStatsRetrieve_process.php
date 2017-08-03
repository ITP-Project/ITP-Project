<?php
//Include database configuration file
include('../dconfig.php');
session_start();

$eventCategory = '';
if(isset($_POST["event_category"])){
    //Get all state data
	$eventCategory = trim($_POST["event_category"]);
    $eventHost = $_SESSION['ADMIN_UEN']; 

    if($query = $conn->query("SELECT av.name, SUM(((es.event_endTime - es.event_startTime)/100)) AS 'total Time' FROM participation p, acc_volunteer av, event_shift es, created_event ce WHERE p.unique_id = av.unique_id AND p.SID = es.SID AND p.status = 'registered' AND ce.EID = es.EID AND ce.event_category = '$eventCategory' AND ce.host = '$eventHost'"))
    {
            //Count total number of rows
        $rowCount = $query->num_rows;
        $count = 1;
    //Display states list
        if($rowCount > 0){
        //echo '<option value="">Select Session</option>';
            while($rowEvent = $query->fetch_array()){
                echo '
                <tr>
                    <td>'.$count++.'</td>
                    <td>'.$rowEvent['name'].'</td>
                    <td>'.$rowEvent['total Time'].'</td>
                </tr>';
            }
        }
    }
    
    else{
        echo 'No volunteer is available!';
    }
}

?>