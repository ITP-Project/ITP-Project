
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="CSS/style.css">
  </head>
  <body>
  	<!--<div class="container-fluid">
  		<div>
		  <h1 id="logo">Joel's Logo</h1>
		  <p>This is some text.</p>
		</div>
	</div>-->
	<div class="jumbotron text-center">
	  <h1>Company Logo</h1>
	</div>

	<div class="container">
	  <div class="row">
	    <div class="col-xs-6 ">
	      <h3>Username</h3>
	    </div>
	    <div class="col-xs-6 ">
	    	<input type="text" class="form-control" id="usr">
	    </div>
	  </div>
	  <div class="row">
	  	<div class="col-xs-6">
	  		<h3>Password</h3>
	  	</div>
	  	<div class="col-xs-6">
	  		<input type="text" class="form-control" id="pwd">
	  	</div>
	  </div>
	  <!--Modal-->
	  <div class="row">
	  	<a href="#openModal">Forgot Password?</a>
	  	<div id="openModal" class="modalDialog">
			<div>
				<a href="#close" title="Close" class="close">X</a>
				<h2>Forgot your password?</h2>
				<p>Enter Email</p>
				<input type="text" class="form-control" id="email"><br>
				<button type="button" class="btn">Submit
			</div>
		</div>
	  </div>
	  <!--Login Button-->
	  <div class="row">
	  	<div class="col-xs-6">
	  		<button type="button" class="btn">Login
	  	</div>
	  	<div class="col-xs-6">
	  		<button type="button" class="btn">SignUp
	  	</div>
	  </div>
	</div>
  </body>
</html>
