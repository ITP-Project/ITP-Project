<!DOCTYPE html>
<html>
<head>
<?php 
include '../header.php';
include '../dconfig.php';
include 'navbar.php';
include 'CharityEventCreate_process.php';
?>
</head>
<body>
  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:340px;margin-right:40px">

		<!-- Setting -->
		<div class="w3-container" id="contact" style="margin-top:75px">
		  <h1 class="w3-xxxlarge w3-text-red"><b>Events Management</b></h1>
		  <hr style="width:50px;border:5px solid red" class="w3-round">
		  
		  <div class="w3-section">
			<form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
			  <!--<div class="form-group">
				<label for="eventHost">Event Host</label>
				<div class="row">
					<div class='col-md-6'>
						<input type="text" class="form-control" name="eventHost">
					</div>
				</div>
			  </div>-->
			  <div class="form-group">
				<label for="eventName">Event Name</label>
				<div class="row">
					<div class='col-md-6'>
						<input type="text" class="form-control" name="eventName" >
					</div>
				</div>
			  </div>
			  <div class="form-group">
				<label for="eventLocation">Event Location</label>
				<div class="row">
					<div class="col-md-6">
						<input type="text" class="form-control" name="eventLocation" >
					</div>
				</div>
			  </div>
			  <div class="form-group">
				<label for="eventDate">Event Date</label>
				<div class="row">
					<div class="col-md-6">
						<div class='input-group date' id='datetimepicker1'>
							<input type='text' class="form-control" name="eventDate"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar">
								</span>
							</span>
						</div>
					</div>
				</div>
			  </div>
			  <div class="form-group">
				<label for="eventSession">Event Session/s</label>
			  </div>
			  <button class="add_field_button btn btn-info">Add More Fields</button>
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
				<label for="volunteerNum">Max Volunteer Number</label>
				<div class="row">
					<div class="col-md-6">
						<input type="text" class="form-control" name="max_participants" >
					</div>
				</div>
			  </div>
			  <!--<div class="form-group">
				<label for="eventPic">Event Image</label>
				<div class="row">
					<div class="col-md-6">
						<div id="filediv">
							<input name="files_P" type="file" id="file" onchange="setfilename(this.value);"/>
							<input type="hidden" name="filename" id="filename" />
						</div>
					</div>
				</div>
			  </div>-->
			  <div class="form-group">
				<label for="eventDesc">Event Description</label>
				<div class="row">
					<div class="col-md-6">
						<textarea class="form-control" rows="5" name="eventDesc"></textarea>
					</div>
				</div>
			  </div>
			  <br>
			  <button type="submit" class="btn btn-default" name="create" value="create">Create</button>
			</form>
		  </div>
		  
		  <?php
			mysql_close($con);
		  ?>

		<!-- End page content -->
		</div>
  </div>

  <!-- W3.CSS Container -->
  <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>
