<?php require 'connection.php';
if(isset($_POST['postoffer'])){
      $from_loc=$_POST['from'];
      $to_loc=$_POST['to'];
      $plate=$_POST['plate'];
      $journey_date=$_POST['date'];
      $seat=$_POST['seat'];
      $price_per_seat = $_POST['price_per_seat'];
      $authorcode = $_POST['authorcode'];
        $vehicle_sql="INSERT INTO post(from_loc,to_loc,vehicle_plate,jurney_date,seat,price_per_seat,author_code)VALUE('$from_loc','$to_loc','$plate','$journey_date','$seat','$price_per_seat','$authorcode')";
          if ($connection->query($vehicle_sql) === TRUE) {
             header("Location: ../rent_post?message_success= Your offer posted successfully.",true,  302 );
              exit;
           }else {
            header("Location: ../rent_post?message_failed= Could not post your Offer.",true,  302 );
            exit;
            }
}else {
  header("Location: ../rent_post?message_failed= Server taking too long to respond.",true,  302 );
      exit;
}
?>