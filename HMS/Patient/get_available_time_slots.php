<?php
// get_available_time_slots.php

// Assuming you have already established a database connection

if (isset($_GET['doctorId']) && isset($_GET['appointmentDate'])) {
  $doctorId = $_GET['doctorId'];
  $appointmentDate = $_GET['appointmentDate'];

  // Retrieve the available time slots for the given doctor and appointment date from the database
  $sql = "SELECT time_slot FROM doctor_appointments WHERE doctor_id = '$doctorId' AND appointment_date = '$appointmentDate'";
  $result = mysqli_query($conn, $sql);

  $availableTimeSlots = array();

  while ($row = mysqli_fetch_assoc($result)) {
    $availableTimeSlots[] = $row['time_slot'];
  }

  // Return the available time slots as JSON response
  header('Content-Type: application/json');
  echo json_encode($availableTimeSlots);
}
?>
