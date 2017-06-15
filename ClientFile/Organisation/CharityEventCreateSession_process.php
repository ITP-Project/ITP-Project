<?php
	$sessionOneStartErr = null;
	$sessionOneEndErr = null;
	/*$sessionTwoStartErr = null;
	$sessionTwoEndErr = null;
	$sessionThreeStartErr = null;
	$sessionThreeEndErr = null;*/
	
	if (isset($_POST['create']) && !empty($_POST['create'])) {
		$errMsg="";
		$sessionOneStart = trim($_POST['sessionOneStart']);
		$sessionOneEnd = trim($_POST['sessionOneEnd']);
		/*$sessionTwoStart = trim($_POST['sessionTwoStart']);
		$sessionTwoEnd = trim($_POST['sessionTwoEnd']);
		$sessionThreeStart = trim($_POST['sessionThreeStart']);
		$sessionThreeEnd = trim($_POST['sessionThreeEnd']);*/
		
		if (empty($sessionOneStart)) {
			$sessionOneStartErr = 'Choose your session';
			$error=true;
		}
		if (empty($sessionOneEnd)) {
			$sessionOneEndErr = 'Choose your session';
			$error=true;
		}
		/*if (empty($sessionTwoStart)) {
			$sessionTwoStartErr = 'Choose your session';
			$error=true;
		}
		if (empty($sessionTwoEnd)) {
			$sessionTwoEndErr = 'Choose your session';
			$error=true;
		}
		if (empty($sessionTwoStart)) {
			$sessionThreeStartErr = 'Choose your session';
			$error=true;
		}
		if (empty($sessionTwoEnd)) {
			$sessionThreeEndErr = 'Choose your session';
			$error=true;
		}*/
		else{
			$sessionOneStart = trim($_POST['sessionOneStart']);
			$sessionOneEnd = trim($_POST['sessionOneEnd']);
			/*$sessionTwoStart = trim($_POST['sessionTwoStart']);
			$sessionTwoEnd = trim($_POST['sessionTwoEnd']);
			$sessionThreeStart = trim($_POST['sessionThreeStart']);
			$sessionThreeEnd = trim($_POST['sessionThreeEnd']);*/
			$sql = "SELECT * FROM created_event ORDER BY EID DESC";
			$result = mysql_query($sql);
			$result = $result + 1;
			//execute the SQL query to read out the data set from database table
			$num=mysql_numrows($result);//get the number of rows of the database table							
			$row = mysql_fetch_array($result);
			$id = $row['EID'];
			
			if($no_of_rows > 0){
				
			}
			$sqli="INSERT INTO event_shift(EID, start, end) VALUES ('$id', '$sessionOneStart', '$sessionOneEnd')";
			$sql2= mysql_query($sqli);
			if (mysql_query($sqli)) {
				echo '<script>';
				echo 'alert("Event successfully created!");';
				echo 'window.location.href="CharityEvent.php";';
				echo '</script>';
			} else {
				echo "Error: " . $sqli . "<br>" . mysql_error($con);
			}
		}
	}
?>