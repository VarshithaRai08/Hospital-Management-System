<?php
include('../Dashboard/db_connection.php');
session_start();

if (isset($_POST['Submit'])) {
    $patient_id = $_POST['patient_id'];
    $patient_number = $_POST['patient_number'];
    $spe_id = $_POST['spe_id'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    $time_slot = $_POST['time_slot'];
    $description = $_POST['description'];
    $current = $_POST['date'];

    // Check if patient_number exists in the discharge table
    $discharge_query = "SELECT * FROM discharge WHERE patient_number = '$patient_number'";
    $discharge_result = mysqli_query($conn, $discharge_query);

    if (mysqli_num_rows($discharge_result) > 0) {
        // Patient is already discharged, allow appointment insertion
        // No action required
    }

    // Check if appointment already exists for the patient on the appointment date
    $existing_appointment_query = "SELECT * FROM doctor_appointments WHERE pidno = '$patient_number' AND appointment_date = '$appointment_date'";
    $existing_appointment_result = mysqli_query($conn, $existing_appointment_query);

    if (mysqli_num_rows($existing_appointment_result) > 0) {
        // Appointment already exists for the patient on the appointment date
        echo '<script>alert("Appointment already done.");</script>';
        echo '<script>window.location.href = "buttons.php";</script>';
    } else {
        // Fetch patient name based on patient number
        $patient_query = "SELECT patient_name FROM patient_details WHERE p_no = '$patient_number'";
        $patient_result = mysqli_query($conn, $patient_query);
        $patient_row = mysqli_fetch_assoc($patient_result);
        $patient_name = $patient_row['patient_name'];

        // Fetch doctor name based on doctor ID
        $doctor_query = "SELECT doctor_name FROM doctor_details WHERE doctor_id = '$doctor_id'";
        $doctor_result = mysqli_query($conn, $doctor_query);
        $doctor_row = mysqli_fetch_assoc($doctor_result);
        $doctor_name = $doctor_row['doctor_name'];

        // Fetch specialization name based on specialization ID
        $specialization_query = "SELECT spe_name FROM specialization WHERE spe_id = '$spe_id'";
        $specialization_result = mysqli_query($conn, $specialization_query);
        $specialization_row = mysqli_fetch_assoc($specialization_result);
        $spe_name = $specialization_row['spe_name'];

        $sql = "INSERT INTO doctor_appointments (pidno, patient_name, spe_name, doctor_id, doctor_name, appointment_date, time_slot, description, current) VALUES ('$patient_number', '$patient_name', '$spe_name', '$doctor_id', '$doctor_name', '$appointment_date', '$time_slot', '$description', '$current')";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Appointment done successfully.");</script>';
        } else {
            echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
        }
        echo '<script>window.location.href = "buttons.php";</script>';

        // Update doctor_name in patient_details table
        $update_query = "UPDATE patient_details SET doctor_name = '$doctor_name', department = '$spe_name' WHERE p_no = '$patient_number'";
        if (mysqli_query($conn, $update_query)) {
            echo "Patient details updated successfully.";
        } else {
            echo "Error updating patient details: " . mysqli_error($conn);
        }
    }
}
?>
