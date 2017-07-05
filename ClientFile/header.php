<html>
<head>
	<?php 				
	session_start();
	if(!isset($_SESSION['USERNAME']))
	{
		header("Location: ../Login.php");
	}
	else
	{
		$eventAdmin = $_SESSION['USERNAME'];

	}
	?>
	<title>Volunteer Scheduling Application</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Css / Javascript -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
	<!--<link rel="stylesheet" href="../bootstrap-3.3.7/dist/css/bootstrap.min.css">
	<script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>-->

	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>-->

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
	<script src="../js/main.js"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<style>
		body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
	</style>
</head>
</html>