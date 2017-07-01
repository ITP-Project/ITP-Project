<!DOCTYPE html>
<html>
<head>
	<?php 
	include '../header.php';
	include 'navbar.php';
	include '../dconfig.php';
	?>


</head>
<body>
	<!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left:340px;margin-right:40px">


		<!-- Setting -->
		<div class="w3-container" id="contact" style="margin-top:75px">
			<h1 class="w3-xxxlarge w3-text-red"><b>Verify Admins</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
			
			<div class="w3-section">
				<?php

				$msg = "";
				$sql = "SELECT * FROM acc_organization WHERE check_verify = 'NO'  ";
				$result = $conn -> query($sql);


				if ($result->num_rows > 0) {
					echo '<table class="table-striped">';
					echo "<tr><th>Email Address</th><th>Name </th><th>NRIC</th> <th>Verify Account</th> <th>Delete Account</th> </tr>";
					while($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<tr><td style='width: 300px; height:50px;'>".$row["email"]. "</td>

						<td style='width: 300px; height:50px;' >".$row["name"]." </td>

						<td style='width: 300px; height:50px;'> ".$row["nric"]."</td>  

						<td style='width: 300px; height:50px;'><a href='VerifyRegisteredAdmins_verify_process.php?email=".$row["email"]."' class='btn btn-success'>Verify</a></td> 

						<td style='width: 300px; height:50px;'><a href='VerifyRegisteredAdmins_delete_process.php?email=".$row["email"]."'  class='btn btn-danger' >Delete </a></td>   </tr>";


					}
					echo "</table>";
				} else {
					echo "There are no admins to verify";
				}
				$conn->close();
				?>
			</div>
		</div>
	</div>

	
	<!-- Modal -->
	<div class="modal fade" id="DeleteModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Delete Account?</h4>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete this Account? </p>
					 
					<button type='button' class='btn btn-info' data-dismiss='modal' >Cancel</button>
					<a href="VerifyRegisteredAdmins_delete_process.php"  type='button' class='btn btn-info'  >Delete</a>

					<a href="VerifyRegisteredAdmins_delete_process.php">fre</a>

				</div>
				
			</div>

		</div>
	</div>
	<script>

		
	</script>

	

	<!-- End page content -->




</body>
</html>
