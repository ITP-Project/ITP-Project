<!DOCTYPE html>
<html>
<head>
	<?php 
	include '../header.php';
	include 'navbar.php';
	include '../dconfig.php';
	include 'CharityEventUpdate_process.php';
	?>
</head>
<!-- Date -->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
	<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
<script>
$(function() {
    $( "#datepicker" ).datepicker({
		dateFormat: 'yy-mm-dd'
	});
	$( "#datepicker1" ).datepicker({
		dateFormat: 'yy-mm-dd'
	});
	$( "#datepicker2" ).datepicker({
		dateFormat: 'yy-mm-dd'
	});
});

$(function() {
	
	var i = 1;

    var options = '<div class="row" id="row'+i+'"><br>' +
						'<div class="col-sm-3">' +
							'<input type="text" class="form-control" name="sessionStart[]" placeholder="Eg. 1300 pm"/>' +
						'</div>' +
						'<div class="col-sm-3">' +
							'<input type="text" class="form-control" name="sessionEnd[]" placeholder="Eg. 1400 pm"/>' +
						'</div>' +
						'<div class="col-sm-3">' +
							'<input type="text" class="datepicker3 form-control" name="eventDate[]" />' +
						'</div>' +
						'<div class="col-sm-2">' +
							'<input type="text" class="form-control" name="maxPart[]" />' +
						'</div>' +
						'<div class="col-sm-1">' +
							'<button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>' +
						'</div>' +
					  '</div>';    

    //add input
    $('#add').click(function(e) {
		e.preventDefault(); 
        i++;    
		$(options).fadeIn("slow").appendTo('#extender');
    });

    $('.datepicker3').live('click', function() {
        $(this).datepicker('destroy').datepicker({changeMonth: true,changeYear: true,dateFormat: "yy-mm-dd",showOn:'focus'}).focus();
    });

	$(document).on('click','.btn_remove', function(e){
		e.preventDefault();
        var button_id = $(this).attr("id");
        $("#row"+button_id+"").remove();
    });

});
</script>
<body>
	<!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left:340px;margin-right:40px">

		<!-- Setting -->
		<div class="w3-container" id="contact" style="margin-top:75px">
			<h1 class="w3-xxxlarge w3-text-red"><b>Events Management</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
			<div class="w3-section">
			<?php
			$id=$_GET['id'];
			$result = $conn->query("SELECT * FROM created_event WHERE EID=$id");
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
			$sessionResult = $conn->query("SELECT * FROM event_shift WHERE EID=$id");
			while($sessionRow = $sessionResult->fetch_assoc()){
				$sessionID = $sessionRow['SID'];
				$sessionDate = $sessionRow['event_date'];
				$sessionStartTime = $sessionRow['event_startTime'];
				$sessionEndTime = $sessionRow['event_endTime'];
				$maxPart = $sessionRow['max_participation'];
			}
			
			?>
			<div class="w3-section">
			<form id="eventDetails" action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
			  <div class="form-group">
				<label for="eventName">Event Name</label>
				<div class="row">
					<div class='col-md-6'>
						<input type="text" class="hidden" name="eventID" value="<?php echo $eventID ?>" >
						<input type="text" class="form-control" name="eventName" value="<?php echo $eventName ?>">
					</div>
				</div>
			  </div>
			  <div class="form-group">
				<label for="eventLocation">Event Location</label>
				<div class="row">
					<div class="col-md-6">
						<input type="text" class="form-control" name="eventLocation" value="<?php echo $eventLocation ?>">
					</div>
				</div>
			  </div>
			  <div class="form-group">
				<div class="row">
					<div class="col-md-3">
					<label for="eventDate">Event Start Date</label>
						<input type = "text" id = "datepicker" name="eventStartDate" class="form-control" value="<?php echo $eventStartDate ?>">
					</div>
					<div class="col-md-3">
					<label for="eventDate">Event End Date</label>
						<input type = "text" id = "datepicker1" name="eventEndDate" class="form-control" value="<?php echo $eventEndDate ?>">
					</div>
				</div>
			  </div>
			  <div class="form-group">
				<label for="eventSession">Event Session/s</label>
			  </div>
			  <div class="row">
				<div class="col-md-9">
					<?php
					// number of results to show per page
					$per_page = 10;

					// figure out the total pages in the database
					if ($result = $conn->query("SELECT * FROM event_shift WHERE EID=$id"))
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
					echo "<tr><th hidden></th><th>Session Start Time</th><th>Session End Time</th><th>Event Date</th><th>Max Participation</th><th></th></tr>";

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
					echo '<td hidden>' . $row[1] . '</td>';
					echo '<td>' . $row[3] . '</td>';
					echo '<td>' . $row[4] . '</td>';
					echo '<td>' . $row[2] . '</td>';
					echo '<td>' . $row[5] . '</td>';
					echo '<td>
					<a href="CharityEventDeleteSession_process.php?sid='.$row[0].'&id='.$row[1].'"><span class="glyphicon glyphicon-remove"></span></a>
					</td>';
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
			  </div><br>
			  <button class="add_field_button btn btn-danger" id="add">Add More Fields</button>
			  <div class="form-group input_fields_wrap">
				<div class="row">
					<div class="col-sm-3">
						<label for="sessionStart">Session Start Date</label>
					</div>
					<div class="col-sm-3">
						<label for="sessionEnd">Session End Date</label>
					</div>
					<div class="col-sm-3">
						<label for="event">Event Date</label>
					</div>
					<div class="col-sm-3">
						<label for="max_part">Max Participation</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<input type="text" class="form-control" name="sessionStart[]" placeholder="Eg. 1300 pm" />
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="sessionEnd[]" placeholder="Eg. 1400 pm" />
					</div>
					<div class="col-sm-3">
						<input class="form-control" id="datepicker2" type="text" name="eventDate[]" />
					</div>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="maxPart[]" />
					</div>
				</div>
				<div id="extender">
				</div>
			  </div><br>
			  <div class="form-group">
				<label for="eventDesc">Event Category</label>
				<div class="row">
					<div class="col-md-3">
						<select class="form-control" name="eventCategory">
						  <option value="select" selected="disabled">Please select category</option>
						  <?php
							$sqli = mysqli_query($conn, "SELECT event_category FROM created_event WHERE EID=$id");
							$rowi = mysqli_num_rows($sqli);
							while ($rowi = mysqli_fetch_array($sqli)){
								if($rowi['event_category'] == "Animals"){
									echo '<option value="Animals" selected>Animals</option>
										  <option value="Environmental">Environmental</option>
										  <option value="Disabled">Disabled</option>
										  <option value="Community">Community</option>
										  <option value="Educational">Educational</option>
										  <option value="Arts and Culture">Arts and Culture</option>';
								}
								else if($rowi['event_category'] == "Environmental"){
									echo '<option value="Animals">Animals</option>
										  <option value="Environmental" selected>Environmental</option>
										  <option value="Disabled">Disabled</option>
										  <option value="Community">Community</option>
										  <option value="Educational">Educational</option>
										  <option value="Arts and Culture">Arts and Culture</option>';
								}
								else if($rowi['event_category'] == "Disabled"){
									echo '<option value="Animals">Animals</option>
										  <option value="Environmental">Environmental</option>
										  <option value="Disabled" selected>Disabled</option>
										  <option value="Community">Community</option>
										  <option value="Educational">Educational</option>
										  <option value="Arts and Culture">Arts and Culture</option>';
								}
								else if($rowi['event_category'] == "Community"){
									echo '<option value="Animals">Animals</option>
										  <option value="Environmental">Environmental</option>
										  <option value="Disabled">Disabled</option>
										  <option value="Community" selected>Community</option>
										  <option value="Educational">Educational</option>
										  <option value="Arts and Culture">Arts and Culture</option>';
								}
								else if($rowi['event_category'] == "Educational"){
									echo '<option value="Animals">Animals</option>
										  <option value="Environmental">Environmental</option>
										  <option value="Disabled">Disabled</option>
										  <option value="Community">Community</option>
										  <option value="Educational" selected>Educational</option>
										  <option value="Arts and Culture">Arts and Culture</option>';
								}
								else if($rowi['event_category'] == "Arts and Culture"){
									echo '<option value="Animals">Animals</option>
										  <option value="Environmental">Environmental</option>
										  <option value="Disabled">Disabled</option>
										  <option value="Community">Community</option>
										  <option value="Educational">Educational</option>
										  <option value="Arts and Culture" selected>Arts and Culture</option>';
								}
							}
						  ?>
						</select>
					</div>
				</div>
			  </div>
			  <div class="form-group">
				<label for="eventDesc">Event Description</label>
				<div class="row">
					<div class="col-md-6">
						<textarea class="form-control" rows="5" name="eventDesc"><?php echo $eventDesc ?></textarea>
					</div>
				</div>
			  </div>
			  <br>
			  <button type="submit" class="btn btn-default btn-danger" id="update" name="update" value="update">Edit</button>
			</form>
		  </div>

		<!-- End page content -->
		</div>
		<?php
		 mysqli_close($conn);
		?>
  </div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>
