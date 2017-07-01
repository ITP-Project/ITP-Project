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
		
		<!-- Setting -->
		<div class="w3-container" id="contact" style="margin-top:75px">
			<h1 class="w3-xxxlarge w3-text-red"><b>Volunteers</b></h1>
		    <hr style="width:50px;border:5px solid red" class="w3-round">
			
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#home">Book Volunteer</a></li>
			  <li><a data-toggle="tab" href="#menu1">View Volunteer</a></li>
			</ul>

			<div class="tab-content">
				<div id="home" class="tab-pane fade in active">
				<h3>Book Here</h3>
				<form action="BookVolunteer_process.php" method="POST" enctype="multipart/form-data">
					<div class="w3-container">
						<div class="col-md-3">
							<select name="event" id="event" class="form-control">
								<option value="">Select Event</option>
								<?php
								//Get all event data
								$query = $conn->query("SELECT * FROM created_event ORDER BY event_name ASC");

								//Count total number of rows
								$rowCount = $query->num_rows;
								
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
									<td>Contact Number</td>
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
												<td>'.$row["liason_contact"].'</td>
												<td><input type="checkbox" class="chk-box pull-left" name="chk[]" value="'.$row["AID"].'"></td>
											</tr>
										   ';
									}
								}
								else {
									echo 'No event to be displayed!';
								}
								
								mysqli_free_result($result);
								
								//$conn->close();
							?>
							
						</table>
					</div>
					<hr>
					<button type="submit" class="btn btn-danger" id="book" name="book" value="book" >Book Volunteer/s</button>
				</form>
				</div>
				<div id="menu1" class="tab-pane fade">
					<h3>View Volunteers for Events</h3>
					<div class="w3-container">
						<div class="col-md-3">
							<select name="eventV" id="eventV" class="form-control">
								<option value="">Select Event</option>
								<?php
								//Get all event data
								$volQuery = $conn->query("SELECT * FROM created_event ORDER BY event_name ASC");

								//Count total number of rows
								$volRowCount = $volQuery->num_rows;
								
								if($volRowCount > 0){
									while($rowV = $volQuery->fetch_assoc()){ 
										$eid = $rowV['EID'];
										echo '<option value="'.$rowV['EID'].'">'.$rowV['event_name'].'</option>';
									}
								}else{
									echo '<option value="">Event not available</option>';
								}
								
								?>
							</select>
						</div>
					</div>
					<hr>
					<div class="table-responsive" id="event_data">
						<table class="table table-striped table-bordered">
							<thead>  
								<tr>
									<td>Name</td>  
									<td>Email</td>  
									<td>NRIC</td>  
									<td>Organisation Name</td>  
									<td>UEN</td>
									<td>Nationality</td>
									<td>Contact Number</td>
								</tr>  
							</thead>
							<tbody id="sessionV">
							</tbody>
						</table>
					</div>
					<hr>
					<!--<input type="submit" name="create_excel" id="create_excel" class="btn btn-success" value="Export to Excel" />-->
					<button type="submit" id="excel" name="excel" value="excel" class="btn btn-success" value="Export to Excel" />Export to Excel</button>
				</div>
			</div>
		</div>
    <!-- End page content -->
    </div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>
<script>  
$(document).ready(function(){  
      $('#excel').click(function(){  
           var excel_data = $('#event_data').html();  
           var page = "excel.php?data=" + excel_data;  
           window.location = page;  
      });  
 }); 
 
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

$(document).ready(function(){
    $('#eventV').on('change',function(){
        var eventVID = $(this).val();
        if(eventVID){
            $.ajax({
                type:'POST',
                url:'CharitySessionRetrieveV_process.php',
                data:'EID='+eventVID,
                success:function(html){
                    $('#sessionV').html(html);
                }
            }); 
        }
    });
});
 </script>