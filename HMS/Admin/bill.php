<!DOCTYPE html>
<html>
<head>
    <title>Bill</title>
    <style>
    h2{
        font-size: 25px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }

    h1{
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }
       .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    .left-section {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: center;
        flex-basis: 100%;
    }

    .left-section > div {
        display: flex;
        align-items: center;
        margin-right: 10px;

    }

    .room-section {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: center;
    }

    .room-section > div {
        display: flex;
        align-items: center;
        margin-right: 10px;
    }

    label {
        margin-right: 5px;
        font-size: 18px;
        font-weight: 600;
    }

    .left-section input[type="text"] {
        padding: 7px;
        margin-bottom: 15px;
        margin-right: 90px; /* Adjusted margin for left-section */
        width: 200px;
        border: 2px solid brown; /* Added border style */
        border-radius: 10px;;
    }

    .room-section input[type="text"] {
        padding: 7px;
        margin-bottom: 15px;
        margin-right: 10px;
        width: 150px;
        border: 2px solid brown; /* Added border style */
        border-radius: 10px;; /* Added border style */
    }

    table {
        border-collapse: collapse;
        width: 77%;
        margin-bottom: 20px;
    }
    hr{
        border: 2px solid brown; /* Added border style */
       
    }

    th, td {
        border: 3px solid brown; /* Added border style */
        border-radius: 10px;;
        padding: 8px;
        text-align: left;

    }
    .small-column1{
    width: 100px;
    text-align: left;
}
.small-column2 {
    width: 100px;
    text-align: left;
}
.small-column3 {
    width: 100px;
    text-align:left;
}


    </style>
</head>
<body>
    
    <h1>BILL</h1>
    <hr>
    <div class="container">
        <h2>Patient Information</h2>
        <form method="post" action="">
            <div class="left-section">
                <label for="patientNumber">Patient Number:</label>
                <?php
                // Retrieve the patient number from the URL
                if (isset($_GET['patient_number'])) {
                    $patientNumber = $_GET['patient_number'];
                    echo '<input type="text" id="patientNumber" name="patientNumber" value="' . $patientNumber . '" required readonly>';

                    // Include the db_connection.php file
                    include '../Dashboard/db_connection.php';

                    // Check if the patient number exists in the registration table
                    $patientName = ""; // Initialize the variable to store the patient name
                    $gender = ""; // Initialize the variable to store the gender
                    $department = ""; // Initialize the variable to store the department
                    $doctorName = ""; // Initialize the variable to store the doctor name

                    // Perform a database query to retrieve the patient name, gender, and department
                    $result = $conn->query("SELECT patient_name, gender FROM patient_details WHERE p_no = '$patientNumber'");

                    // Check if the query was successful and fetch the patient name and gender
                    if ($result && $result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $patientName = $row['patient_name'];
                        $gender = $row['gender'];
                    }

                    // Perform a database query to retrieve the department from patient_details table
                    $result = $conn->query("SELECT spe_name FROM doctor_appointments WHERE pidno = '$patientNumber'");

                    // Check if the query was successful and fetch the department
                    if ($result && $result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $department = $row['spe_name'];
                    }

                    // Perform a database query to retrieve the doctor name from doctor_suggestion table
                    $result = $conn->query("SELECT doctor_name FROM doctor_suggestion WHERE patient_number = '$patientNumber'");

                    // Check if the query was successful and fetch the doctor name
                    if ($result && $result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $doctorName = $row['doctor_name'];
                    }

                    echo '<label for="patientName">Patient Name:</label>';
                    echo '<input type="text" id="patientName" name="patientName" value="' . $patientName . '" required readonly>';
                    echo '<label for="gender">Gender:</label>';
                    echo '<input type="text" id="gender" name="gender" value="' . $gender . '" required readonly>';
                    echo '</div>';
                    echo '<div class="left-section">';
                    echo '<label for="department">Department:</label>';
                    echo '<input type="text" id="department" name="department" value="' . $department . '" required readonly>';
                    echo '<label for="doctorName">Doctor Name:</label>';
                    echo '<input type="text" id="doctorName" name="doctorName" value="' . $doctorName . '" required readonly>';
                } else {
                    echo '<input type="text" id="patientNumber" name="patientNumber" required>';
                    echo '<label for="patientName">Patient Name:</label>';
                    echo '<input type="text" id="patientName" name="patientName" required>';
                    echo '</div>';
                    echo '<div class="left-section">';
                    echo '<label for="gender">Gender:</label>';
                    echo '<input type="text" id="gender" name="gender" required>';
                    echo '<label for="department">Department:</label>';
                    echo '<input type="text" id="department" name="department" required>';
                    echo '<label for="doctorName">Doctor Name:</label>';
                    echo '<input type="text" id="doctorName" name="doctorName" required>';
                }
                ?>
            </div>

            <hr>
            <h2 style="text-align: center;">Room</h2>
            <div class="room-section">
  <?php
  // Check if the patient number exists in the bed_allotment table
  $roomType = ""; // Initialize the variable to store the room type
  $roomNo = ""; // Initialize the variable to store the room number
  $noOfDays = 0; // Initialize the variable to store the number of days
  $totalPrice = 0; // Initialize the variable to store the total price

  // Perform a database query to retrieve the room type, room number, and booking date
  $result = $conn->query("SELECT ba.room_type, ba.room_number, ba.date, r.room_price FROM bed_allotment AS ba LEFT JOIN room AS r ON ba.room_type = r.room_type WHERE ba.patient_number = '$patientNumber'");

  // Check if the query was successful and fetch the room type, room number, booking date, and room price
  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $roomType = $row['room_type'];
    $roomNo = $row['room_number'];
    $bookingDate = $row['date'];

    // Calculate the number of days
    $currentDate = date("Y-m-d");
    $date1 = new DateTime($bookingDate);
    $date2 = new DateTime($currentDate);
    $interval = $date1->diff($date2);
    $noOfDays = $interval->format("%a");

    // Calculate the total price
    $roomPrice = $row['room_price'];
    $totalPrice = $roomPrice * $noOfDays;

    // If the number of days is 0, use the actual price from the room table
    if ($noOfDays == 0) {
      $totalPrice = $roomPrice;
    }
  }

  echo '<label for="roomType">Room Type:</label>';
  echo '<input type="text" id="roomType" name="roomType" value="' . $roomType . '" required readonly>';
  echo '<label for="roomNo">Room Number:</label>';
  echo '<input type="text" id="roomNo" name="roomNo" value="' . $roomNo . '" required readonly>';
  echo '<label for="noOfDays">No. of Days:</label>';
  echo '<input type="text" id="noOfDays" name="noOfDays" value="' . $noOfDays . '" required readonly>';
  echo '<label for="totalPrice">Total Price:</label>';
  echo '<input type="text" id="totalPrice" name="totalPrice" value="' . $totalPrice . '" required readonly>';
  ?>
