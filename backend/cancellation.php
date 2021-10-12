<?php require 'connection.php';
	if (isset($_GET['id'])) {
    $vehicle_plate = $_GET['id'];
      $result=mysqli_query($connection,"SELECT * FROM book WHERE vehicle_plate='$vehicle_plate'");
      $result_2=mysqli_query($connection,"SELECT * FROM post WHERE vehicle_plate='$vehicle_plate'");
      $booked=mysqli_fetch_assoc($result);
      $post=mysqli_fetch_assoc($result_2);
      $seat_book=$booked['seat_booked'];
      $booked_by=$booked['booked_by'];
      $posted_seat=$post['seat'];
      $final_seat = $posted_seat+$seat_book;
      $insert_cancellation=mysqli_query($connection,"INSERT INTO cancelled_trip(user_id,vehicle_plate)VALUE('$booked_by','$vehicle_plate')");
      $update_sql= mysqli_query($connection,"UPDATE post SET 	seat='$final_seat' WHERE vehicle_plate='$vehicle_plate'");
      $delete_sql= mysqli_query($connection, "DELETE FROM book WHERE vehicle_plate='$vehicle_plate'");
      header('location: ../booking_history?message_success= Booking removed successfully.',true,  302);
    }  
?>