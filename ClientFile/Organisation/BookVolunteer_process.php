<?php

//Use to insert into participation table
include_once '../dconfig.php';

	$sendNotification = function($uid,$eid){
		define( 'API_ACCESS_KEY', 'AAAA_38e_gQ:APA91bHQ-rkPOm9uf44R8TLHAiavK5ym7tqWZXdDBH2s1ZR8BZ7o6RYV-XUp9Q0YpSt5MT0HRZ_JygMvgxcuJPCoJbmYGM_81ecK8bfyTE2g2CSPsALgv5sn5T0M5Y0zCUqWHzU-AXtb' );

		$msg = array
		(
			'title'     => "Booking",
			'body'  => "You have been booked. Please confirm your participation",
			'sound'   => 'default',
			'badge'     => '1',
		);
    
    $data = array(
			'EID'  => $eid
		);

		$fields = array
		(
			'to'  => '/topics/'.$uid,
			'notification' => $msg,
      'data' => $data
		);
		 
		$headers = array
		(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
		);
		 
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
		//echo $result;
	};		
	
	$chk = $_POST['chk'];
	$chkcount = count($chk);
	
	if($chk){
		for($i=0; $i<$chkcount; $i++){
			$id = $chk[$i];
			$result=$conn->query("SELECT * 
								FROM 
									acc_volunteer 
								INNER JOIN
									volunteer_availability ON volunteer_availability.unique_id = acc_volunteer.unique_id
								INNER JOIN
									event_shift ON event_shift.event_date = volunteer_availability.start
								INNER JOIN
									created_event ON created_event.EID = event_shift.EID
								WHERE AID=".$id);
			while($row = $result->fetch_assoc()){
				$aid = $row['AID'];
				$uniqueID = $row['unique_id'];
				$eid = $row['EID'];
			}
			
			$sendNotification($uniqueID,$eid);
			
			echo $chkcount;
			echo '<script>alert("'.$chkcount.' Volunteer booked successfully!");
						window.location.href="CharityRegVolunteer.php";</script>';

		}
	} else {
		echo '<script>alert("Please select one checkbox!");
					window.location.href="CharityRegVolunteer.php";</script>';
	}

?>