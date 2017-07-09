<!DOCTYPE html>
<html>
<head>
	<?php 
	include '../header.php';
	include 'navbar.php';
	include '../dconfig.php';
	?>
	<!-- Table Data -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
	
	<script src="https://www.gstatic.com/firebasejs/4.1.3/firebase.js"></script>
	<script src="firebase_insert.js"></script>
</head>
<body>
	<!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left:340px;margin-right:40px">

		<!-- Setting -->
		<div class="w3-container" id="contact" style="margin-top:75px">
			<h1 class="w3-xxxlarge w3-text-red"><b>Events Statistics</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">


			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Volunteers</a></li>
				<li><a data-toggle="tab" href="#menu1">Events</a></li>
			</ul>
			<div class="tab-content">
				<div id="home" class="tab-pane fade in active">
					<h3 class="w3-xxxmedium w3-text-red"><b>Top 5 Volunteer</b></h3>
					<div class="table-responsive">
						<table id="event_data" class="table table-striped table-bordered">  
							<thead>  
								<tr>
									<td>No.</td>
									<td>Volunteer Name</td>  
									<td>Events Participated</td>  
								</tr>  
							</thead>  
							<?php  
							$countVol = 1; 
							if($resultVol = $conn->query("SELECT v.name, COUNT(ce.EID) AS 'Number Of Events' FROM acc_volunteer v, participation p, event_shift s, created_event ce WHERE v.unique_id = p.unique_id AND s.SID = p.SID AND p.status = 'registered' AND s.EID = ce.EID GROUP BY v.name LIMIT 5"))

							{
								while($rowVol = mysqli_fetch_array($resultVol))  
								{  
									echo '  
									<tr >
										<td> '.$countVol++.' </td>
										<td>'.$rowVol["name"].'</td> 
										<td>'.$rowVol["Number Of Events"].'</td>  			
									</tr>  
									';  
								}
							}
							else {
								echo 'No event to be displayed!';
							}
							?>  
						</table>
					</div>


					<h3 class="w3-xxxmedium w3-text-red"><b>Top 5 Volunteer per Category</b></h3>

					<select class="form-control" name="eventCategory" id="eventCategory">
						<option value="select" selected="disabled">Please select category</option>
						<option value="Animals">Animals</option>
						<option value="Environmental">Environmental</option>
						<option value="Disabled">Disabled</option>
						<option value="Community">Community</option>
						<option value="Educational">Educational</option>
						<option value="Arts and Culture">Arts and Culture</option>
					</select>
					<br>
					<div class="table-responsive">
						<table id="event_data" class="table table-striped table-bordered">  
							<thead>  
								<tr>
									<td>No.</td>
									<td>Volunteer Name</td>  
									<td>Total Time</td>  
								</tr>  
							</thead>  
						<tbody id="volunteerCat">
							</tbody>
						</table>
					</div>

					<h3 class="w3-xxxmedium w3-text-red"><b>Top 5 Volunteer (Hours Committed)</b></h3>
					<div class="table-responsive">
						<table id="event_data" class="table table-striped table-bordered">  
							<thead>  
								<tr>
									<td>No.</td>
									<td>Volunteer Name</td>  
									<td>Hours Committed</td>  
								</tr>  
							</thead>  
							<?php  
							$countVol = 1; 
							if($resultVol = $conn->query("SELECT v.name, SUM(((s.event_endTime - s.event_startTime)/100)) AS 'total Time' FROM acc_volunteer v, participation p, event_shift s WHERE v.unique_id = p.unique_id AND s.SID = p.SID AND p.status = 'registered'"))

							{
								while($rowVol = mysqli_fetch_array($resultVol))  
								{  
									echo '  
									<tr >
										<td> '.$countVol++.' </td>
										<td>'.$rowVol["name"].'</td> 
										<td>'.$rowVol["total Time"].'</td>  			
									</tr>  
									';  
								}
							}
							else {
								echo 'No event to be displayed!';
							}
							?>  
						</table>
					</div>




				</div>

				<div id="menu1" class="tab-pane fade">
					<h3 class="w3-xxxmedium w3-text-red"><b>Top 5 Events - Highest Sign Up</b></h3>
					<div class="table-responsive">
						<table id="event_data" class="table table-striped table-bordered">  
							<thead>  
								<tr>
									<td>No.</td>
									<td>Volunteer Name</td>  
									<td>Events Participated</td>  
								</tr>  
							</thead>  
							<?php  
							$countEve = 1; 
							if($resultEve = $conn->query("SELECT ce.event_name, SUM(es.participation_count) AS 'total participation' FROM created_event ce, event_shift es WHERE ce.EID = es.EID GROUP BY ce.EID ORDER BY SUM(es.participation_count)  DESC LIMIT 5"))

							{
								while($rowEve = mysqli_fetch_array($resultEve))  
								{  
									echo '  
									<tr >
										<td> '.$countEve++.' </td>
										<td>'.$rowEve["event_name"].'</td> 
										<td>'.$rowEve["total participation"].'</td>  			
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
				</div>

			</div>



			<hr>
		</div>
		<!-- End page content -->
	</div>

	<!-- W3.CSS Container -->
	<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>


<script>
	
	$(document).ready(function(){
    $('#eventCategory').on('change',function(){
        var eventID = $(this).val();
        if(eventID){
            $.ajax({
                type:"POST",
                url:'CharityStatsRetrieve_process.php',
                data: "eventCategory=" + eventID,
                success:function(html){
                    $('#volunteerCat').html(html);
                }
            }); 
        }
    });
});
</script>
</body>
</html>

