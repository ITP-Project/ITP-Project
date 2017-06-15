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

