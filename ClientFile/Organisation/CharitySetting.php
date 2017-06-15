<!DOCTYPE html>
<html>
<?php include '../header.php' ?>
<body>
  <?php include 'navbar.php' ?>
  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:340px;margin-right:40px">

    <!-- Setting -->
    <div class="w3-container" id="contact" style="margin-top:75px">
      <h1 class="w3-xxxlarge w3-text-red"><b>Setting</b></h1>
      <hr style="width:50px;border:5px solid red" class="w3-round">
      <form action="Home2.php" target="_blank">
        <div class="w3-section">
          <label>Current Password</label>
          <input class="w3-input w3-border" type="text" name="cPassword" required>
        </div>
        <div class="w3-section">
          <label>New Password</label>
          <input class="w3-input w3-border" type="password" name="nPassword" required>
        </div>
        <button type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom">Save</button>
      </form>  
    </div>

    <!-- End page content -->
  </div>

  <!-- W3.CSS Container -->
  <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>
