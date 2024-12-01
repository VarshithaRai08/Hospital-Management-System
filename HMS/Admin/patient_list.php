<?php
include('../Dashboard/db_connection.php');

$sql = "SELECT * FROM patient_details";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='patients-table'>";
    echo "<tr>";
    echo "<th>Patient ID</th>";
    echo "<th>Name</th>";
    echo "<th>Doctor Name</th>";
    echo "<th>Department</th>";
    // Add more columns as needed
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["p_no"] . "</td>";
        echo "<td>" . $row["patient_name"] . "</td>";
        echo "<td>" . $row["doctor_name"] . "</td>";
        echo "<td>" . $row["department"] . "</td>";
        // Add more columns as needed
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No patients found.";
}

$conn->close();
?>

<style>
.patients-table {
    width: 60%;
    border-collapse: collapse;
    font-size: 18px;;
}

.patients-table th, .patients-table td {
    padding: 15px;
    border-bottom: 3px solid darkred;
  
}

.patients-table th {
    background-color: darkred;
    color:white;
    text-align: left;
}

.patients-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.patients-table tr:hover {
    background-color: lightslategray;
}
</style>
