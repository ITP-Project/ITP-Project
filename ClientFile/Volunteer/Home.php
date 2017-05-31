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

    <!-- Current Events -->
    <div class="w3-container" id="cEvent" style="margin-top:75px">
      <h1 class="w3-xxxlarge w3-text-red"><b>Current Events</b></h1>
      <hr style="width:50px;border:5px solid red" class="w3-round">
      <p>Come join us today!</p>
      <p>Words or Picture here</p>
      <a href="#">Register here!</a>
    </div>

    <!-- Statistics -->
    <div class="w3-container" id="stats" style="margin-top:75px">
      <h1 class="w3-xxxlarge w3-text-red"><b>Statistics</b></h1>
      <hr style="width:50px;border:5px solid red" class="w3-round">
      <table class="table table-hover table-responsive">
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

    <!-- Total CIP Hours -->
    <div class="w3-row-padding w3-grayscale">
      <div class="w3-col m4 w3-margin-bottom">
        <div class="w3-light-grey">
          <div class="w3-container">
            <h3>John Doe</h3>
            <p class="w3-opacity">Total CIP Hours Accumulated</p>
            <p>24</p>
            <a href="Statistics.php">View More...</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Groups -->
    <div class="w3-container" id="groups" style="margin-top:75px">
      <h1 class="w3-xxxlarge w3-text-red"><b>Groups</b></h1>
      <hr style="width:50px;border:5px solid red" class="w3-round">
    </div>

    <div class="w3-row-padding">
      <div class="w3-half w3-margin-bottom">
        <ul class="w3-ul w3-light-grey w3-center">
          <li class="w3-dark-grey w3-xlarge w3-padding-32">Organisation 1</li>
          <li class="w3-padding-16">Members <a href="Groups.php">10/100</a></li>
          <li class="w3-padding-16">Events Participating
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img src="../img/charityEvent_1.jpeg" alt="Los Angeles" style="width:100%;">
                </div>

                <div class="item">
                  <img src="../img/charityEvent_2.jpeg" alt="Chicago" style="width:100%;">
                </div>

                <div class="item">
                  <img src="../img/charityEvent_3.jpeg" alt="New york" style="width:100%;">
                </div>
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </li>
        </ul>
      </div>

      <div class="w3-half">
        <ul class="w3-ul w3-light-grey w3-center">
          <li class="w3-red w3-xlarge w3-padding-32">Organisation 2</li>
          <li class="w3-padding-16">Members <a href="Groups.php">10/10</a></li>
        </ul>
      </div>
    </div>

    <!-- End page content -->
  </div>

  <!-- W3.CSS Container -->
  <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"></div>

</body>
</html>