</div>

            <hr>
            <h2 style="text-align: center;">Treatment</h2>

            <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve values from the form or other sources
    $patientNumber = isset($_POST['patientNumber']) ? $_POST['patientNumber'] : '';
    $patientName = isset($_POST['patientName']) ? $_POST['patientName'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $department = isset($_POST['department']) ? $_POST['department'] : '';
    $doctorName = isset($_POST['doctorName']) ? $_POST['doctorName'] : '';
    $roomType = isset($_POST['roomType']) ? $_POST['roomType'] : '';
    $roomNo = isset($_POST['roomNo']) ? $_POST['roomNo'] : '';
    $noOfDays = isset($_POST['noOfDays']) ? $_POST['noOfDays'] : '';
    $totalPrice = isset($_POST['totalPrice']) ? $_POST['totalPrice'] : '';
    $total = isset($_POST['subtotal']) ? $_POST['subtotal'] : 0;
    $tax = isset($_POST['tax']) ? $_POST['tax'] : 0;
    $totalWithTax = isset($_POST['totalWithTax']) ? $_POST['totalWithTax'] : 0;
    $existingPatientSql = "SELECT * FROM bill WHERE patient_number = '$patientNumber'";
    $existingPatientResult = $conn->query($existingPatientSql);
    if ($existingPatientResult && $existingPatientResult->num_rows > 0) {
        echo '<script>alert("Payment has already been made for this patient. And patient have been discharged.");</script>';
        echo '<script>window.location.href = "dischargepatientlist.php";</script>';
        // You can redirect or perform any other necessary action here
        exit;
    }
    
    


    // Calculate the doctor's salary (10% of totalWithTax)
    $doctorSalary = $totalWithTax * 0.25;

    // Calculate the remaining salary
    $remainingSalary = $totalWithTax - $doctorSalary;

    // Insert the data into the "bill" table
    $billSql = "INSERT INTO bill (patient_number, patient_name, gender, department, doctor_name, room_type, room_number, no_of_days, room_price,subtotal, tax, total_with_tax, doctor_salary, final_amount, payment_status)
        VALUES ('$patientNumber', '$patientName', '$gender', '$department', '$doctorName', '$roomType', '$roomNo', '$noOfDays','$totalPrice', '$total', '$tax', '$totalWithTax', '$doctorSalary', '$remainingSalary', 'paid')";

if ($conn->query($billSql) === TRUE) {
    // Retrieve the patient_number from the submitted form data
    $lastInsertedPatientNumber = $patientNumber;

    // Insert the data into the "discharge" table
    $billDate = date('Y-m-d');
    $dischargeSql = "INSERT INTO discharge (patient_number, patient_name, bill_date) VALUES ('$lastInsertedPatientNumber', '$patientName', '$billDate')";

    if ($conn->query($dischargeSql) === TRUE) {
        // Update the status column in the "bed allotment" table
        $updateStatusSql = "UPDATE bed_allotment SET status = 'Available' WHERE patient_number = '$lastInsertedPatientNumber'";

        if ($conn->query($updateStatusSql) === TRUE) {
            header("Location: processwait.php");
            exit;
        } else {
            echo "Error updating data in the 'bed_allotment' table: " . $conn->error;
        }
    } else {
        echo "Error inserting data into the 'discharge' table: " . $conn->error;
    }
} else {
    echo "Error inserting data into the 'bill' table: " . $conn->error;
}


    // Close the database connection
    $conn->close();
}
?>



