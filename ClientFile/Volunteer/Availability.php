<!DOCTYPE html>
<html>
<?php include '../header.php' ?>
<body>
  <?php include 'navbar.php' ?>
  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:340px;margin-right:40px">

    <!-- Availability -->
    <div class="w3-container" id="contact" style="margin-top:75px">
      <h1 class="w3-xxxlarge w3-text-red"><b>Availability</b></h1>
      <hr style="width:50px;border:5px solid red" class="w3-round">
      <p>Set your available dates here!</p>
      <form action="Home.php" target="_blank">
        <div class="w3-section">
          <div class='col-md-6'>
            <div class="form-group">
              <div class='input-group date' id='datetimepicker6'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
          </div>
          <div class='col-md-6'>
            <div class="form-group">
              <div class='input-group date' id='datetimepicker7'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="w3-section">

        </div>
        <button type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom">Set</button>
      </form>  
    </div>

    <!-- End page content -->
  </div>

  <!-- W3.CSS Container -->
  <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>
