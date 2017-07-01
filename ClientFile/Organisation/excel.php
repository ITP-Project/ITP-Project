<?php  
	//excel.php 
	header('Content-Type: application/vnd.ms-excel');  
	header('Content-disposition: attachment; filename='.date("Y/m/d").'_'.rand().'.xls');
	echo $_GET["data"];  
?>  