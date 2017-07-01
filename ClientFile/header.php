<html>
<head>
<?php 				
session_start();
if(!isset($_SESSION['USERNAME']))
{
	header("Location: Login.php");
}
?>
	<title>Volunteer Scheduling Application</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
	<!-- Css / Javascript -->
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">

<!-- <link rel="stylesheet" href="bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="../bootstrap-3.3.7/dist/css/bootstrap.min.css">


	<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
		<script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

	<!-- <script src="bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js"></script> -->


	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
	<script src="../js/main.js"></script>
	<script src="../js/org_js.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
	<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
	
	<script src="https://www.gstatic.com/firebasejs/4.1.2/firebase.js"></script>
	<script>
	  // Initialize Firebase
	  // TODO: Replace with your project's customized code snippet
	  var config = {
		apiKey: "AIzaSyBoSpzhFZLwPubJ6lgYjH50cEitXiMEXvU ",
		authDomain: "matchit-e3c39.firebaseapp.com",
		databaseURL: "https://matchit-e3c39.firebaseio.com",
		storageBucket: "gs://matchit-e3c39.appspot.com",
		messagingSenderId: "<SENDER_ID>",
	  };
	  firebase.initializeApp(config);
	</script>

	
	<style>
	body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
	</style>
</head>
</html>