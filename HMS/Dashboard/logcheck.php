<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Database connection details
    $servername = "localhost:3307";
    $db_username = "root";
    $db_password = "";
    $dbname = "abhaya";

    // Create a connection
    $conn = mysqli_connect($servername, $db_username, $db_password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $type = $row['type'];
        $_SESSION['uname'] = $username;

        if ($type == "admin") {
            header('Location: ../Admin/together.php');
            exit();
        } else if ($type == "patient") {
            header('Location: ../Patient/pcdashboard.php');
            exit();
        } else if ($type == "doctor") {
            header('Location: ../Doctor/doctorpanel.php');
            exit();
        }
    } else {
        echo '<script>alert("Invalid Username or Password");</script>';
        echo '<script>window.location.href = "log1.php";</script>';
    }
}
?>
