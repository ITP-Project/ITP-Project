<html>
<head>
	<!-- Sidebar/menu -->
	<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
		<a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
		<div class="w3-container">
			<h3 class="w3-padding-64"><b>Match It!</b></h3>
		</div>
		<div class="w3-bar-block">
			<a href="Home.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
			<a href="#uEvent" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Upcoming Events</a> 
			<a href="CurrentEvents.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Events Joined</a> 
			<a href="Statistics.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Statistics</a> 
			<a href="Groups.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Groups</a>
			<a href="Availability.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Availability</a>
			<a href="Setting.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Setting</a><br>
			<a href="../Login.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Log Out</a>
		</div>
	</nav>

	<!-- Top menu on small screens -->
	<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
		<a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
		<span>Match It!</span>
	</header>

	<!-- Overlay effect when opening sidebar on small screens -->
	<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
</head>
</html>