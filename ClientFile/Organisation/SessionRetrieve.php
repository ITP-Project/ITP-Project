<?php
include_once '../dconfig.php';

if(isset($_POST["sAction"]))
{
	//Include database configuration file
	include('../dconfig.php');
	$output = '';
	if($_POST["sAction"] == "eExport")
	{
		$query = "SELECT * FROM event_shift WHERE EID = '".$_POST["squery"]."'";
		$result = mysqli_query($conn, $query);
		$output .= '<option value="">Select Session</option>';
		while($row = mysqli_fetch_array($result))
		{
			$sid = $row['SID'];
			$output .= '<option value="'.$row["SID"].'">'.$row["event_date"].'</option>';
		}
	}
	echo $output;
}

?>