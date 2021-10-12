<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['name'])&& isset($_SESSION['email'])&& isset($_SESSION['code'])&& isset($_SESSION['position'])&& isset($_SESSION['status'])) {
include 'backend/connection.php';
include 'components/head.php';
$city_select=mysqli_query($connection,"SELECT city FROM city");
$author= $_SESSION['code'];
$vehicle_select=mysqli_query($connection,"SELECT plate_no FROM vehicle WHERE author_code='$author' AND status = 'Active' ORDER BY vehicle_id ASC");?>
<link rel="stylesheet" href="assets/css/style.css">
<?php include 'components/navbar_dashboard.php';?>
<script src="assets/js/jquery-3.5.1.slim.min.js"></script>
<body>
  <!-- Log out -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header"style="background-color:#FFE7A1">
        <h2 class="modal-title" id="logoutModalLongTitle">Log out</h2>
      </div>
      <div class="modal-body text-center"style="background-color:#FFE7A2;">
      <h4 >Are you sure want to log out, <?php echo $_SESSION['name'];?>?</h4>
      </div>
      <div class="modal-footer"style="background-color:#FFE7A1">
          <a href="backend/logout"><button type="button" class="btn btn-sm btn-warning text-white">Yes</button></a>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">NO</button>
      </div>
    </div>
  </div>
</div>
<!----------------------------------------------------------------------------->
<div class="row">
    <div class="col-sm-3">
      <a href="riderdashboard">Dashboard</a>: Post an offer   
     </div>
</div>
<div class="row">
    <div class="col-2">
      
    </div>
    <div class="col-8">
       <!------------------------------>
    <?php if (isset($_GET['message_failed'])) { ?>
    <div class="alert alert-warning" role="alert">
      <h4 class="alert-heading">Sorry</h4>
      <hr>
      <p><?php echo $_GET['message_failed']; ?></p>
    </div>
    <?php } ?>
    <!----------------------------->
    <!------------------------------>
    <?php if (isset($_GET['message_success'])) { ?>
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Successful</h4>
      <hr>
      <p><?php echo $_GET['message_success']; ?></p>
    </div>
    <?php } ?>
    <!----------------------------->
      <div class="row">
        <div class="card">
            <div class="card-body">
            <h2 class="card-title text-center">Please input appropriate Info about Offer post </h2>
        <form action="backend/postaction"  method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="from">From:</label>
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="from" name="from">
          <?php foreach($city_select as $key => $value){ ?>
          <option value="<?= $value['city'];?>"><?= $value['city'];?></option>
          <?php } ?>
        </select>
        </div><br>
        <div class="form-group">
          <label for="to">To:</label>
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="to" name="to">
          <?php foreach($city_select as $key => $value){ ?>
          <option value="<?= $value['city'];?>"><?= $value['city'];?></option>
          <?php } ?>
        </select>
        </div><br>
        <div class="form-group">
          <label for="plate">Vehicle No:</label>
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="plate" name="plate">
          <?php foreach($vehicle_select as $key => $value){ ?>
          <option value="<?= $value['plate_no'];?>"><?= $value['plate_no'];?></option>
          <?php } ?>
        </select>
        </div><br>
        <div class="form-group">
        <label for="date">Journey Date:</label>
          <input type="date" class="form-control form-control-sm" id="date" name="date"  required>
        </div><br>
        <div class="form-group">
          <input type="number" class="form-control form-control-sm" id="seat" name="seat" placeholder="Total Seat" required>
        </div><br>
        <div class="form-group">
          <input type="text" class="form-control form-control-sm" id="price_per_seat" name="price_per_seat" placeholder="Price per Seat in BDT" required>
        </div><br>
        <div class="form-group">
          <input type="text" class="form-control form-control-sm" id="authorcode" name="authorcode" value="<?php echo  $_SESSION['code'];?>" hidden readonly>
        </div><br>
        <button type="submit" name="postoffer" id="postoffer" class="btn btn-secondary" style="border-radius: 15px;">Post your offer</button>
      </form>
            </div>
        </div>
        <div class="col-sm-2">
         
        </div>
      </div>
    </div>
  <!------------------------------>
<link rel="stylesheet" href="assets/css/style.css">
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/js/main_bootstrap.js"></script>
  </body>
</html>
<?php 
}else{
     header("Location: login");
     exit();
}
 ?>