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
							<select name="eventSelect" id="eventSelect" class="form-control action">
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
						<div class="col-md-3">
							<select name="dateS" id="dateS" class="form-control action">
								<option value="">Select Session</option>
								
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
									<td>Current Volunteer Count</td>  
									<td>Max Volunteer Count</td>
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
							<tbody id="volBtm">
							</tbody>
						</table>
					</div>
					<hr>
					<button type="submit" class="btn btn-danger" id="book" name="book" value="book" >Book Volunteer/s</button>
				</form>
				</div>
				<!--menu2-->
				<div id="menu1" class="tab-pane fade">
					<h3>View Volunteers for Events</h3>
					<div class="w3-container">
						<div class="col-md-3">
							<select name="eExport" id="eExport" class="form-control sAction">
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
						<div class="col-md-3">
							<select name="sExport" id="sExport" class="form-control sAction">
								<option value="">Select Session</option>
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
							<tbody id="sessionExport">
							</tbody>
						</table>
					</div>
					<hr>
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
 
/*$(document).ready(function(){  
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
 });*/

$(document).ready(function(){
    $('#eventSelect').on('change',function(){
        var eventID = $(this).val();
        if(eventID){
            $.ajax({
                type:'POST',
                url:'RetrieveVolunteer.php',
                data:'EID='+eventID,
                success:function(html){
                    $('#session').html(html);
                }
            }); 
        }
    });
});

//Top retrieve first page
$(document).ready(function(){
    $('#dateS').on('change',function(){
        var event_date = $('#dateS :selected').text();
        if(event_date){
            $.ajax({
                type:'POST',
                url:'RetrieveVolunteerBtm.php',
                data:'event_date='+event_date,
                success:function(html){
                    $('#volBtm').html(html);
					$.fn.dataTableExt.sErrMode = 'throw'
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
                }
            }); 
        }
    });
});

$(document).ready(function(){
	$('.action').change(function(){
		if($(this).val() != '')
		{
			var action = $(this).attr("id");
			var query = $(this).val();
			var result = '';
			if(action == "eventSelect")
			{
				result = 'dateS';
			}
			$.ajax({
				url:"CharitySessionRetrieve_process.php",
				method:"POST",
				data:{action:action, query:query},
				success:function(data){
					$('#'+result).html(data);
				}
			})
		}
	});
});

//Export page
$(document).ready(function(){
    $('#sExport').on('change',function(){
        var eventVID = $(this).val();
        if(eventVID){
            $.ajax({
                type:'POST',
                url:'CharitySessionRetrieveV_process.php',
                data:'SID='+eventVID,
                success:function(html){
                    $('#sessionExport').html(html);
                }
            }); 
        }
    });
});

$(document).ready(function(){
	$('.sAction').change(function(){
		if($(this).val() != '')
		{
			var sAction = $(this).attr("id");
			var squery = $(this).val();
			var results = '';
			if(sAction == "eExport")
			{
				results = 'sExport';
			}
			$.ajax({
				url:"SessionRetrieve.php",
				method:"POST",
				data:{sAction:sAction, squery:squery},
				success:function(data){
					$('#'+results).html(data);
				}
			})
		}
	});
});
 </script>