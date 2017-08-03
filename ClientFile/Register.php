<?php
//this is to connect to the database
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

	<?php 

//define variables 
	$name = $email = $nric = $password = $com_name = $msg = "";

	if($_SERVER["REQUEST_METHOD"]== "POST")
	{
		$name = test_input($_POST["name"]); 
		$email = test_input($_POST["email"]); 
		$nric = test_input($_POST["nric"]); 
		$com_name = test_input($_POST["com_name"]); 
		$password = test_input($_POST["password"]); 
		$encrypted_password = SHA1($password); 
	}

//method to test the input
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	
	if(!empty($_POST))
	{
		
		$sqlInsert = "INSERT INTO acc_organization (name, email, encrypted_password, nric, uen, check_verify, is_admin) VALUES ('$name','$email','$encrypted_password','$nric','$com_name', 'NO', 'NO')"; 

		if($conn ->query($sqlInsert) == TRUE){
			$msg = "Account successfully created";
		}
		else 
		{
			$msg = "Account already exist";
		}
	}

	?>

	<div class="container">
		<div class="imageClassLogin">
			<img src="images/MatchIt_Logo.jpeg" alt="Match It"/>
		</div>
	</div>
	<div class="container">
		<div class="register-box animated fadeInUp">
			<div class="box-header">
				<h2>Register</h2>
			</div>

			<form role="form" data-toggle="validator" method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-4 form-group">
							<label>Full Name : </label>
							<input class="form-control" pattern="[a-zA-Z][a-zA-Z ]{2,}" data-pattern-error="Please enter a valid name" id="name" name="name" max=255 placeholder="Enter your full name here" required>
							<div class="help-block with-errors"></div>

						</div>	
						<div class="col-sm-4 form-group">
							<label>NRIC : </label>
							<input class="form-control"  data-minlength-error="Please enter a valid NRIC" data-minlength="9" type="text" id="nric" name="nric" placeholder="Enter your NRIC here" required>
							<div class="help-block with-errors"></div>
						</div>	
						<div class="col-sm-4 form-group">
							<label>Company Name : </label>
							<input class="form-control" type="text" id="com_name" name="com_name" placeholder="Enter your company name" required>
							<div class="help-block with-errors"></div>
						</div>	
					</div>

					<div class="row">
						<div class="col-sm-6 form-group">
							<label>Password : </label>
							<input type="password" data-minlength="6"  data-error="Must enter a minimum of 6 characters" class="form-control" id="password" name="password" placeholder="Enter your Password here" required>
							<div class="help-block with-errors"></div>
						</div>	
						<div class="col-sm-6 form-group">
							<label>Confirm Password : </label>
							<input type="password" class="form-control" id="re-password" name="re-password" data-match="#password" data-error="Passwords do not match" placeholder="Re-enter your Password here" required>
							<div class="help-block with-errors"></div>
						</div>	
					</div>
					<div class="row">
						<div class="col-sm-12 form-group">
							<label>Email Address : </label>
							<input class="form-control" type="email" id="email" name="email" max=255 placeholder="Enter your Email Address here" required>
							<div class="help-block with-errors"></div>
						</div>		
					</div>
				</div>
				<!-- 	<button type="submit" name="submit" class="btn btn-primary" id="signUpBtn" data-dismiss="modal" data-toggle="modal" data-target="#myModalSuccess">Sign Up</button> -->
				<?php echo $msg; ?>
				<button type="submit" name="submit">Register</button>
			</form>
			<p class="small">Already have an Account? <a href="login.php">Login Here</a></p>
			<br/>
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
					<button type="button" class="btn btn-primary" id="signUpBtn" data-dismiss="modal" onclick="signedIn();">Close</button>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
