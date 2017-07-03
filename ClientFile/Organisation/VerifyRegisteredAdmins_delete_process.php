<?php
include '../dconfig.php';
$test = $_GET['email'];

$sqlDelete = "DELETE FROM acc_organization WHERE email = '$test'";

if($conn -> query($sqlDelete) == TRUE)
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