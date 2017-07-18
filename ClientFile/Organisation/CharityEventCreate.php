<!DOCTYPE html>
<html>
<head>
	<?php 
	include '../header.php';
	include '../dconfig.php';
	include 'navbar.php';
	include 'CharityEventCreate_process.php';
	?>
	<style>
		.error {color: #FF0000;}
	</style>
	<!-- Date -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
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
							'<input type="number" class="form-control"  min=0000 max=2359 name="sessionStart[]" placeholder="Eg. 0900 "/>' +
						'</div>' +
						'<div class="col-sm-3">' +
							'<input type="number" class="form-control"  min=0000 max=2359 name="sessionEnd[]" placeholder="Eg. 1400 "/>' +
						'</div>' +
						'<div class="col-sm-3">' +
							'<input type="text" class="datepicker3 form-control eventDate" name="eventDate[]" />' +
						'</div>' +
						'<div class="col-sm-2">' +
							'<input type="number" class="form-control" min=0 name="maxPart[]" />' +
							'<input type="text" class="hidden form-control" name="partCount[]" value="0"/>' +
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
    	$(this).datepicker('destroy').datepicker({dateFormat: "yy-mm-dd",showOn:'focus'}).focus();
    });

    $(document).on('click','.btn_remove', function(e){
    	e.preventDefault();
    	var button_id = $(this).attr("id");
    	$("#row"+button_id+"").remove();
    });

});

function modal(){
	//$('#myModal').modal('show');
	alert("test");
}

</script>
</head>
<body>
	<!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left:340px;margin-right:40px">
		<!-- Setting -->
		<div class="w3-container" id="contact" style="margin-top:75px">
			<h1 class="w3-xxxlarge w3-text-red"><b>Events Management</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
				<div class="w3-section">
					<form id="formfield" action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="eventName">Event Name</label>
							<div class="row">
								<div class='col-md-6'>
									<input type="text" class="form-control" name="eventName" id="eventName" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="eventLocation">Event Location</label>
							<div class="row">
								<div class="col-md-6">
									<input type="text" class="form-control" name="eventLocation" id="eventLocation" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="eventDate">Event Start Date</label>

									<input type = "text" id="datepicker" name="eventStartDate" class="form-control" >

								</div>
								<div class="col-md-3">
									<label for="eventDate">Event End Date</label>
									<input type = "text" id = "datepicker1" name="eventEndDate" class="form-control" >
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="eventSession">Event Session/s</label>
						</div>
						<button class="add_field_button btn btn-danger" id="add">Add More Fields</button>
						<div class="form-group input_fields_wrap">
							<div class="row">
								<div class="col-sm-3">
									<label for="sessionStart">Session Start Time</label>
								</div>
								<div class="col-sm-3">
									<label for="sessionEnd">Session End Time</label>
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
									<input type="number" class="form-control" min=0000 max=2359 name="sessionStart[]" placeholder="Eg. 0900 "/>
								</div>
								<div class="col-sm-3">
									<input type="number" class="form-control" min=0000 max=2359 name="sessionEnd[]" placeholder="Eg. 1400 "/>
								</div>
								<div class="col-sm-3">
									<input class="form-control" id="datepicker2" type="text" name="eventDate[]"/>
								</div>
								<div class="col-sm-2">
									<input type="number" min=0 class="form-control" name="maxPart[]"/>
									<input type="hidden" class="form-control" name="partCount[]" value="0"/>
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
										<option value="Animals">Animals</option>
										<option value="Environmental">Environmental</option>
										<option value="Disabled">Disabled</option>
										<option value="Community">Community</option>
										<option value="Educational">Educational</option>
										<option value="Arts and Culture">Arts and Culture</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="eventDesc">Event Description</label>
							<div class="row">
								<div class="col-md-6">
									<textarea class="form-control" rows="5" name="eventDesc"></textarea>
								</div>
							</div>
						</div>
					  <br>
					  <input type="submit" class="btn btn-danger" id="create" name="create" value="Create">
					  <?php echo $msg;
					  echo $Smsg;
					  ?>
					</form>
				</div>
			</div>
		<!-- End page content -->
	</div>
	
	<?php
		mysqli_close($conn);
	?>

	<!-- W3.CSS Container -->
	<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>
