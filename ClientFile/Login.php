
<?php
//this is to connect to database
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
 if($_SERVER["REQUEST_METHOD"] == "POST"){
	
		$adminUsername = test_input($_POST["adminUsername"]);
		$adminPass = test_input($_POST["adminPass"]); 
		$admin_encryptedPass = sha1($adminPass);

		$sql = "SELECT is_admin, uen FROM acc_organization WHERE email = '$adminUsername' AND encrypted_password = '$admin_encryptedPass' AND check_verify = 'YES'"; 

		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
		$count = mysqli_num_rows($result); 

		if($count == 1)
		{
			$is_admin = $row['is_admin'];
			$_SESSION['USERNAME'] = $adminUsername; 
			$_SESSION['ADMIN_STATUS'] = $is_admin;		
			$_SESSION['ADMIN_UEN'] = $row['uen'];	

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

	<form action ="Login.php" method="post" role="form" data-toggle= "validator" name="login" >
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
				<a href="ForgetPassword.php"><p class="small">Forgot your password?</p></a>
				<br/>
				<button type="submit" name="LOGIN" value="LOGIN" id="signIn" >Sign In</button>

				<p class="small">Dont have an Account? <a href="Register.php">Register Here</a></p>

				<br/>

			</div>
		</div>
	</form>



	<!-- Modal for password-->
	<?php 

// method to generate random password
	function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
    	$n = rand(0, $alphaLength);
    	$pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$forgetEmail = $newPassword  = "";
?>

</body>
</html>
