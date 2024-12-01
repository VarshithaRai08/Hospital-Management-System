<?php
session_start();
include('db_connection.php');

// Fetch the occupied room numbers from the bed_allotment table
$occupiedRoomNumbers = array();
$sql = "SELECT room_number FROM bed_allotment WHERE status = 'Available'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $occupiedRoomNumbers[] = $row['room_number'];
}

// Return the occupied room numbers as JSON data
echo json_encode($occupiedRoomNumbers);
?>
