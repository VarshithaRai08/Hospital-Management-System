<?php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['room_type'])) {
  $roomType = $_GET['room_type'];

  $sql = "SELECT room_number FROM bed_allotment WHERE room_type = '$roomType'";
  $result = mysqli_query($conn, $sql);

  $allottedRooms = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $allottedRooms[] = $row['room_number'];
  }

  $response = array(
    'success' => true,
    'allotted_rooms' => $allottedRooms
  );
} else {
  $response = array(
    'success' => false,
    'message' => 'Invalid request'
  );
}

echo json_encode($response);
?>
