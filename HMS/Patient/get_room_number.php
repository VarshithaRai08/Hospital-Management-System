<?php
include('../Dashboard/db_connection.php');

if (isset($_GET['room_type'])) {
  $roomType = $_GET['room_type'];

  $html = '';
  $sql = "SELECT room_number FROM room WHERE room_type = '$roomType'";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    $roomNumber = $row['room_number'];

    // Check the status of the room number in the bed_allotment table
    $statusSql = "SELECT status FROM bed_allotment WHERE room_number = '$roomNumber'";
    $statusResult = mysqli_query($conn, $statusSql);
    $statusRow = mysqli_fetch_assoc($statusResult);
    $status = isset($statusRow['status']) ? $statusRow['status'] : '';

    // Generate HTML markup for each room number based on availability status
    if ($status === 'Booked') {
      $html .= '<label for="room_number_' . $roomNumber . '">';
      $html .= '<input type="radio" id="room_number_' . $roomNumber . '" name="room_number" value="' . $roomNumber . '" disabled style="background-color: red;">';
      $html .= $roomNumber ;
      $html .= '</label>';
    } elseif ($status === 'Available') {
      $html .= '<label for="room_number_' . $roomNumber . '">';
      $html .= '<input type="radio" id="room_number_' . $roomNumber . '" name="room_number" value="' . $roomNumber . '">';
      $html .= $roomNumber ;
      $html .= '</label>';
    } else {
      $html .= '<label for="room_number_' . $roomNumber . '">';
      $html .= '<input type="radio" id="room_number_' . $roomNumber . '" name="room_number" value="' . $roomNumber . '">';
      $html .= $roomNumber;
      $html .= '</label>';
    }
  }

  echo $html;
}

mysqli_close($conn);
?>
