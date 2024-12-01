<?php
include('db_connection.php');

if ($_GET['room_type']) {
  $roomType = $_GET['room_type'];

  // Fetch the room numbers based on the room type
  $sql = "SELECT room_number FROM room WHERE room_type = '$roomType'";
  $result = mysqli_query($conn, $sql);

  $roomNumbers = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $roomNumbers[] = $row;
  }

  // Return the room numbers as a JSON response
  header('Content-Type: application/json');
  echo json_encode($roomNumbers);
}
?>