<table>
    <thead>
        <tr>
            <th>Treatment Taken</th>
            <th>Qty</th>
            <th>Rate</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $total=0;
    // Retrieve the treatment information from the inpatient_treatment table
    $result = $conn->query("SELECT it.treatment_type, COUNT(*) AS qty, td.treatment_fees FROM inpatient_treatment AS it INNER JOIN treatment_details AS td ON it.treatment_type = td.treatment_name WHERE it.patient_number = '$patientNumber' GROUP BY it.treatment_type");

    // Check if the query was successful and fetch the treatment information
    if ($result && $result->num_rows > 0) {
      
        while ($row = $result->fetch_assoc()) {
            $treatmentTaken = $row['treatment_type'];
            $qty = $row['qty'];
            $rate = $row['treatment_fees'];
            $amount = $rate * $qty;
            $total += $amount;  

            echo '<tr>';
            echo '<td>' . $treatmentTaken . '</td>';
            echo '<td class="small-column1" id="qty">' . $qty . '</td>';
            echo '<td class="small-column2" id="rate">' . $rate . '</td>';
            echo '<td class="small-column3" id="amount">' . $amount . '</td>';
            echo '</tr>';
        }

        // Calculate the tax
        $taxRate = 0.003; // 0.3% tax rate
        $tax = $taxRate * $total;

        // Calculate the total including tax
        $totalWithTax = $total + $tax + $totalPrice;

        echo '</tbody>';
        echo '</table>';
        echo '<div style="margin-left: 790px;">';
        echo '<p>Subtotal: ' . $total .  '</p>';
        echo '</div>';
        echo '<div style="margin-left: 787px;">';
        echo '<p>Room Pr: ' . $totalPrice . '</p>';
        echo '</div>';
        echo '<div style="margin-left: 783px;">';
        echo '<p>Tax 0.3%: ' . $tax . '</p>';
        echo '</div>';
        echo '<div style="margin-left: 790px; font-size:25px; color:red; font-weight:900;">';
        echo '<p>Total: ' . $totalWithTax . '</p>';
        echo '</div>';
        echo '<div style="text-align: right; margin-right:200px;">';
        echo '<button style="background-color:darkred; padding:10px 30px;border-color:darkred;color:white;font-size:20px; font-weight:600;">Pay</button>';
        echo '</div>';
    }
    ?>
</tbody>
</table>
<input type="hidden" name="subtotal" value="<?php echo $total; ?>">
<input type="hidden" name="tax" value="<?php echo $tax; ?>">
<input type="hidden" name="totalWithTax" value="<?php echo $totalWithTax; ?>">
