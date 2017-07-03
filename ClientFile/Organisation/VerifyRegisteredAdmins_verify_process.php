<?php
include '../dconfig.php';
$test = $_GET['email'];

$sqlUpdate = "UPDATE acc_organization SET check_verify = 'YES' WHERE email = '$test'";

if($conn -> query($sqlUpdate) == TRUE)
{
	header("location: VerifyRegisteredAdmins.php");
	echo "<br>";
	echo "you did it";
}
else
{
	// header("location: VerifyRegisteredAdmins.php");
echo "fail";
}

$conn -> close();

?>