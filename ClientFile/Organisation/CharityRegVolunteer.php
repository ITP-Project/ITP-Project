<!DOCTYPE html>
<html>
<?php 
include '../header.php';
include 'navbar.php';
include '../dconfig.php';
?>
<!-- Table Data -->

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

<body>
	<!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left:340px;margin-right:40px">

		<!-- Setting -->
		<div class="w3-container" id="contact" style="margin-top:75px">
			<h1 class="w3-xxxlarge w3-text-red"><b>Volunteers</b></h1>
		    <hr style="width:50px;border:5px solid red" class="w3-round">
			<?php
				$result = $conn->query("SELECT * FROM acc_volunteer");
				$count = $result->num_rows;
			?>
			
			<div class="table-responsive">
				<table id="volunteer_data" class="table table-striped table-bordered">  
                    <thead>  
                        <tr>
							<td class="hidden">Volunteer ID</td>
                            <td>Name</td>  
                            <td>Email</td>  
                            <td>NRIC</td>  
                            <td>Organisation Name</td>  
                            <td>UEN</td>
							<td>Nationality</td>
							<td></td>
                        </tr>  
                    </thead>  
					<?php
						
						if($count > 0) {
							while($row = mysqli_fetch_array($result))  
							{  
								echo '  
									<tr>
										<td class="hidden">'.$row["AID"].'</td> 
										<td>'.$row["name"].'</td>  
										<td>'.$row["email"].'</td>  
										<td>'.$row["nric"].'</td>  
										<td>'.$row["org_name"].'</td>  
										<td>'.$row["uen"].'</td>
										<td>'.$row["nationality"].'</td>
										<td><input type="checkbox" name="chk[]" class="chk-box" value="'.$row['AID'].'"  /></td>	
								   </tr>  
								   ';  
							}
						}
						else {
							echo 'No event to be displayed!';
						}
						
						//$conn->close();
                    ?>
					
                </table>
			</div>
			<hr>
			<?php
				if($count > 0){
					echo '<input type="checkbox" class="select-all" />';
				}
			?>
			<button type="button" class="btn btn-danger" id="bookBtn" onclick="book()">Book Volunteer/s</button>
		</div>
    <!-- End page content -->
    </div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>
<script>  
 $(document).ready(function(){  
      $('#volunteer_data').DataTable();  
 });  
 </script>