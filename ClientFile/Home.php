<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Css / Javascript -->
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
  <link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="js/main.js"></script>


  <title>Volunteer Scheduling Application</title>
</head>
<body>
  <div class="container">
    <img src="img/MatchIt_Logo.jpeg" alt="Match It" style="padding-left:15%;"/>
  </div>
 <div class="container">
  <div class="row">
    <h3>Volunteer Scheduling Application</h3>
    <ul class="nav nav-pills">
      <li class="active"><a data-toggle="pill" href="#home">Home</a></li>
      <li><a data-toggle="pill" href="#viewStats">View Statistics</a></li>
      <li><a data-toggle="pill" href="#viewGrp">View Group</a></li>
      <li><a data-toggle="pill" href="#viewSetting">Settings</a></li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>HOME</h3>
        <p>Display all events and upcoming events</p>
      </div>
      <div id="viewStats" class="tab-pane fade">
        <h3>View Statistics</h3>
        <p>Display Statistics</p>
      </div>
      <div id="viewGrp" class="tab-pane fade">
        <h3>View Group</h3>
        <p>Display all joined groups</p>
      </div>
      <div id="viewSetting" class="tab-pane fade">
        <h3>Settings</h3>
        <table>
          <tr>
            <td>Old Password&nbsp;</td>
            <td>&nbsp;<input type="text" id="oldPwd"></td>
          </tr>
          <tr>
            <td>New Password&nbsp;</td>
            <td>&nbsp;<input type="text" id="newPwd"></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  </div>
</div>
</body>
</html>
