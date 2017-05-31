<!DOCTYPE html>
<html>
<?php include '../header.php' ?>
<body>
  <?php include 'navbar.php' ?>
  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:340px;margin-right:40px">

    <!-- Statistics -->
    <div class="w3-container" id="contact" style="margin-top:75px">
      <h1 class="w3-xxxlarge w3-text-red"><b>Statistics</b></h1>
      <hr style="width:50px;border:5px solid red" class="w3-round">
      <p>Check your statistics here!</p>
      <div class="w3-row-padding">
        <div class="w3-half">
          <label id="cp">Total CIP Hours</label>
          <hr>
          <p id="cipHour">15</p>
        </div>
      </div>
      <div class="w3-row-padding">
        <div class="w3-half">
          <label id="ep">Events participated</label>
          <hr>
          <table class="table table-hover table-responsive tab-pane fade in active" id="grp1">
            <thead>
              <tr>
                <th>Event</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Clean the House</td>
                <td>25/05/2017</td>
              </tr>
              <tr>
                <td>Clean the House</td>
                <td>25/05/2017</td>
              </tr>
              <tr>
                <td>Clean the House</td>
                <td>25/05/2017</td>
              </tr>
            </tbody>
          </table>
          <button type="button" class="btn btn-danger w3-display-bottom">Print Certificate</button>
        </div>
      </div>
    </div>

    <!-- End page content -->
  </div>

  <!-- W3.CSS Container -->
  <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>
