/* Sign in redirect */
function signedIn() {
	location.href="Volunteer/Home.php";
}

/* Sign out redirect */
function signedOut() {
	location.href="Login.php";
}

// Script to open and close sidebar
function w3_open() {
	document.getElementById("mySidebar").style.display = "block";
	document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
	document.getElementById("mySidebar").style.display = "none";
	document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
	document.getElementById("img01").src = element.src;
	document.getElementById("modal01").style.display = "block";
	var captionText = document.getElementById("caption");
	captionText.innerHTML = element.alt;
}

// For date
$(function () {
	$('#datetimepicker6').datetimepicker();
	$('#datetimepicker7').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
	$("#datetimepicker6").on("dp.change", function (e) {
		$('#datetimepicker7').data("DateTimePicker").minDate(e.date);
	});
	$("#datetimepicker7").on("dp.change", function (e) {
		$('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
	});
});

// For Dropdown
function dropdown(val) {
  var y = document.getElementsByClassName('btn btn-danger dropdown-toggle');
  //var aNode = y[0].innerHTML = val + ' <span class="caret"></span>'; // Append 
}


/* Currently no need */
/*$(document).ready(function() {
  $('body').addClass('js');
  var $menu = $('#menu'),
    $menulink = $('.menu-link');
  
$menulink.click(function() {
  $menulink.toggleClass('active');
  $menu.toggleClass('active');
  return false;
});});*/