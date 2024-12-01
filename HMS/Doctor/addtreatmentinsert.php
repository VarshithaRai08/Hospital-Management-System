<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include('../Dashboard/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patientNumber = $_POST['patientNumber'];
    $patientName = $_POST['patientName'];
    $currentDate = $_POST['currentDate'];
    $currentTime = $_POST['currentTime'];
    $treatmentType = $_POST['treatmentType'];
    $others = $_POST['others'];

    // Insert the form data into the table
    $insertQuery = "INSERT INTO inpatient_treatment (patient_number, patient_name, treatment_date, treatment_time, treatment_type, others)
                    VALUES ('$patientNumber', '$patientName', '$currentDate', '$currentTime', '$treatmentType', '$others')";

    if (mysqli_query($conn, $insertQuery)) {
        echo '<script>alert( "Treatment is added.");</script>';
        header("Location:../Doctor/inpatientsView.php");
    } else {
        echo "Error inserting treatment form data: " . mysqli_error($conn);
    }
}
?>