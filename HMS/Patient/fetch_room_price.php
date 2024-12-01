<?php
include('../Dashboard/db_connection.php');

if (isset($_GET['room_type'])) {
  $roomType = $_GET['room_type'];

  // Prepare and execute the query to fetch room_price based on room_type
  $stmt = $conn->prepare("SELECT room_price FROM room WHERE room_type = ?");
  $stmt->bind_param("s", $roomType);
  $stmt->execute();
  $stmt->bind_result($roomPrice);

  if ($stmt->fetch()) {
    echo $roomPrice;
  } else {
    echo "N/A"; // Room price not found or error occurred
  }

  $stmt->close();
} else {
  echo "Invalid request"; // room_type parameter not set
}
?>
