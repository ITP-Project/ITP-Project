<!DOCTYPE html>
<html>
<?php 
include '../header.php';
include 'navbar.php';
include '../dconfig.php';
?>
<!-- Table Data -->
           
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

<body>
	<!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left:340px;margin-right:40px">

		<!-- Setting -->
		<div class="w3-container" id="contact" style="margin-top:75px">
			<h1 class="w3-xxxlarge w3-text-red"><b>Volunteers</b></h1>
		    <hr style="width:50px;border:5px solid red" class="w3-round">
			<?php
				$result = $conn->query("SELECT * FROM acc_volunteer");
				$count = $result->num_rows;
			?>
			<div class="w3-container">
				<div class="input-daterange">
					<!--<div class="col-md-3">
						<select class="form-control">
							<option>Organisation Name</option>
						</select>
					</div>-->
					<div class="col-md-3">
						<input type="text" name="start_date" id="start_date" class="form-control" />
					</div>
					<div class="col-md-3">
						<input type="text" name="end_date" id="end_date" class="form-control" />
					</div>
				</div>
				<div class="col-md-3">
					<input type="button" name="search" id="search" value="Search" class="btn btn-danger" />
				</div>
			</div>
			<hr>
			<div class="table-responsive">
				<table id="volunteer_data" class="table table-striped table-bordered">  
                    <thead>  
                        <tr>
							<td class="hidden">Volunteer ID</td>
                            <td>Name</td>  
                            <td>Email</td>  
                            <td>NRIC</td>  
                            <td>Organisation Name</td>  
                            <td>UEN</td>
							<td>Nationality</td>
                        </tr>  
                    </thead>  
					<?php
						
						if($count > 0) {
							while($row = mysqli_fetch_array($result))  
							{  
								echo '  
									<tr>
										<td class="hidden">'.$row["AID"].'</td> 
										<td>'.$row["name"].'</td>  
										<td>'.$row["email"].'</td>  
										<td>'.$row["nric"].'</td>  
										<td>'.$row["org_name"].'</td>  
										<td>'.$row["uen"].'</td>
										<td>'.$row["nationality"].'</td>	
								   </tr>  
								   ';  
							}
						}
						else {
							echo 'No event to be displayed!';
						}
						
						//$conn->close();
                    ?>
					
                </table>
			</div>
			<hr>
			<button type="button" class="btn btn-danger" id="bookBtn" onclick="book()">Book Volunteer/s</button>
		</div>
    <!-- End page content -->
    </div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>
<script>  
 $(document).ready(function(){  
      $('#volunteer_data').DataTable();  
 });
 
$(document).ready(function(){
 
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });

 fetch_data('no');

 function fetch_data(is_date_search, start_date='', end_date='')
 {
  var dataTable = $('#order_data').DataTable({
   "processing" : true,
   "serverSide" : true,
   "order" : [],
   "ajax" : {
    url:"fetch.php",
    type:"POST",
    data:{
     is_date_search:is_date_search, start_date:start_date, end_date:end_date
    }
   }
  });
 }

 $('#search').click(function(){
  var start_date = $('#start_date').val();
  var end_date = $('#end_date').val();
  if(start_date != '' && end_date !='')
  {
   $('#order_data').DataTable().destroy();
   fetch_data('yes', start_date, end_date);
  }
  else
  {
   alert("Both Date is Required");
  }
 }); 
 
});
 </script>