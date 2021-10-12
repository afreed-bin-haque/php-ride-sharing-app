<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['name'])&& isset($_SESSION['email'])&& isset($_SESSION['code'])&& isset($_SESSION['position'])&& isset($_SESSION['status'])) {
include 'backend/connection.php';
$author_code= $_SESSION['code'];
 $query ="SELECT vehicle.*,DATE(datetime) as date FROM vehicle WHERE author_code='$author_code' ORDER BY 	vehicle_id DESC ";  
 $result = mysqli_query($connection, $query);  
include 'components/head.php';?>
<link rel="stylesheet" href="assets/css/style.css">
<?php include 'components/navbar_dashboard.php';?>
<script src="assets/js/jquery-3.5.1.slim.min.js"></script>
<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tableDetails tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
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
      <a href="riderdashboard">Dashboard</a>: Vehicle List
    </div>
</div>
<div class="row">
<div class="col-2">
      
      </div>
    <div class="col-8">
      <div class="row">
        <div class="card">
            <div class="card-body">
            <h2 class="card-title text-center">Your  Vehicle </h2>
            <input class="form-control me-2" id="search" type="search" placeholder="Search" aria-label="Search">
            <div class="table-responsive">
            <table class="table table-hover">
              <tbody id="tableDetails">
              <?php 
              if(mysqli_num_rows($result) === 0){?>
              <tr>
                <td>No Vehicle Registered</td> 
              </tr>
                <?php }
                else{
                  while($row = mysqli_fetch_array($result))  {?>
                <tr>
                <td>
                <div class="card mb-3" >
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="uploads/<?php echo $row['image']?>" class="img-fluid rounded-start" alt="<?php echo $row['model']?>">
                  </div>
                  <div class="col-md-8" style="background-color: #04AA6D;color:white">
                    <div class="card-body" >
                      <h5 class="card-title"><?php echo $row['model']?>
                      <?php $approvel = $row['status'];
                      if($approvel === 'Inactive'){?>
                      <span class="btn btn-warning btn-sm"><?php echo $row['status']?></span>
                      <?php }
                      else{?>
                      <span class="btn btn-primary btn-sm"><?php echo $row['status']?></span>
                      <?php }?>
                    </h5>
                      <p class="card-text"><?php echo $row['con']?></p>
                      <ul class="list-group list-group-flush" >
                    <li class="list-group-item">Plate No: <?php echo $row['plate_no']?></li>
                    <li class="list-group-item">Mileage: <?php echo $row['mileage']?></li>
                    <li class="list-group-item">Color: 
                    <div style="border:1px dashed #04AA6D;height: 50px;width: 50px;background-color: <?php echo $row['color']?>;"></div>
                  </li>
                  </ul>
                      <p class="card-text"><small>Added At: <?php echo $row['date']?></small></p>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            </tr>
                <?php }
                }?>
              </tbody>
           </table>
          </div>
            </div>
            <div class="col-2">

      </div>
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