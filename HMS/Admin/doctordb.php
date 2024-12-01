<?php
include('../Dashboard/db_connection.php');

$doctor_name = $_POST['d_name'];
$gender = $_POST['gender'];
$date_of_birth = $_POST['dob'];
$date_of_joining = $_POST['date_of_joining'];
$qualification_ids = $_POST['qualification_id']; // Updated to qualification_ids (array)
$spe_id = $_POST['spe_id']; // Updated to spe_id
$doctor_address = $_POST['d_address'];
$mobile_number = $_POST['m_no'];
$email_id = $_POST['email_id'];

// Check if doctor with the same email or mobile number already exists
$existingDoctorQuery = "SELECT * FROM doctor_details WHERE email_id = '$email_id' OR mobile_number = '$mobile_number'";
$existingDoctorResult = mysqli_query($conn, $existingDoctorQuery);
if (mysqli_num_rows($existingDoctorResult) > 0) {
  // Doctor with the same email or mobile number already exists
  // Handle the validation error (display error message, redirect, etc.)
  echo '<script>alert("Doctor already added."); window.location = "insertdoctor.php";</script>';
  exit;
}

$d_photo = $_FILES['d_photo']['name'];
$tmp_location = $_FILES['d_photo']['tmp_name'];
$target = "upload/".$d_photo;
move_uploaded_file($tmp_location, $target);

// Fetch qualification names
$qualification_names = [];
foreach ($qualification_ids as $qualification_id) {
  $qualification_query = "SELECT qualification_name FROM qualification WHERE qualification_id = '$qualification_id'";
  $qualification_result = mysqli_query($conn, $qualification_query);
  $qualification_row = mysqli_fetch_assoc($qualification_result);
  $qualification_names[] = $qualification_row['qualification_name'];
}

// Fetch specialization name
$spe_query = "SELECT spe_name FROM specialization WHERE spe_id = '$spe_id'";
$spe_result = mysqli_query($conn, $spe_query);
$spe_row = mysqli_fetch_assoc($spe_result);
$spe_name = $spe_row['spe_name'];

// Prepare the qualification names as a comma-separated string
$qualification_name = implode(", ", $qualification_names);

$status = "Available"; // Set the status to "Available"

$sql = "INSERT INTO doctor_details (doctor_name, gender, dob, date_of_joining, qualification_name, spe_name, doctor_address, mobile_number, email_id, doctor_photo, status) VALUES ('$doctor_name', '$gender', '$date_of_birth', '$date_of_joining', '$qualification_name', '$spe_name', '$doctor_address', '$mobile_number', '$email_id', '$d_photo', '$status')";

mysqli_query($conn, $sql);

$sql2 = "INSERT INTO login VALUES (null, '$doctor_name', '$mobile_number', 'doctor', 'Active')";
mysqli_query($conn, $sql2);

mysqli_close($conn);

header("Location: doctorview.php");
exit;
?>
