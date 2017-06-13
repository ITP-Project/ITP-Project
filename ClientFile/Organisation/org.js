$(document).ready(function(){

    var counter = 2;

    $("#addButton").click(function () {

  if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
  }

  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'dateGrp' + counter);

  newTextBoxDiv.after().html('<label>Event Date: </label>' + '<br>' + 
    '<input type="text" class="form-control" id="datetimepicker4" />');

  newTextBoxDiv.appendTo("#dateGrp");


  counter++;
     });

     $("#removeButton").click(function () {
  if(counter==1){
          alert("No more textbox to remove");
          return false;
       }

  counter--;

        $("#datetimepicker4" + counter).remove();

     });

     $("#getButtonValue").click(function () {

  var msg = '';
  for(i=1; i<counter; i++){
      msg += "<br>\n Event Date" + i + " : ";
  }
        alert(msg);
     });
  });

$(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
            });


