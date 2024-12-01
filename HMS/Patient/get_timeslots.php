<?php
// Assuming you have already established a database connection
include('db_connection.php');

$doctorId = $_GET['doctor_id'];
$appointmentDate = $_GET['appointment_date'];

// Fetch the time slots from the database based on the doctor ID and appointment date
$sql = "SELECT time_slot FROM doctor_appointments WHERE doctor_id = '$doctorId' AND appointment_date = '$appointmentDate'";
$result = mysqli_query($conn, $sql);

$timeSlots = array();
while ($row = mysqli_fetch_assoc($result)) {
    $timeSlots[] = $row;
}

// Return the time slots as a JSON response
header('Content-Type: application/json');
echo json_encode($timeSlots);
?>
