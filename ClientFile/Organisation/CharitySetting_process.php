<?php 
include '../dconfig.php';

$AdminEmail = $_SESSION['USERNAME']; 
$password = $newPass = $msg = $cPassword = $inDPassword = "";
$meg = "test message";

if($_SERVER["REQUEST_METHOD"]== "POST")
{
	$cPassword = trim($_POST["cPassword"]);
	$password = trim($_POST["nPassword"]);
	$newPass = sha1($password);

	$sql = "SELECT encrypted_password FROM acc_organization WHERE email = '$AdminEmail'"; 

	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$count = mysqli_num_rows($result); 

	if($count == 1)
	{
		$inDPassword = $row['encrypted_password'];
	}
}



if(!empty($_POST))
{
	if($inDPassword == sha1($cPassword))
	{
		$sql = "UPDATE acc_organization SET encrypted_password = '$newPass' WHERE email = '$AdminEmail'";

		if($conn ->query($sql) == TRUE)
		{
			$msg = "Passowrd has successfully changed " ; 

		}
		else 
		{
			$msg = "Unable to save password. Please Try Again";
		}
	}
	else

	{
		$msg = "You have entered the current Password Wrongly. Please try again";
	}

}



?>