<!DOCTYPE html>
<html>
<head>
    <title>Outpatient </title>
    <style>
        

        h1 {
            color:darkblue;
            margin-left:260px;
            margin-top:-600px;
        }

        table {
            width: 50%;
            border-collapse: collapse;
            margin-left:260px;
          
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: darkblue;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>
<?php  // include first file
  require('../Dashboard/navigation.php');

  // include second file
  require('../Doctor/dcdash.php');
?>

    <h1>Outpatient Visited</h1>

    <?php

    // Include the database connection file
    include('../Dashboard/db_connection.php');

    // Check if the 'uname' session variable is set
    if (isset($_SESSION['uname'])) {
        $uname = $_SESSION['uname'];

        // SQL query to retrieve outpatient appointments
        $sql = "SELECT * FROM doctor_suggestion WHERE patient_type = 'outpatient' AND doctor_name = '$uname'";
        $result = mysqli_query($conn, $sql);

        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            // Display the data in a table
            echo "<table>";
            echo "<tr><th>Patient Number</th><th>Patient Name</th><th>Date</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['patient_number'] . "</td>";
                echo "<td>" . $row['patient_name'] . "</td>";
                echo "<td>" . $row['patient_visit'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No outpatient appointments found.";
        }
    } else {
        echo "Session variable 'uname' is not set.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
