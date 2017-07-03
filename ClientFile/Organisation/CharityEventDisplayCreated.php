<!DOCTYPE html>
<html>
<head>
	<?php 
	include '../header.php';
	include 'navbar.php';
	include '../dconfig.php';
	?>
	<!-- Table Data -->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
	<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

	<script src="https://www.gstatic.com/firebasejs/4.1.3/firebase.js"></script>
	<script src="firebase_insert.js"></script>
</head>
<script>
// Initialize Firebase
  var config = {
    apiKey: "AIzaSyBoSpzhFZLwPubJ6lgYjH50cEitXiMEXvU",
    authDomain: "matchit-e3c39.firebaseapp.com",
    databaseURL: "https://matchit-e3c39.firebaseio.com",
    projectId: "matchit-e3c39",
    storageBucket: "matchit-e3c39.appspot.com",
    messagingSenderId: "1097349398020"
  };
  firebase.initializeApp(config);
</script>
<body>
	<!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left:340px;margin-right:40px">

		<!-- Setting -->
		<div class="w3-container" id="contact" style="margin-top:75px">
			<h1 class="w3-xxxlarge w3-text-red"><b>Events Management</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
			<?php 
				$result = $conn->query("SELECT * FROM created_event ORDER BY EID");
				while($row = $result->fetch_assoc()){
					$eventID = $row['EID'];
					$eventName = $row['event_name'];
					$eventLocation = $row['event_location'];
					$eventStartDate = $row['event_startDate'];
					$eventEndDate = $row['event_endDate'];
					$eventDesc = $row['event_desc'];
					$eventCategory = $row['event_category'];
				}
				
				//session
				$sessionResult = $conn->query("SELECT * FROM event_shift WHERE EID=$eventID");
				while($sessionRow = $sessionResult->fetch_assoc()){
					$sessionID = $sessionRow['SID'];
					$sessionDate = $sessionRow['event_date'];
					$sessionStartTime = $sessionRow['event_startTime'];
					$sessionEndTime = $sessionRow['event_endTime'];
					$maxPart = $sessionRow['max_participation'];
				}
			?>

			<div class="w3-section">
				<div class="form-group">
					<div class="row">
						<div class='col-md-6'>
							<table class="table">
								<tr hidden>
									<td><strong>Event ID :</strong></td>
									<td><input type="text" id="eventID" value="<?php echo $eventID?>"></td>
								</tr>
								<tr>
									<td><strong>Event Name :</strong></td>
									<td><input hidden type="text" id="eventName" value="<?php echo $eventName?>"><?php echo $eventName?></td>
								</tr>
								<tr>
									<td><strong>Event Location :</strong></td>
									<td><input hidden type="text" id="eventLocation" value="<?php echo $eventLocation?>"><?php echo $eventLocation?></td>
								</tr>
								<tr>
									<td><strong>Event Start Date :</strong></td>
									<td><input hidden type="text" id="eventStartDate" value="<?php echo $eventStartDate?>"><?php echo $eventStartDate?></td>
								</tr>
								<tr>
									<td><strong>Event End Date :</strong></td>
									<td><input hidden type="text" id="eventEndDate" value="<?php echo $eventEndDate?>"><?php echo $eventEndDate?></td>
								</tr>
								<tr>
									<td><strong>Event Category :</strong></td>
									<td><input hidden type="text" id="eventCategory" value="<?php echo $eventCategory?>"><?php echo $eventCategory?></td>
								</tr>
								<tr>
									<td><strong>Event Description :</strong></td>
									<td><input hidden type="text" id="eventDesc" value="<?php echo $eventDesc?>"><?php echo $eventDesc?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<?php
							// number of results to show per page
							$per_page = 10;

							// figure out the total pages in the database
							if ($result = $conn->query("SELECT * FROM event_shift WHERE EID=$eventID"))
							{
							if ($result->num_rows != 0)
							{
							$total_results = $result->num_rows;
							// ceil() returns the next highest integer value by rounding up value if necessary
							$total_pages = ceil($total_results / $per_page);

							// check if the 'page' variable is set in the URL (ex: view-paginated.php?page=1)
							if (isset($_GET['page']) && is_numeric($_GET['page']))
							{
							$show_page = $_GET['page'];

							// make sure the $show_page value is valid
							if ($show_page > 0 && $show_page <= $total_pages)
							{
							$start = ($show_page -1) * $per_page;
							$end = $start + $per_page;
							}
							else
							{
							// error - show first set of results
							$start = 0;
							$end = $per_page;
							}
							}
							else
							{
							// if page isn't set, show first set of results
							$start = 0;
							$end = $per_page;
							}

							// display data in table
							echo '<table class="table table-striped table-bordered">';
							echo "<tr><th hidden></th><th>Session Start Time</th><th>Session End Time</th><th>Event Date</th><th>Max Participation</th><th hidden></th></tr>";

							// loop through results of database query, displaying them in the table
							for ($i = $start; $i < $end; $i++)
							{
							// make sure that PHP doesn't try to show results that don't exist
							if ($i == $total_results) { break; }

							// find specific row
							$result->data_seek($i);
							$row = $result->fetch_row();

							// echo out the contents of each row into a table
							// $row[1] is the host column in database
							echo "<tr>";
							echo '<td hidden><input type="text" id="sessionID" value="'. $row[0] .'">' . $row[0] . '</td>';
							echo '<td><input hidden type="text" id="sessionStart" value="'. $row[3] .'">' . $row[3] . '</td>';
							echo '<td><input hidden type="text" id="sessionEnd" value="'. $row[4] .'">' . $row[4] . '</td>';
							echo '<td><input hidden type="text" id="eventDate" value="'. $row[2] .'">' . $row[2] . '</td>';
							echo '<td><input hidden type="text" id="maxPart" value="'. $row[5] .'">' . $row[5] . '</td>';
							echo '<td hidden><input type="text" id="volPart" value="'. $row[6] .'">' . $row[6] . '</td>';
							echo "</tr>";
							}

							// close table>
							echo "</table>";
							}
							else
							{
							echo "No session has been added!";
							}
							}
							// error with the query
							else
							{
							echo "Error: " . $conn->error;
							}
							
							?>
						</div>
					</div>
				</div>
			</div>
			
			</div>
			<hr>
			<!--<button type="button" name="btn_back" id="btn_back" class="btn btn-danger" onclick="submitClick()">Back</button>-->
			<button id="submitBtn" onclick="submitClick();">submit</button>
			
			<table>
		<thead>
			<tr>
				<td>Name</td>
				<td>Email</td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody id="table_body">

		</tbody>
	</table>
		</div>
	  <!-- End page content -->
	</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>
