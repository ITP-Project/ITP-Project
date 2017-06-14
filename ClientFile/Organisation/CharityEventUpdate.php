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
<body>
	<!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left:340px;margin-right:40px">

		<!-- Setting -->
		<div class="w3-container" id="contact" style="margin-top:75px">
			<h1 class="w3-xxxlarge w3-text-red"><b>Events Management</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
			
			<?php
				//for event
				$id=$_GET['id'];
				$sql = "select * from created_event where EID=$id";//prepare for SQL query statement
				$result = mysql_query($sql);
				//execute the SQL query to read out the data set from database table
				$num = mysql_numrows($result);//get the number of rows of the database table							
				$row = mysql_fetch_array($result);
				
				//for session
				$sqli = "SELECT * FROM event_shift WHERE EID=$id";
				$resulti = mysql_query($sqli);
				//execute the SQL query to read out the data set from database table
				$numi = mysql_numrows($resulti);//get the number of rows of the database table							
				$rowi = mysql_fetch_array($resulti);
			?>
			
			<div class="w3-section">
				<form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
			  <div class="form-group">
				<label for="eventName">Event Name</label>
				<div class="row">
					<div class='col-md-6'>
						<input type="hidden" name="EID" value="<?php echo $id?>">
						<input type="text" class="form-control" name="eventName" value="<?php echo $row['event_name'] ?>">
					</div>
					<span class="error"><?php echo $eventNameErr;?></span>
				</div>
			  </div>
			  <div class="form-group">
				<label for="eventLocation">Event Location</label>
				<div class="row">
					<div class="col-md-6">
						<input type="text" class="form-control" name="eventLocation" value="<?php echo $row['event_location'] ?>">
						<span class="error"><?php echo $eventLocationErr;?></span>
					</div>
				</div>
			  </div>
			  <div class="form-group">
				<label for="eventDate">Event Date</label>
				<div class="row">
					<div class="col-md-6">
						<div class='input-group date' id='datetimepicker1'>
							<input type='text' class="form-control" name="eventDate" value="<?php echo $row['event_date'] ?>"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar">
								</span>
							</span>
						</div>
					</div>
					<span class="error"><?php echo $eventDateErr;?></span>
				</div>
			  </div>
			  <div class="form-group">
				<label for="eventSession">Event Session/s</label>
			  </div>
			  <button class="add_field_button btn btn-danger">Add More Sessions</button>
			  <div class="form-group input_fields_wrap">
				  <div>
					  <div class="row">
						<div class="col-sm-3">
							<label for="sessionOne">Session Start Date</label>
						</div>
						<div class="col-sm-3">
							<label for="sessionOne">Session End Date</label>
						</div>
					  </div>
					  <div class="row">
						<div class='col-sm-3'>
							<input type='text' class="form-control" name="sessionOneStart" placeholder="Eg. 1300 pm"/>
						</div>
						<div class='col-sm-3'>
							<input type='text' class="form-control" name="sessionOneEnd" placeholder="Eg. 1400 pm"/>
						</div>
					  </div>
				  </div>
			  </div>
			  <div class="form-group">
				<label for="volunteerNum">Volunteer Number</label>
				<div class="row">
					<div class="col-md-6">
						<input type="text" class="form-control" name="max_participants" value="<?php echo $row['max_participants'] ?>">
						<span class="error"><?php echo $max_participantErr;?></span>
					</div>
				</div>
			  </div>
			  <div class="form-group">
				<label for="eventDesc">Event Description</label>
				<div class="row">
					<div class="col-md-6">
						<textarea class="form-control" rows="5" name="eventDesc"><?php echo $row['event_desc'] ?></textarea>
						<span class="error"><?php echo $eventDescErr;?></span>
					</div>
				</div>
			  </div>
			  <br>
			  <button type="submit" class="btn btn-default" name="update" value="update">Update</button>
			</form>
			</div>
		</div>
		
		<?php
			mysql_close($con);
		?>
		
	  <!-- End page content -->
	</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>
