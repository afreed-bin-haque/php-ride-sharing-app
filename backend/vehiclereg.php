<?php require 'connection.php';
if(isset($_POST['vehiclereg'])){
  $query_vehicle="SELECT vehicle_id From vehicle ORDER BY vehicle_id DESC";
      $result=  mysqli_query($connection,$query_vehicle);
      $row= mysqli_fetch_array($result);
      $lastid=$row['vehicle_id'];
      if(empty($lastid)){
        $codevehicle= "Vehicle-0000001";
      }else{
        $id=str_replace("Vehicle-","",$lastid);
        $id=str_pad($id+1,7,0, STR_PAD_LEFT);
        $codevehicle ="Vehicle-" .$id;
      }
      $mileage=$_POST['mileage'];
      $vehicleid=$codevehicle;
      $plate=$_POST['plate'];
      $condition=$_POST['condition'];
      $model = $_POST['model'];
      $color = $_POST['color'];
      $authorcode = $_POST['authorcode'];
      $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
      $tname = $_FILES["file"]["tmp_name"];
      $uploads_dir = '../uploads';
      move_uploaded_file($tname, $uploads_dir.'/'.$pname);
        $vehicle_check = mysqli_query($connection,"SELECT * FROM vehicle  WHERE 	plate_no='$plate'");
        if(mysqli_num_rows($vehicle_check) === 1){
          header("Location: ../vehicle_registration?message_failed= $plate is already registered.",true,  302 );
          exit();
              }else{
                $vehicle_sql="INSERT INTO vehicle(mileage,vehicle_id,plate_no,con,model,color,image,author_code)VALUE('$mileage','$vehicleid','$plate','$condition','$model','$color','$pname','$authorcode')";
                if ($connection->query($vehicle_sql) === TRUE) {
                  header("Location: ../vehicle_registration?message_success= Vehicle registered successfully.",true,  302 );
                  exit;
                }else {
                  header("Location: ../vehicle_registration?message_failed= Could not add your Vehicle.",true,  302 );
                      exit;
                }
              }
}else {
  header("Location: ../ridersignup?message_failed= Server taking too long to respond.",true,  302 );
      exit;
}
?>