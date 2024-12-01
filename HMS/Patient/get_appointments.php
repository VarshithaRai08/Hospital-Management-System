<?php
include('db_connection.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($_GET['doctor_id'])) {
    $doctorId = $_GET['doctor_id'];

    // Query the database to fetch the time slots for the selected doctor
    $sql = "SELECT time_slot FROM doctor_appointments WHERE doctor_id = '$doctorId'";
    $result = mysqli_query($conn, $sql);

    $timeSlots = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $timeSlots[] = $row['time_slot'];
    }

    // Return the time slots as JSON response
    header('Content-Type: application/json');
    echo json_encode($timeSlots);
}
?>
