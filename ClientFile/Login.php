
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Css / Javascript -->
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="js/main.js"></script>

	<title>Volunteer Scheduling Application</title>
</head>
<body>
	<div class="container">
		<div class="imageClassLogin">
			<img src="img/MatchIt_Logo.jpeg" alt="Match It"/>
		</div>
	</div>
	<!-- Login -->

<?php
session_start();

if (isset($_POST['volunemail'])){
        // removes backslashes

	$volunemail=$_POST['volunemail'];
    $volunpassword=$_POST['volunpassword'];
	
	$servername = "localhost";
	$username = "root";  //your user name for php my admin if in local most probaly it will be "root"
	$password = "";  //password probably it will be empty
	$databasename = "matchit"; //Your db nane
	// Create connection
	$conn = new mysqli($servername, $username, $password,$databasename);
	// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

	$volunemail = mysqli_real_escape_string($conn,$volunemail);
    $volunpassword = mysqli_real_escape_string($conn,$volunpassword);

 


    $query = "SELECT * FROM acc_volunteer WHERE email='$volunemail'
AND password='$volunpassword'";

	$result = mysqli_query($conn,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows == true){
	    //$_SESSION['volunemail'] = $volunemail;
	setcookie("volunemail", $volunemail, time()+7200);
    $_SESSION['volunemail'] = $volunemail;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (60 * 60 * 60);
    header("Location: Home.php");
    exit();
            // Redirect user to index.php
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='Login.php'>Login</a></div>";
	}
   }
?>
<form action ="" method="post" name="login">
	<div class="container">
		<!--<img src="img/MatchIt_Logo.jpeg" alt="Match It">-->
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<label for="username">Username</label>
			<br/>
			<input type="text" id="username" name="volunemail" placeholder="Username" required/>
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" id="password" name="volunpassword" placeholder="Password" required/>
			<br/>
			<button type="submit" id="signIn" name="submit">Sign In</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button type="button" data-toggle="modal" data-target="#myModalReg">Sign Up</button>
			<br/>
			<a href="#" data-toggle="modal" data-target="#myModal"><p class="small">Forgot your password?</p></a>
		</div>
	</div>
	</form>

	<!-- Modal for password-->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Forgot your password?</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<table>
						<tr>
							<td>Enter Email</td>
							<td>&nbsp;<input type="text" id="username"></td>
						</tr>
					</table></br>
					<button type="button" class="btn btn-primary" data-dismiss="modal" id="sendBtn">Send</button>
				</div>

			</div>

		</div>
	</div>

	<!-- Modal for registeration -->
	<div id="myModalReg" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Sign Up</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<table>
						<tr>
							<td>Name</td>
							<td>&nbsp;<input type="text" id="name"></td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>&nbsp;
								<label class="radio-inline"><input type="radio" name="optradio" id="male"> Male</label>&nbsp;
								<label class="radio-inline"><input type="radio" name="optradio" id="female"> Female</label>
							</td>
						</tr>
						<tr>
							<td>Age</td>
							<td>&nbsp;<input type="text" id="age"></td>
						</tr>
						<tr>
							<td>NRIC</td>
							<td>&nbsp;<input type="text" id="nric"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>&nbsp;<input type="text" id="email"></td>
						</tr>
					</table><br>
					<button type="button" class="btn btn-primary" id="signUpBtn" data-dismiss="modal" data-toggle="modal" data-target="#myModalSuccess">Sign Up</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal for success message -->
	<div id="myModalSuccess" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Sign Up Success</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<p>You have successfully register an account</p>
					<br>
					<button type="button" class="btn btn-primary" id="signUpBtn" data-dismiss="modal" onclick="Home.php">Close</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
