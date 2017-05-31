<!DOCTYPE html>
<html>
<?php include '../header.php' ?>
<body>
  <?php include 'navbar.php' ?>
  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:340px;margin-right:40px">

    <!-- Header -->
    <div class="w3-container" style="margin-top:80px" id="uEvent">
      <h1 class="w3-xxxlarge w3-text-red"><b>Upcoming Events</b></h1>
      <hr style="width:50px;border:5px solid red" class="w3-round">
    </div>

    <!-- Photo grid (modal) -->
    <div class="w3-row-padding">
      <div class="w3-half">
        <img src="../img/charityEvent_1.jpeg" style="width:100%" onclick="onClick(this)" alt="Charity Event 1">
        <img src="../img/charityEvent_3.jpeg" style="width:100%" onclick="onClick(this)" alt="Charity Event 3">
      </div>

      <div class="w3-half">
        <img src="../img/charityEvent_2.jpeg" style="width:100%" onclick="onClick(this)" alt="Windows for the atrium">
      </div>
    </div>

    <!-- Modal for full size images on click-->
    <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
      <span class="w3-button w3-black w3-xxlarge w3-display-topright">×</span>
      <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
        <img id="img01" class="w3-image">
        <p id="caption"></p>
      </div>
    </div>
    <!-- End page content -->
  </div>

  <!-- W3.CSS Container -->
  <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>
