<?php
if(isset($_POST["action"]))
{
	//Include database configuration file
	include('../dconfig.php');
	$output = '';
	if($_POST["action"] == "eventSelect")
	{
		$query = "SELECT * FROM event_shift WHERE EID = '".$_POST["query"]."'";
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