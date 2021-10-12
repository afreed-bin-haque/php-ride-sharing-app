<?php require 'connection.php';
	if (isset($_GET['completed'])) {
    $user_code = $_GET['completed'];
      $update_sql= mysqli_query($connection,"UPDATE book SET approvel='Complete' WHERE booked_by='$user_code'");
      header('location: ../riderdashboard?message_success= Ride Completed.',true,  302);
    }  
?>