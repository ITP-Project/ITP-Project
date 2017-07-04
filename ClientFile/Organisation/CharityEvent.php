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
</head>
<script>
function togglecheckboxes(master,group){
	var cbarray = document.getElementsByClassName(group);
	for(var i = 0; i < cbarray.length; i++){
		var cb = document.getElementById(cbarray[i].id);
		cb.checked = master.checked;
	}
}
// Redirect to create
function create(){
	window.location.href = "CharityEventCreate.php";
}
</script>
<body>
	<!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left:340px;margin-right:40px">

		<!-- Setting -->
		<div class="w3-container" id="contact" style="margin-top:75px">
			<h1 class="w3-xxxlarge w3-text-red"><b>Events Management</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
			
			<button type="button" class="btn btn-danger" id="createBtn" onclick="create()">Create</button><hr>
			
			<div class="table-responsive">
				<table id="event_data" class="table table-striped table-bordered">  
                    <thead>  
                        <tr>
							<td class="hidden">Event ID</td>
                            <td>Event Name</td>  
                            <td>Event Start Date</td>  
                            <td>Event End Date</td>  
                            <td>Event Location</td>  
                            <td>Event Description</td>
							<td>Event Category</td>
							<td></td>
                        </tr>  
                    </thead>  
					<?php  
						$eventAdmin = $_SESSION['USERNAME']; 
						if($result = $conn->query("SELECT * FROM created_event WHERE created_by = '$eventAdmin' ORDER BY EID  ")) {
							while($row = mysqli_fetch_array($result))  
							{  
								echo '  
									<tr id="'.$row["EID"].'">
										<td class="hidden">'.$row["EID"].'</td> 
										<td>'.$row["event_name"].'</td>  
										<td>'.$row["event_startDate"].'</td>  
										<td>'.$row["event_endDate"].'</td>  
										<td>'.$row["event_location"].'</td>  
										<td>'.$row["event_desc"].'</td>
										<td>'.$row["event_category"].'</td>
										<td>
											<a href="CharityEventUpdate.php?id=' . $row["EID"] . '"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
											<a id="duplicate_btn" href="CharityEventDuplicate.php?id=' . $row["EID"] . '"><span class="glyphicon glyphicon-plus"></span></a>&nbsp;
											<input type="checkbox" name="event_id[]" class="delete_customer" value="'.$row["EID"].'" />
										</td>
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
			<hr>
			<button type="button" name="btn_delete" id="btn_delete" class="btn btn-danger">Delete</button>
		</div>
	  <!-- End page content -->
	</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>

<script>  
 $(document).ready(function(){  
      $('#event_data').DataTable();  
 });  
 
$(document).ready(function(){
 
 $('#btn_delete').click(function(){
  
  if(confirm("Are you sure you want to delete this?"))
  {
   var id = [];
   
   $(':checkbox:checked').each(function(i){
    id[i] = $(this).val();
   });
   
   if(id.length === 0) //tell you if the array is empty
   {
    alert("Please Select atleast one checkbox");
   }
   else
   {
    $.ajax({
     url:'CharityEventDelete_process.php',
     method:'POST',
     data:{id:id},
     success:function()
     {
      for(var i=0; i<id.length; i++)
      {
       $('tr#'+id[i]+'').css('background-color', '#ccc');
       $('tr#'+id[i]+'').fadeOut('slow');
      }
     }
     
    });
   }
   
  }
  else
  {
   return false;
  }
 });
 
});
 </script>
