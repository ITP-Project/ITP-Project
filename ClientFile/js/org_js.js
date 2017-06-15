// DateTime
$(function () {
	$('#datetimepicker1').datetimepicker({
		format:'YYYY-MM-DD'
	});
	$('#datetimepicker2').datetimepicker({
		format: 'LT'
	});
	$('#datetimepicker3').datetimepicker({
		format: 'LT'
	});
	$('#datetimepicker4').datetimepicker({
		format: 'LT'
	});
	$('#datetimepicker5').datetimepicker({
		format: 'LT'
	});
	$('#datetimepicker6').datetimepicker({
		format: 'LT'
	});
	$('#datetimepicker7').datetimepicker({
		format: 'LT'
	});
});

// Redirect to create
function create(){
	window.location.href = "CharityEventCreate.php";
}

//Dynamically add textbox
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
	
    var x = 1; //initlal text box count
	
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div>' +
					  '<div class="row">' + 
						'<div class="col-sm-3">' +
							'<label for="sessionOne">Session Start Date</label>' +
						'</div>' +
						'<div class="col-sm-3">' +
							'<label for="sessionOne">Session End Date</label>' +
						'</div>' +
					  '</div>' +
					  '<div class="row">' +
						'<div class="col-sm-3">' +
							'<input type="text" class="form-control" name="sessionOneStart" placeholder="Eg. 1300 pm"/>' +
						'</div>' +
						'<div class="col-sm-3">' +
							'<input type="text" class="form-control" name="sessionOneEnd" placeholder="Eg. 1400 pm"/>' +
						'</div>' +
					  '</div>' +
				  '<a href="#" class="remove_field">Remove</a></div>'); //add input box

        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

//Dynamically add textbox
// FormGet Online Form Builder JS Code
// Creating and Adding Dynamic Form Elements.
var i = 1; // Global Variable for Name
var j = 1; // Global Variable for E-mail
/*
=================
Creating Text Box for name field in the Form.
=================
*/
function sessionBoxCreate(){
var y = document.createElement("INPUT");
y.setAttribute("type", "text");
y.setAttribute("Placeholder", "Name_" + i);
y.setAttribute("Name", "Name_" + i);

document.getElementById("myForm").appendChild(y);
i++;
}
/*
=================
Creating Text Box for email field in the Form.
=================
*/
function emailBoxCreate(){
var y = document.createElement("INPUT");
var t = document.createTextNode("Email");
y.appendChild(t);
y.setAttribute("Placeholder", "Email_" + j);
y.setAttribute("Name", "Email_" + j);
document.getElementById("myForm").appendChild(y);
j++;
}
