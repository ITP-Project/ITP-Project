<?php
	include '../dconfig.php';

	// check if the 'id' variable is set in URL, and check that it is valid
	if ((isset($_GET['sid'], $_GET['id'])) && is_numeric($_GET['sid']))
	{
	// get id value
	$sid = $_GET['sid'];
	$id = $_GET['id'];
	 
	// delete the entry
	$result = mysqli_query($conn, "DELETE FROM event_shift WHERE SID=$sid")
	or die(mysql_error());
	
	header("Location:CharityEventUpdate.php?id=$id");
	}
	else
	// if id isn't set, or isn't valid, redirect back to view page
	{
	header("Location:CharityEventUpdate.php?id=$id");
	}
?>