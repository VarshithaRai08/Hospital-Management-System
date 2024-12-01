<?php
include('../Dashboard/db_connection.php');

$doctorId = $_GET['doctor_id'];
$appointmentDate = $_GET['appointment_date'];

// Fetch all time slots
$timeSlotsQuery = "SELECT * FROM time_slot";
$timeSlotsResult = mysqli_query($conn, $timeSlotsQuery);
$timeSlots = mysqli_fetch_all($timeSlotsResult, MYSQLI_ASSOC);

// Check if each time slot is booked for the selected doctor and appointment date
foreach ($timeSlots as &$timeSlot) {
    $timeSlotQuery = "SELECT * FROM doctor_appointments WHERE doctor_id = '$doctorId' AND time_slot = '{$timeSlot['time_slot']}' AND appointment_date = '$appointmentDate'";
    $timeSlotResult = mysqli_query($conn, $timeSlotQuery);

    if (mysqli_num_rows($timeSlotResult) > 0) {
        $timeSlot['is_booked'] = true;
    } else {
        $timeSlot['is_booked'] = false;
    }
}

// Return the time slots as a JSON response
header('Content-Type: application/json');
echo json_encode($timeSlots);
?>
