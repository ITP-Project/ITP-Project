<!DOCTYPE html>
<html>
<?php 
include '../header.php';
include 'navbar.php';
include '../dconfig.php';
?>
<!-- Table Data -->
           
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

<body>
	<!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left:340px;margin-right:40px">
		
		<form action="BookVolunteer_process.php" method="POST" enctype="multipart/form-data">
		<!-- Setting -->
		<div class="w3-container" id="contact" style="margin-top:75px">
			<h1 class="w3-xxxlarge w3-text-red"><b>Volunteers</b></h1>
		    <hr style="width:50px;border:5px solid red" class="w3-round">
			<div class="w3-container">
				<div class="col-md-3">
					<?php

					//Get all country data
					$query = $conn->query("SELECT * FROM created_event ORDER BY event_name ASC");

					//Count total number of rows
					$rowCount = $query->num_rows;
					?>
					<select name="event" id="event" class="form-control">
						<option value="">Select Event</option>
						<?php
						if($rowCount > 0){
							while($rowi = $query->fetch_assoc()){ 
								echo '<option value="'.$rowi['EID'].'">'.$rowi['event_name'].'</option>';
							}
						}else{
							echo '<option value="">Event not available</option>';
						}
						?>
					</select>
				</div>
			</div>
			<hr>
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>  
                        <tr>
							<td class="hidden">Volunteer ID</td>
                            <td>Session Date</td>  
                            <td>Session Start Time</td>  
                            <td>Session End Time</td>
							<td></td>
                        </tr>  
                    </thead>
					<tbody id="session">
					</tbody>
				</table>
			</div>
			<hr>
			<div class="table-responsive">
				<table id="volunteer_data" class="table table-striped table-bordered">  
                    <thead>  
                        <tr>
							<td hidden>Volunter ID</td>
							<td hidden></td>
                            <td>Name</td>  
                            <td>Email</td>  
                            <td>NRIC</td>  
                            <td>Organisation Name</td>  
                            <td>UEN</td>
							<td>Nationality</td>
							<td>Book <input type="checkbox" class="pull-right" id="chk-all"></td>
                        </tr>  
                    </thead>  
					<?php
					
						$result = $conn->query("SELECT * FROM acc_volunteer");
						$count = $result->num_rows;
						
						if($count > 0) {
							while($row = $result->fetch_array())  
							{  
								echo '  
									<tr>
										<td hidden><input type="text" value="'.$row["AID"].'"></td>
										<td hidden><input type="text" value="'.$row["unique_id"].'"></td>
										<td>'.$row["name"].'</td>  
										<td>'.$row["email"].'</td>  
										<td>'.$row["nric"].'</td>  
										<td>'.$row["org_name"].'</td>  
										<td>'.$row["uen"].'</td>
										<td>'.$row["nationality"].'</td>
										<td><input type="checkbox" class="chk-box pull-left" name="chk[]" value="'.$row["AID"].'"></td>
								    </tr>
								   ';
							}
						}
						else {
							echo 'No event to be displayed!';
						}
						
						$conn->close();
                    ?>
					
                </table>
			</div>
			<hr>
			<button type="submit" class="btn btn-danger" id="book" name="book" value="book" >Book Volunteer/s</button>
		</div>
		</form>
    <!-- End page content -->
    </div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>
<script>  
$(document).ready(function(){  
      var oTable = $('#volunteer_data').dataTable({
        stateSave: false
		});

		var allPages = oTable.fnGetNodes();

		$('body').on('click', '#chk-all', function () {
			if ($(this).hasClass('allChecked')) {
				$('input[type="checkbox"]', allPages).prop('checked', false);
			} else {
				$('input[type="checkbox"]', allPages).prop('checked', true);
			}
			$(this).toggleClass('allChecked');
		})
 });

$(document).ready(function(){
    $('#event').on('change',function(){
        var eventID = $(this).val();
        if(eventID){
            $.ajax({
                type:'POST',
                url:'CharitySessionRetrieve_process.php',
                data:'EID='+eventID,
                success:function(html){
                    $('#session').html(html);
                }
            }); 
        }
    });
});
 </script>