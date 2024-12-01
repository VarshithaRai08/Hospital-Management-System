<?php
session_start();
include('db_connection.php');

?>
<?php
$enteredUsername = $_POST['uname'];
$enteredPassword = $_POST['new_password'];

// Perform a query to check if the entered username and password match
$query = "SELECT * FROM inpatients WHERE Uname = '$enteredUsername' AND bed_number_password = '$enteredPassword'";
$result = mysqli_query($connection, $query);

// Check if the query returned a matching row
if (mysqli_num_rows($result) === 1) {
    // Login successful
    echo "Login successful!";
} else {
    // Login failed
    echo "Invalid username or password.";
}

// Remember to close the database connection when done
mysqli_close($connection);
?>
