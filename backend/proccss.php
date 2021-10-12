<?php require 'connection.php';
if(isset($_POST['book'])){
  $seat_book = $_POST['seat_book'];
  $seat_price = $_POST['per_seat'];
  $total_seat = $_POST['total_seat'];
  $vehicle_id = $_POST['vehicle_id'];
  $vehicle_plate = $_POST['vehicle_plate'];
  $booking_author = $_POST['booking_author'];
  $total_price= $seat_price* $seat_book;
  $remaining_seat=  $total_seat - $seat_book ;
  $update_sql="UPDATE post SET seat= '$remaining_seat' WHERE 	vehicle_plate ='$vehicle_plate'";
  if ($connection->query($update_sql) === TRUE) {
    $book_detail="INSERT INTO book(vehicle_id,vehicle_plate,seat_booked,total,booked_by)VALUE('$vehicle_id','$vehicle_plate','$seat_book','$total_price','$booking_author')";
    if ($connection->query($book_detail) === TRUE) {
      header("Location: ../booking_history?message_success= Rent request submitted successfully.Please wait till admin approve your booking.",true,  302 );
      exit;
    }else {
      header("Location: ../booking_history?message_failed= Could not proceed your booking.",true,  302 );
          exit;
    }
  }else {
    header("Location: ../booking_history?message_failed= Could not proceed your booking.",true,  302 );
        exit;
  }
}else {
  header("Location: ../dashboard?message_failed= Server taking too long to respond.",true,  302 );
      exit;
}?>