<!DOCTYPE html>
<html>
<head>
    <title>Inpatient</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: darkblue;
            margin-left: 260px;
            margin-top: -600px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
           
            margin-left: 260px;
            
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


        .btn-treatment {
            background-color: darkblue;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            font-size: 16px;
            border-radius: 4px;
            border-color: darkblue;
        }

        .btn-discharge {
            background-color: darkorange;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            font-size: 16px;
            border-radius: 4px;
            border-color: darkorange;
        }
        
        /* Center the form */
        form {
            margin-left: 900px;
           
            display:none;
            width: 300px;
            height: 100px;
            background-color: white;
            border-radius: 8px;
        }

        /* Styling for the calendar */
      

  #calendar h2 {
    color: darkblue;
    font-size: 20px;
  }

  #calendar input[type="date"] {
    padding: 5px;
    margin-bottom: 10px;
    border: 2px solid darkblue;
    border-radius: 10px;
  }
  #calendar button {
    display: inline-block;
    padding: 5px 10px;
    margin: 5px;
    font-size: 16px;
    border-radius: 5px;
    background-color: darkblue;
    color: white;
    cursor: pointer;
    border: none;
  }
  #calendar button:hover {
    background-color: #1E90FF;
  }
    </style>
    <script>
        function openCalendar() {
            var calendar = document.getElementById("calendar");
            calendar.style.display = "block";
        }
        
        function closeCalendar() {
            var calendar = document.getElementById("calendar");
            calendar.style.display = "none";
        }

        function dischargePatient() {
            openCalendar();
        }
    </script>
</head>
<body>
<?php
// Include the navigation.php file
require('../Dashboard/navigation.php');

// Include the dcdash.php file
require('../Doctor/dcdash.php');


// Include the database connection file
include('../Dashboard/db_connection.php');

// Check if the 'uname' session variable is set
if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];

    // SQL query to retrieve inpatient details
   // SQL query to retrieve inpatient details with exclusion condition
$sql = "SELECT *
FROM inpatients i
WHERE i.doctor_name = '$uname' AND NOT EXISTS (
    SELECT 1
    FROM discharge d
    WHERE i.discharge_date = d.bill_date
)";
$result = mysqli_query($conn, $sql);

   
    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        echo "<h1>INPATIENTS</h1>";
        // Display the data in a table
        echo "<table>";
        echo "<tr><th>Patient Number</th><th>Patient Name</th><th>Room Number</th><th>Date of Admission</th><th>Todays Treatment</th><th>Discharge</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            $patient_number = $row['patient_number'];
            $patient_name = $row['patient_name'];

            echo "<tr>";
            echo "<td>" . $patient_number . "</td>";
            echo "<td>" . $patient_name . "</td>";

            echo "<td>" . $row['room_number'] . "</td>";
            echo "<td>" . $row['patient_visit'] . "</td>";
            echo '<td><a href="addtreatment.php?patient_number=' . $patient_number . '&patient_name=' . $patient_name . '" class="btn-treatment">Add Treatment</a></td>';
            echo "<td><button class='btn-discharge' onclick='dischargePatient()'>Discharge</button></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No inpatient records found.";
    }
} else {
    echo "Session variable 'uname' is not set.";
}

// Check if the 'dischargeDate' POST variable is set
if (isset($_POST['dischargeDate'])) {
    $dischargeDate = $_POST['dischargeDate'];

    // Update the discharge date in the 'inpatients' table
    $updateSql = "UPDATE inpatients SET discharge_date = '$dischargeDate' WHERE patient_number = '$patient_number'";
    mysqli_query($conn, $updateSql);
}

// Close the database connection
mysqli_close($conn);
?>

<form id="dischargeForm" method="post" action="">
    <div id="calendar" style="display: none;">
        <h2>Select Discharge Date</h2>
        <input type="date" name="dischargeDate" id="dischargeDate" onchange="checkDate()" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+30 days')); ?>"required>
        <br><br>
        <button type="button" onclick="closeCalendar()">Cancel</button>
        <button type="submit" id="dischargeBtn">Confirm Discharge</button>
    </div>
</form>

<script>
    function dischargePatient() {
        var form = document.getElementById("dischargeForm");
        form.style.display = "block";
        openCalendar();
    }
</script>

</body>
</html>
