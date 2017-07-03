<!DOCTYPE html>
<html>
<?php include '../header.php' ?>
<body>
  <?php include 'navbar.php' ;
  include 'CharitySetting_process.php';
  ?>
  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:340px;margin-right:40px">

    <!-- Setting -->
    <div class="w3-container" id="contact" style="margin-top:75px">
      <h1 class="w3-xxxlarge w3-text-red"><b>Setting</b></h1>
      <hr style="width:50px;border:5px solid red" class="w3-round">
      <form action="CharitySetting.php" method="post" role="form" data-toggle="validator">
        <div class="form-group">
          <label>Current Password</label>
          <input class="form-control" type="password" name="cPassword" required>
          <div class="help-block with-errors"></div>

        </div>
        <div class="form-group">
          <label>New Password</label>
          <input class="form-control" type="password" name="nPassword" data-minlength="6"  data-error="Must enter a minimum of 6 characters" required>
          <div class="help-block with-errors"></div>

        </div>

        <?php echo $msg; ?>
        <button type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom">Save</button>
      </form>  
    </div>

    <!-- End page content -->
  </div>

  <!-- W3.CSS Container -->
  <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>
