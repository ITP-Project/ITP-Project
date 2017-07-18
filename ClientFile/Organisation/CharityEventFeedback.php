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
			<h1 class="w3-xxxlarge w3-text-red"><b>Feedback Management</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">


			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Remarks</a></li>
				<li><a data-toggle="tab" href="#menu1">Feedback</a></li>
			</ul>
			<div class="tab-content">
				<div id="home" class="tab-pane fade in active">
					<h3 class="w3-xxxmedium w3-text-red"><b>Ongoing Events</b></h3>
					<div class="table-responsive">
						<table id="event_data" class="table table-striped table-bordered">  
							<thead>  
								<tr>
									<td>No.</td>
									<td>Event Name</td>  
									<td>No. of Remarks</td>  
								</tr>  
							</thead>  
							<?php  
							$countVol = 1; 
							if($resultVol = $conn->query("SELECT count(remarks) AS 'NUM' ,ce.event_name, ce.EID from participation p, event_shift es, created_event ce
								WHERE p.remarks != ''
								AND p.SID = es.SID
								AND es.EID = ce.EID
								AND ce.event_startDate > NOW() 
								GROUP BY ce.event_name"))

							{
								while($rowVol = mysqli_fetch_array($resultVol))  
								{  
									echo '  
									<tr >
										<td> '.$countVol++.' </td>
										<td>'.$rowVol["event_name"].'</td> 
										<td><a href="CharityEventFeedbackDetailed.php?EID='.$rowVol["EID"].'">'.$rowVol["NUM"].'</a></td> 
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


					<h3 class="w3-xxxmedium w3-text-red"><b>Past Events</b></h3>
					<div class="table-responsive">
						<table id="event_data" class="table table-striped table-bordered">  
							<thead>  
								<tr>
									<td>No.</td>
									<td>Event Name</td>  
									<td>Remarks</td>  
								</tr>  
							</thead>  
							<?php  
							$countVol = 1; 
							if($resultVol = $conn->query("SELECT count(remarks) AS 'NUM' ,ce.event_name, ce.EID from participation p, event_shift es, created_event ce
								WHERE p.remarks != ''
								AND p.SID = es.SID
								AND es.EID = ce.EID
								AND ce.event_startDate < NOW() 
								GROUP BY ce.event_name"))

							{
								while($rowVol = mysqli_fetch_array($resultVol))  
								{  
									echo '  
									<tr >
										<td> '.$countVol++.' </td>
										<td>'.$rowVol["event_name"].'</td>  
										<td><a href="CharityEventFeedbackDetailed.php?EID='.$rowVol["EID"].'"> '.$rowVol["NUM"].'</a></td> 			
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
					<h3 class="w3-xxxmedium w3-text-red"><b>Events</b></h3>
					<div class="table-responsive">
						<table id="event_data" class="table table-striped table-bordered">  
							<thead>  
								<tr>
									<td>No.</td>
									<td>Event Name</td>  
									<td>Feedback Received</td>  
								</tr>  
							</thead>  
							<?php  
							$countEve = 1; 
							if($resultEve = $conn->query("SELECT count(Feedback) AS 'NUM' ,ce.event_name, ce.EID from participation p, event_shift es, created_event ce
								WHERE p.remarks != ''
								AND p.SID = es.SID
								AND es.EID = ce.EID 
								GROUP BY ce.event_name"))

							{
								while($rowEve = mysqli_fetch_array($resultEve))  
								{  
									echo '  
									<tr >
										<td> '.$countEve++.' </td>
										<td>'.$rowEve["event_name"].'</td>  
										<td><a href="CharityEventFeedbackDetailed-2.php?EID='.$rowEve["EID"].'">'.$rowEve["NUM"].'</a></td> 
													
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

