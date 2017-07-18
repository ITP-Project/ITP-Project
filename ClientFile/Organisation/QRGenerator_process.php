<?php
include 'QRGenerator.php';

if($_POST['SID']){
	$sid = $_POST['SID'];
	
	$ex1 = new QRGenerator($sid,100);
	echo "<img src=".$ex1->generate().">";
}
?>