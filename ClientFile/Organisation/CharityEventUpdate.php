<!DOCTYPE html>
<html>
<head>
	<?php 
	include '../header.php';
	include 'navbar.php';
	include '../dconfig.php';
	include 'CharityEventUpdate_process.php';
	?>
	<script type="text/javascript" src="org.js"></script>
</head>
<body>
	<!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left:340px;margin-right:40px">

		<!-- Setting -->
		<div class="w3-container" id="contact" style="margin-top:75px">
			<h1 class="w3-xxxlarge w3-text-red"><b>Events Management</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
			
			<?php
				$id=$_GET['id'];
				$sql = "select * from created_event where EID=$id";//prepare for SQL query statement
				$result = mysql_query($sql);
				//execute the SQL query to read out the data set from database table
				$num=mysql_numrows($result);//get the number of rows of the database table							
				$row = mysql_fetch_array($result);
			?>
			
			<div class="w3-section">
				<form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
			  <div class="form-group">
				<label for="eventHost">Event Host</label>
				<div class="row">
					<div class='col-md-6'>
						<input type="hidden" name="eID" value="<?php echo $id?>">
						<input type="text" class="form-control" name="eventHost" value="<?php echo $row['eventHost'] ?>">
					</div>
			  </div>
			  </div>
			  <div class="form-group">
				<label for="eventName">Event Name</label>
				<div class="row">
					<div class='col-md-6'>
						<input type="text" class="form-control" name="eventName" value="<?php echo $row['eventName'] ?>">
					</div>
				</div>
			  </div>
			  <div class="form-group">
				<label for="eventLocation">Event Location</label>
				<div class="row">
					<div class="col-md-6">
						<input type="text" class="form-control" name="eventLocation" value="<?php echo $row['eventLocation'] ?>">
					</div>
				</div>
			  </div>
			  <div class="form-group">
				<label for="eventSession">Event Session/s</label>
			  </div>
			  <div class="form-group">
				<label for="sessionOne">Session 1</label>
				<div class="row">
					<div class='col-sm-6'>
						<input type='text' class="form-control" id='datetimepicker4' name="sessionOne" value="<?php echo $row['eventSession1'] ?>"/>
					</div>
				</div>
			  </div>
			  <div class="form-group">
				<label for="sessionTwo">Session 2</label>
				<div class="row">
					<div class="col-md-6">
						<input type="text" class="form-control" name="sessionTwo" value="<?php echo $row['eventSession2'] ?>">
					</div>
				</div>
			  </div>
			  <div class="form-group">
				<label for="volunteerNum">Volunteer Number</label>
				<div class="row">
					<div class="col-md-6">
						<input type="text" class="form-control" name="volunteerNum" value="<?php echo $row['volNum'] ?>">
					</div>
				</div>
			  </div>
			  <div class="form-group">
				<label for="eventPic">Event Image</label>
				<div class="row">
					<div class="col-md-6">
						<div id="filediv">
							<input name="files_P" type="file" id="file" onchange="setfilename(this.value);"/>
							<input type="hidden" name="filename" id="filename" />
						</div>
					</div>
				</div>
			  </div>
			  <div class="form-group">
				<label for="eventDesc">Event Description</label>
				<div class="row">
					<div class="col-md-6">
						<textarea class="form-control" rows="5" name="eventDesc"><?php echo $row['eventDesc'] ?></textarea>
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
