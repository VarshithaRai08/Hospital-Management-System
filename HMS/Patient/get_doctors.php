<?php
// get_doctors.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Retrieve the selected specialization value
$selectedSpecialization = $_GET['specialization'];

// Perform database query to fetch doctors based on specialization
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "abhaya";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM doctor_details 
        JOIN specialization ON doctor_details.spe_name = specialization.spe_name
        WHERE specialization.spe_id = '$selectedSpecialization'";

$result = $conn->query($sql);

$doctors = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $doctorId = $row['doctor_id'];
        $doctorName = $row['doctor_name'];
        $status = $row['status'];

        // Check if the doctor's status is "Unavailable"
        if ($status === "Unavailable") {
            // If the status is "Unavailable", set the availability flag to false
            $isAvailable = false;
        } else {
            // If the status is not "Unavailable", set the availability flag to true
            $isAvailable = true;
        }

        $doctor = array(
            'doctor_id' => $doctorId,
            'doctor_name' => $doctorName,
            'is_available' => $isAvailable
        );
        
        $doctors[] = $doctor;
    }
}

$conn->close();

// Return doctors as JSON response
header('Content-Type: application/json');
echo json_encode($doctors);
?>
