<!DOCTYPE html>
<html>
<?php include '../header.php' ?>
<body>
  <?php include 'navbar.php' ?>
  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:340px;margin-right:40px">

    <!-- Groups -->
    <div class="w3-container" id="contact" style="margin-top:75px">
      <h1 class="w3-xxxlarge w3-text-red"><b>Organisation Groups</b></h1>
      <hr style="width:50px;border:5px solid red" class="w3-round">
      <p>Take a look at your groups here!</p>
      <div class="w3-section">
        <div class="dropdown">
          <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">Groups
            <span class="caret"></span></button>
            <button type="button" class="btn btn-danger pull-right">Invite</button>
            <ul class="dropdown-menu">
              <li><a data-toggle="pill" href="#grp1" onclick="dropdown(this.innerHTML);">Group 1</a></li>
              <li><a data-toggle="pill" href="#grp2" onclick="dropdown(this.innerHTML);">Group 2</a></li>
            </ul>
        </div><br>
        <div class="members pull-right">
          <p>No of Members: 10/100</p>
        </div>
        <table class="table table-hover table-responsive tab-pane fade in active" id="grp1">
          <thead>
            <tr>
              <th>Event</th>
              <th>Date</th>
              <th>No.of CIP Hours</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Clean the House</td>
              <td>25/05/2017</td>
              <td>4</td>
            </tr>
            <tr>
              <td>Clean the House</td>
              <td>25/05/2017</td>
              <td>4</td>
            </tr>
            <tr>
              <td>Clean the House</td>
              <td>25/05/2017</td>
              <td>4</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- End page content -->
  </div>

  <!-- W3.CSS Container -->
  <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>
