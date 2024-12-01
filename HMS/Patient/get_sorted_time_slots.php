<?php
// Assuming you have a database connection established

// Retrieve the doctor_id from the request
$doctor_id = $_GET['doctor_id'];

// Query the database to fetch the booked appointments for the selected doctor
$sql = "SELECT * FROM doctor_appointments WHERE doctor_id = '$doctor_id'";
$result = mysqli_query($conn, $sql);

// Create an array to store the booked appointments
$bookedAppointments = array();
while ($row = mysqli_fetch_assoc($result)) {
    $bookedAppointments[] = $row['time_slot'];
}

// Return the booked appointments as JSON response
header('Content-Type: application/json');
echo json_encode($bookedAppointments);
?>
