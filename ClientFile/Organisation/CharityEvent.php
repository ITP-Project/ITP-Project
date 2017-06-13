<!DOCTYPE html>
<html>
<head>
	<?php 
	include '../header.php';
	include 'navbar.php';
	include '../dconfig.php';
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

			<button type="button" class="btn btn-danger" id="createBtn" onclick="create()">Create</button>
			
			<div class="w3-section">
				<?php
								// number of results to show per page
				$per_page = 5;
				
								// figure out the total pages in the database
				$result = mysql_query("SELECT * FROM event");
				$total_results = mysql_num_rows($result);
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
				
								// display pagination
				
				echo "<p><b>View Page:</b> ";
				for ($i = 1; $i <= $total_pages; $i++)
				{
					echo "<a href='CharityEvent.php?page=$i'>$i</a> ";
				}
				echo "</p>";
				
								// display data in table
				echo '<table class="table-striped">';
				echo "<tr><th hidden></th><th>Event Name</th><th>Event Location</th><th>Volunteer Number</th><th>Event Description</th><th></th></tr>";

								// loop through results of database query, displaying them in the table	
				for ($i = $start; $i < $end; $i++)
				{
									// make sure that PHP doesn't try to show results that don't exist
					if ($i == $total_results) { break; }
					
									// echo out the contents of each row into a table
					echo "<tr>";
					echo '<td hidden>' . mysql_result($result, $i, 'eventID') . '</td>';
					echo '<td style="width: 300px; height:50px;">' . mysql_result($result, $i, 'eventName') . '</td>';
					echo '<td style="width: 300px;">' . mysql_result($result, $i, 'eventLocation') . '</td>';
					//echo '<td style="width: 500px;">' . mysql_result($result, $i, 'eventSession1') . '</td>';
					//echo '<td style="width: 400px;">' . mysql_result($result, $i, 'eventSession2') . '</td>';
					echo '<td style="width: 200px;">' . mysql_result($result, $i, 'volNum') . '</td>';
					echo '<td style="width: 400px;">' . mysql_result($result, $i, 'eventDesc') . '</td>';
					echo '<td style="width: 200px;">
					<a class="btn btn-danger" href="CharityEventUpdate.php?id=' . mysql_result($result, $i, 'eventID') . '">Update</a>
					<a class="btn btn-danger" href="CharityEventDelete_process.php?id=' . mysql_result($result, $i, 'eventID') . '">Delete</a>
					</td>';
					echo "</tr>"; 
				}
								// close table>
				echo "</table>"; 
				?>
			</div>
		</div>
	  <!-- End page content -->
	</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>
