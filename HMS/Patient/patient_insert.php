<?php
include('../Dashboard/db_connection.php');

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $contact_no = $_POST['contact_no'];
    $email_id = $_POST['email'];
    $pidno = $_POST['pidno'];
    $password = $_POST['password'];

    // Check if user with the given first name, mobile number, and email already exists
    $check_query = "SELECT COUNT(*) AS count FROM registration WHERE first_name = '$first_name' AND contact_no = '$contact_no' AND email_id = '$email_id'";
    $check_result = mysqli_query($conn, $check_query);
    $check_row = mysqli_fetch_assoc($check_result);
    $userExists = $check_row['count'] > 0;

    if ($userExists) {
        echo '<script>alert("User with the provided details already exists!");</script>';
        echo '<script>window.location.href = "log1.php";</script>';
    } else {
        // Encrypt the password
    

        $sql = "INSERT INTO registration (first_name, last_name, dob, gender, address, contact_no, email_id, pidno, password)
                VALUES ('$first_name', '$last_name', '$dob', '$gender', '$address', '$contact_no', '$email_id', '$pidno', '$password')";

        $sql2 = "INSERT INTO login (username, password, type, status)
                 VALUES ('$pidno', '$password', 'patient', 'Active')";

        $sql3 = "INSERT INTO patient_details (doctor_name, patient_name, dob, gender, patient_address, mobile_no, department, email_id, p_no)
                 VALUES ('', '$first_name $last_name', '$dob', '$gender', '$address', '$contact_no', '', '$email_id', '$pidno')";

        if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)) {
            echo '<script>alert("Registration Successful!");</script>';
            echo '<script>window.location.href = "log1.php";</script>';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>
