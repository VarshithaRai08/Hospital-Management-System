<?php
include('db_connection.php');

$currentDate = date("Y-m-d");
$currentTime = date("H:i:s");

$sql = "SELECT dob, gender, pidno, CONCAT(first_name, ' ', last_name) AS name FROM registration WHERE time = '$currentDate'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='registration-table'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Gender</th>";
    echo "<th>Date of Birth</th>";
    // Add more columns as needed
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["pidno"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["dob"] . "</td>";
        // Add more columns as needed
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data found.";
}

$conn->close();
?>
<style>
.registration-table {
    width: 60%;
    border-collapse: collapse;
    font-size: 18px;
}

.registration-table th, .registration-table td {
    padding: 15px;
    border-bottom: 3px solid darkred;
    
   
}

.registration-table th {
    background-color: darkred;
    color: white;
   
    text-align: left;
}

.registration-table tr:nth-child(even) {
    background-color: #f5f5f5;
}

.registration-table tr:hover {
    background-color: #f5f5f5;
}
</style>
