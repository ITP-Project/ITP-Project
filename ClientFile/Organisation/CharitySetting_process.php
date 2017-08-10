<?php 
include '../dconfig.php';

$AdminEmail = $_SESSION['USERNAME']; 
$password = $newPass = $msg = $cPassword = $inDPassword = "";
$meg = " ";

//get the password 
if($_SERVER["REQUEST_METHOD"]== "POST")
{
	$cPassword = trim($_POST["cPassword"]);
	$password = trim($_POST["nPassword"]);
	$newPass = sha1($password);

	$sql = "SELECT encrypted_password FROM acc_organization WHERE email = '$AdminEmail'"; //query to check the password

	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$count = mysqli_num_rows($result); 

	if($count == 1)
	{
		$inDPassword = $row['encrypted_password'];
	}
}


if(!empty($_POST)) //check if it is empty
{
	if($inDPassword == sha1($cPassword)) //check current password 
	{
		$sql = "UPDATE acc_organization SET encrypted_password = '$newPass' WHERE email = '$AdminEmail'"; //query to update

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