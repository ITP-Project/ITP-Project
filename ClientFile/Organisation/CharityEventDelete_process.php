<?php
	include '../dconfig.php';

	// check if the 'id' variable is set in URL, and check that it is valid
	/*if (isset($_GET['id']) && is_numeric($_GET['id']))
	{
		// get id value
		$id = $_GET['id'];
		
		foreach($_POST["id"] as $id){
			// delete the entry
			$result = mysqli_query($conn, "DELETE FROM created_event WHERE EID=$id")
			or die(mysql_error());
			
			// redirect back to the view page
			header("Location: CharityEvent.php");
		} 
	}
	else
	// if id isn't set, or isn't valid, redirect back to view page
	{
	header("Location: CharityEvent.php");
	}*/
	
	if(isset($_POST["id"]))
	{
		foreach($_POST["id"] as $id)
		{
		  $query = "DELETE FROM created_event WHERE EID=$id";
		  mysqli_query($conn, $query);
		}
	}
?>