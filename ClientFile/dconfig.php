<?php
$servername = "sql12.freemysqlhosting.net";
$username = "sql12179354";  //your user name for php my admin if in local most probaly it will be "root"
$password = "51brcjPTZ6";  //password probably it will be empty
$databasename = "sql12179354"; //Your db nane
// Create connection
$conn = new mysqli($servername, $username, $password,$databasename);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
