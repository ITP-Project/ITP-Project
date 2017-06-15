
<?php
include_once 'dconfig.php';

?>

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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
	<script src="js/main.js"></script>

	<title>Volunteer Scheduling Application</title>
</head>
<body>
	<div class="container">
		<div class="imageClassLogin">
			<img src="images/MatchIt_Logo.jpeg" alt="Match It"/>
		</div>
	</div>
	<!-- Login -->

	<?php
	//start sessoin 
	session_start();

	//define variables 
	$adminUsername = $adminPass = $error = ""; 
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$adminUsername = test_input($_POST["adminUsername"]);
		$adminPass = test_input($_POST["adminPass"]); 
		$admin_encryptedPass = sha1($adminPass);

		$sql = "SELECT AID FROM acc_organization WHERE email = '$adminUsername' AND encrypted_password = '$admin_encryptedPass'"; 

		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
		$active = $row['active']; 

		$count = mysqli_num_rows($result); 

		if($count == 1)
		{
			$_SESSION['USERNAME'] = $adminUsername; 
			header("location: Organisation/CharityHome.php");
		} 
		else{
			$error = "Invalid Username and Password";
		}

	}


//method to test the input
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


	?>
	<form action ="" method="post" role="form" data-toggle= "validator" name="login" >
		<div class="container">
			<div class="login-box animated fadeInUp">
				<div class="box-header">
					<h2>Log In</h2>
				</div>
				<div class="row">
					<div class="col-sm-12 form-group">
						<label for="username">Username</label>
						<input type="text" id="username" name="adminUsername" placeholder="Enter your Username" required/>
						<div class="help-block with-errors"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 form-group">
						<label for="password">Password</label>
						<input type="password" id="password" name="adminPass" placeholder="Enter your Password" required/>
						<div class="help-block with-errors"></div>
					</div>
				</div>
				<?php echo $error; ?>
				<a href="#" data-toggle="modal" data-target="#myModal"><p class="small">Forgot your password?</p></a>
				<br/>
				<button type="submit" id="signIn" >Sign In</button>

				<p class="small">Dont have an Account? <a href="Register.php">Register Here</a></p>

				<br/>

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

</body>
</html>
