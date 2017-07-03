<?php
//Include database connection

include '../dconfig.php';

// if($_POST['rowid']) {
//     $id = $_POST['rowid']; //escape string
//     // Run the Query
//     $sql="SELECT * FROM acc_organization WHERE email = '$id'"; 
//     $result = $conn->$sql; 
//     while($row = $result->fetch_assoc())
//     {
//     	echo" $.row['email']";
//     	echo "well HELLO";
//     }

//     // Fetch Records
//     // Echo the data you want to show in modal
//  }
echo "SEE IF THIS WORKS";

    $id = $_POST['rowid']; //escape string
          echo "# <input type='text' name='acommentuid' value='$id'>";
          
?>