<?php

//Only use to get the session id according to the checkbox
include_once '../dconfig.php';
include_once 'CharitySessionRetrieve_process.php';
	
	$chkE = $_POST['chkEvent'];
	$chkcountE = count($chkE);
	
	for($i=0; $i<$chkcountE; $i++){
		$id = $chkE[$i];
		$result=$conn->query("SELECT * FROM event_shift WHERE SID=".$id);
		while($row = $result->fetch_assoc()){
			$sid = $row['SID'];
		}
	}

?>