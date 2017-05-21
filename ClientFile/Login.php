
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="CSS/style.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>-->

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="CSS/style.css">

	<title>Volunteer Scheduling Application</title>
  </head>
  <body>
  	<div class="container">
  		<img src="" >
  		<p style="text-align:center">Image here</p>
  	</div>
	<div class="container" style="text-align:center">
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<label for="username">Username</label>
			<br/>
			<input type="text" id="username">
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" id="password">
			<br/>
			<button type="submit">Sign In</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button type="button" data-toggle="modal" data-target="#myModalReg">Sign Up</button>
			<br/>
			<a href="#" data-toggle="modal" data-target="#myModal"><p class="small">Forgot your password?</p></a>
		</div>
	</div>
	<!-- Modal for password-->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Forgot your password?</h4>
	      </div>
	      <div class="modal-body">
	      	<table>
	      		<tr>
	      			<td>Enter Email</td>
	      			<td>&nbsp;</td>
	      			<td>&nbsp;</td>
	      			<td>&nbsp;</td>
	      			<td><input type="text" id="username"></td>
	      		</tr>
	      	</table>
	      	<button type="button" class="btn btn-primary">Send</button>
	      </div>
	    </div>

	  </div>

	  <!-- Modal for registeration -->
	  <div id="myModalReg" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Forgot your password?</h4>
	      </div>
	      <div class="modal-body">
	      	<table>
	      		<tr>
	      			<td>Enter Email</td>
	      			<td>&nbsp;</td>
	      			<td>&nbsp;</td>
	      			<td>&nbsp;</td>
	      			<td><input type="text" id="username"></td>
	      		</tr>
	      	</table>
	      	<button type="button" class="btn btn-primary">Send</button>
	      </div>
	    </div>

	  </div>

	</div>
  </body>
</html>
