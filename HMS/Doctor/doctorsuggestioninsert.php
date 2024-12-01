<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['uname'])) {
    // Redirect the user to the login page or handle the unauthorized access in some way
    header("Location: ../Dashboard/login.php");
    exit;
}

include('../Dashboard/db_connection.php');

// Retrieve form data
$patientNumber = $_POST['patientNumber'];
$patientName = $_POST['patientName'];
$doctorName = $_POST['doctorName'];
$description = $_POST['description'];
$prescription = $_POST['prescription'];
$doctorFees = $_POST['doctorFees'];
$others = $_POST['others'];
$patientType = $_POST['patientType'];


// Generate password for inpatient
$bedNumberPassword = '';
if ($patientType === 'inpatient') {
    $bedNumberPassword = generatePassword(); // Call the function to generate a password
}

// Insert data into doctor_suggestion table for both outpatient and inpatient
$query = "INSERT INTO doctor_suggestion (patient_number, patient_name, doctor_name, description, prescription, doctor_fees, patient_type, others) 
          VALUES ('$patientNumber', '$patientName', '$doctorName', '$description', '$prescription', '$doctorFees','$patientType', '$others')";
$result = mysqli_query($conn, $query);

if ($result) {
    $suggestionId = mysqli_insert_id($conn); // Get the auto-generated suggestion ID
    
    // If the patient type is "inpatient", insert data into inpatients table
    if ($patientType === 'inpatient') {
        $inpatientQuery = "INSERT INTO inpatients (inpatient_id, patient_number, patient_name, doctor_name, bed_number_password) 
                           VALUES ('$suggestionId','$patientNumber', '$patientName', '$doctorName', '$bedNumberPassword')";
        $inpatientResult = mysqli_query($conn, $inpatientQuery);
        
        if ($inpatientResult) {
            $_SESSION['patient_type'] = 'inpatient'; // Set session variable for patient type
            $_SESSION['room_allocated'] = true; // Set session variable to indicate room allocation
            
           // Display the generated password
echo '<script>alert("Inpatient is added sucessfully");</script>';
header("Location:../Doctor/currentappointment.php");

          
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo '<script>alert("Outpatient is added sucessfully");</script>';
        header("Location:../Doctor/currentappointment.php");
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

// Function to generate a random password
// Function to generate a random password
function generatePassword() {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()';
    $password = 'BED';

    $length = 1;
    $lowercaseLetter = chr(mt_rand(97, 122)); // Generate a random lowercase letter
    $password .= $lowercaseLetter;

    $length = 2;
    $digits = mt_rand(10, 99); // Generate random two-digit number
    $password .= $digits;

    $length = 1;
    $specialCharacter = $characters[mt_rand(26, strlen($characters) - 1)]; // Generate a random special character
    $password .= $specialCharacter;

    $remainingLength = 8 - strlen($password); // Calculate the remaining length of the password
    for ($i = 0; $i < $remainingLength; $i++) {
        $password .= $characters[mt_rand(0, strlen($characters) - 1)]; // Append random characters to fill the remaining length
    }

    return $password;
}

?>
