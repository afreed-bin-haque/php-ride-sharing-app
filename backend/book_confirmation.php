<?php require 'connection.php';
	if (isset($_GET['apporve'])) {
    $user_code = $_GET['apporve'];
      $update_sql= mysqli_query($connection,"UPDATE book SET approvel='Approved' WHERE booked_by='$user_code'");
      header('location: ../admin?message_success= Booking Approved.',true,  302);
    }  
    if (isset($_GET['unapprove'])) {
      $user_code = $_GET['unapprove'];
        $update_sql= mysqli_query($connection,"UPDATE book SET approvel='Unapproved' WHERE booked_by='$user_code'");
        header('location: ../admin?message_danger= Booking Unapproved.',true,  302);
      } 
?>