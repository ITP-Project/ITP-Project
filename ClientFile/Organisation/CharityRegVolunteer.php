<!DOCTYPE html>
<html>
<?php include '../header.php' ?>
<body>
  <?php include 'navbar.php' ?>
  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:340px;margin-right:40px">

    <!-- Setting -->
    <div class="w3-container" id="contact" style="margin-top:75px">
      <h1 class="w3-xxxlarge w3-text-red"><b>Volunteers</b></h1>
      <hr style="width:50px;border:5px solid red" class="w3-round">
      <form action="" class="navbar-form navbar-left">
       <div class="input-group">
         <input type="Search" placeholder="Search by name" class="form-control" />
         <div class="input-group-btn">
          <button class="btn btn-danger">
           <span class="glyphicon glyphicon-search"></span>
         </button>
       </div>
     </div>
   </form>
   <div class="w3-section">
    <table class="table table-hover table-responsive tab-pane fade in active" id="grp1">
      <thead>
        <tr>
          <th>Name</th>
          <th>Race</th>
          <th>Nationality</th>
          <th>Date of Birth</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John Doe</td>
          <td>Chinese</td>
          <td>Singaporean</td>
          <td>18/02/1989</td>
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
