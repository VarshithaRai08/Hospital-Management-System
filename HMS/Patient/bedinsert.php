<?php
session_start();
include('../Dashboard/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patientNumber = $_POST['patient_number'];
    $patientName = $_POST['patient_name'];
    $patientType = $_POST['patient_type'];
    $specialization = $_POST['spe_name'];
    $roomType = $_POST['room_type'];
    $roomNumbers = $_POST['room_number'];

    // Insert bed allotment details into the database
    foreach ($roomNumbers as $roomNumber) {
        $roomNumber = mysqli_real_escape_string($conn, $roomNumber); // Escape the room number to prevent SQL injection
        $sql = "INSERT INTO bed_allotment (patient_number, patient_name, patient_type, specialization, room_type, room_number, status)
            VALUES ('$patientNumber', '$patientName', '$patientType', '$specialization', '$roomType', '$roomNumber', 'Booked')";

        if (mysqli_query($conn, $sql)) {
            // Insert room_number into the inpatients table
            $updateSql = "UPDATE inpatients SET room_number = '$roomNumber' WHERE patient_number = '$patientNumber'";
            if (mysqli_query($conn, $updateSql)) {
                echo '<script>alert("Bed Allotment successful.");</script>';
                header("Location: authenticatn.php");
            } else {
                echo "Error updating inpatients table: " . mysqli_error($conn);
            }
        } else {
            echo "Error inserting into bed_allotment table: " . mysqli_error($conn);
        }
    }
}
?>
