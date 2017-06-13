<?php
$errorf = "";
if(isset($_POST['files_P'])){
	$file = $_POST['files_P'];

	//File properties
	$file_name = $file['name'];
	$file_tmp = $file['tmp_name'];
	$file_size = $file['size'];
	$file_error = $file['error'];
	$total='';

	//Work out the file extension
	$file_ext = explode('.',$file_name);
	//$ext = explode('.', basename($_FILES['file_img']['name'][$i]));//explode file name from dot(.)
	$file_ext = strtolower(end($file_ext));
					
	//print_r($file_ext);

	$allowed = array('jpeg', 'jpg', 'png');

	/*if (!in_array($file_ext, $allowed)) {
		echo '<script>';
		echo 'alert("Extension not allowed");';
		echo '</script>';
	}*/

	if ($error == ""){

	if(in_array($file_ext, $allowed)){
		if($file_error === 0){
			if($file_size <= 2097152){
				$file_name_new = uniqid('',true) . '.' . $file_ext;
				$file_destination = 'images/event_poster/' . $file_name_new;
				if(move_uploaded_file($file_tmp, $file_destination)){
					$total=$total."|".$file_destination;
				}
			}
		}
	}
	$cut=explode('|',$total,2);
	$query="UPDATE event SET eventImg = '$cut[1]' WHERE eventName = '$eventName'";
	//$query="INSERT INTO movies (img_poster) VALUES('$cut[1]')";
	mysql_query($query);
	}
	else{
		echo alert($error);
	}
}


?>