<?php

//Only use to get the session id according to the checkbox
include_once '../dconfig.php';
include_once 'CharitySessionRetrieve_process.php';
	
	$chkE = $_POST['chkEvent'];
	$chkcountE = count($chkE);
	
	for($x=0; $x<$chkcountE; $x++){
		$sid = $chkE[$x];
		
		$result=$conn->query("SELECT * FROM event_shift WHERE SID=".$sid);
		while($row = $result->fetch_assoc()){
			$sessionSid = $row['SID'];
		}
	}

?>