<!DOCTYPE html>
<html>
<?php 
include '../header.php';
include 'navbar.php';
include '../dconfig.php'; 
?>

<body>
  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:340px;margin-right:40px">

    <!-- Header -->
    <div class="w3-container" style="margin-top:80px" id="uEvent">
      <h1 class="w3-xxxlarge w3-text-red"><b>All Events</b></h1>
      <hr style="width:50px;border:5px solid red" class="w3-round">
    </div>
	
	<div class="w3-container ">
		<div class="w3-row-padding">
			<?php
			$result = $conn->query("SELECT * FROM created_event");
			while($row = $result->fetch_assoc()){
				$eventID = $row['EID'];
				$eventName = $row['event_name'];
				$eventLocation = $row['event_location'];
				$eventStartDate = $row['event_startDate'];
				$eventEndDate = $row['event_endDate'];
				$eventDesc = $row['event_desc'];
				$eventCategory = $row['event_category'];
				
				
			echo '<div class="col-lg-6 col-md-4">';
			echo '<div class="thumbnail">';
			echo '<div class="caption">';
			echo '<p><strong>Event Name: </strong>'.$eventName.'</p>';
			echo '<p><strong>Event Category: </strong>'.$eventCategory.'</p>';
			echo '<p><strong>Event Location: </strong>'.$eventLocation.'</p>';
			echo '<p><strong>Event Date: </strong>'.$eventStartDate.' <strong>to</strong> '.$eventEndDate.'</p>';
			echo '<p><strong>Event Description: </strong>'.$eventDesc.'</p>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			}
		?>
		</div>
	</div>

	<div class="w3-container ">
		<div class="w3-row-padding">
			<h1 class="w3-xxxlarge w3-text-red"><b>Company Events</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
			<?php
			$result = $conn->query("SELECT C.*, A.name FROM created_event C, acc_organization A WHERE A.email = C.created_by");
			while($row = $result->fetch_assoc()){
				$eventID = $row['EID'];
				$eventName = $row['event_name'];
				$eventLocation = $row['event_location'];
				$eventStartDate = $row['event_startDate'];
				$eventEndDate = $row['event_endDate'];
				$eventDesc = $row['event_desc'];
				$eventCategory = $row['event_category'];
				$eventAdmin = $row['name'];
				
			echo '<div class="col-lg-6 col-md-4">';
			echo '<div class="thumbnail">';
			echo '<div class="caption">';
			echo '<p><strong>Event Name: </strong>'.$eventName.'</p>';
			echo '<p><strong>Event Category: </strong>'.$eventCategory.'</p>';
			echo '<p><strong>Event Location: </strong>'.$eventLocation.'</p>';
			echo '<p><strong>Event Date: </strong>'.$eventStartDate.' <strong>to</strong> '.$eventEndDate.'</p>';
			echo '<p><strong>Event Description: </strong>'.$eventDesc.'</p>';
			echo '<p><strong>Event Administrator: </strong>'.$eventAdmin.'</p>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			}
		?>
		</div>
	</div>
	
	<div class="w3-container ">
		<div class="w3-row-padding">
			<h1 class="w3-xxxlarge w3-text-red"><b>Own Events</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
			<?php
			$result = $conn->query("SELECT * FROM created_event WHERE created_by = '$eventAdmin'");
			while($row = $result->fetch_assoc()){
				$eventID = $row['EID'];
				$eventName = $row['event_name'];
				$eventLocation = $row['event_location'];
				$eventStartDate = $row['event_startDate'];
				$eventEndDate = $row['event_endDate'];
				$eventDesc = $row['event_desc'];
				$eventCategory = $row['event_category'];
				
			echo '<div class="col-lg-6 col-md-4">';
			echo '<div class="thumbnail">';
			echo '<div class="caption">';
			echo '<p><strong>Event Name: </strong>'.$eventName.'</p>';
			echo '<p><strong>Event Category: </strong>'.$eventCategory.'</p>';
			echo '<p><strong>Event Location: </strong>'.$eventLocation.'</p>';
			echo '<p><strong>Event Date: </strong>'.$eventStartDate.' <strong>to</strong> '.$eventEndDate.'</p>';
			echo '<p><strong>Event Description: </strong>'.$eventDesc.'</p>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			}
		?>
		</div>
	</div>

    <!-- Modal for full size images on click-->
    <!--<div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
      <span class="w3-button w3-black w3-xxlarge w3-display-topright">×</span>
      <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
        <img id="img01" class="w3-image">
        <p id="caption"></p>
      </div>
    </div>-->
    <!-- End page content -->
  </div>
  
  <?php
	mysqli_close($conn);
  ?>

  <!-- W3.CSS Container -->
  <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>
