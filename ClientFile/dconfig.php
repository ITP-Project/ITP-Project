<?php
	$host="sql12.freemysqlhosting.net"; //replace it with your database hostname
	$username="sql12179354"; //replace it with your database username
	$password="51brcjPTZ6"; //replace it with your database password
	$db_name="sql12179354"; //replace it with your database name
	//$table_name="cinema";//replace it with your table name
	$con=mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");
?>