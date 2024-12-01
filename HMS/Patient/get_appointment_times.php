<?php
// Include your database connection code here
// ...

// Retrieve the doctor ID and appointment date from the AJAX request
$doctorId = $_POST['doctor_id'];
$appointmentDate = $_POST['appointment_date'];

// Query the doctor_appointments table to check for existing appointments
$sql = "SELECT appointment_time FROM doctor_appointments WHERE doctor_id = '$doctorId' AND appointment_date = '$appointmentDate'";
$result = mysqli_query($con, $sql);
$bookedTimes = array();

// Store the existing appointment times in an array
while ($row = mysqli_fetch_assoc($result)) {
    $bookedTimes[] = $row['appointment_time'];
}

// Generate the radio buttons for appointment times
$availableTimes = array('9:00 AM', '10:00 AM', '11:00 AM', '2:00 PM', '3:00 PM', '4:00 PM'); // Example times, modify as needed

foreach ($availableTimes as $time) {
    $disabled = in_array($time, $bookedTimes) ? 'disabled' : ''; // Disable the radio button if the time is booked
    $color = in_array($time, $bookedTimes) ? 'red' : ''; // Apply red color if the time is booked
    echo '<input type="radio" name="appointment_time" value="' . $time . '" ' . $disabled . ' style="color: ' . $color . ';"> ' . $time . '<br>';
}
?>
