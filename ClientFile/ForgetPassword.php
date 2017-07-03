
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

	//define variables 
	$adminNRIC = $adminEmail = $adminPassword = $error = ""; 
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$adminNRIC = test_input($_POST["adminNRIC"]);
		$adminEmail = test_input($_POST["adminEmail"]); 
		$adminPassword = randomPassword();
		$encrypted_password = sha1($adminPassword);

		$sql = "SELECT AID FROM acc_organization WHERE email = '$adminEmail' AND nric = '$adminNRIC'"; 

		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
		
		$count = mysqli_num_rows($result); 

		if($count == 1)
		{

			$r = mysqli_fetch_assoc($result);
			$newPassword = randomPassword(); 
			$to = 'bloowhiteskies@gmail.com'; 
			$subject = "Your New Passoword"; 
			$message = "Please use this password to Login. Your New Password is " . $adminPassword ;
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			$headers = "From: sneakyturtle05@gmail.com" . "\r\n" ;
			// $headers =  'MIME-Version: 1.0' . "\r\n"; 
			// $headers .= 'From: bloowhiteskies@gmail.com' . "\r\n";
			// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

			$sqlUpdate = "UPDATE acc_organization SET encrypted_password = '$encrypted_password' WHERE email = '$adminEmail' AND nric = '$adminNRIC'"; 

			if((mail($to, $subject, $message, $headers)) && (mysqli_query($conn, $sqlUpdate)))
			{
				$error = "Your New Password has been sent to your email";

			}
			else{
				$error = "Failed to Recover your password, Please try again";
			}
		} 
		else{
			$error = "Invalid NRIC and Email Address";
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

?>
<form action ="ForgetPassword.php" method="post" role="form" data-toggle= "validator" name="forgetpassword" >
	<div class="container">
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Forget Password</h2>
			</div>
			<div class="row">
				<div class="col-sm-12 form-group">
					<label for="NRIC">NRIC</label>
					<input type="text" id="NRIC" name="adminNRIC" placeholder="Enter your NRIC" required/>
					<div class="help-block with-errors"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 form-group">
					<label for="email">Email Address</label>
					<input type="email" id="email" name="adminEmail" placeholder="Enter your Email Address" required/>
					<div class="help-block with-errors"></div>
				</div>
			</div>
			<?php echo $error; ?>

			<br/>
			<button type="submit" name="FORGETPASSWORD" value="FORGETPASSWORD" >Recover Password</button>

			<p class="small">Dont have an Account? <a href="Register.php">Register Here</a></p>
			<p class="small">Already Have an Account? <a href="Login.php">Login Here</a></p>

			<br/>

		</div>
	</div>
</form>


</body>
</html>
