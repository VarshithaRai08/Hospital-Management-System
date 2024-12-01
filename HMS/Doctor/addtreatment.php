
<?php  // include first file
require('../Dashboard/navigation.php');

// include second file
require('../Doctor/dcdash.php');
?>
<?php

// Check if the user is logged in
if (!isset($_SESSION['uname'])) {
    // Redirect the user to the login page or handle the unauthorized access in some way
    header("Location:../Dashboard/login.php");
    exit;
}

include('../Dashboard/db_connection.php');

// Retrieve the patient number and patient name from the URL parameters
$patient_number = isset($_GET['patient_number']) ? $_GET['patient_number'] : '';
$patient_name = isset($_GET['patient_name']) ? $_GET['patient_name'] : '';

// Retrieve the appointment ID based on the patient number and patient name
$appointment_id = '';
if (!empty($patient_number) && !empty($patient_name)) {
    $query = "SELECT ap_id FROM doctor_appointments WHERE pidno= '$patient_number' AND patient_name = '$patient_name'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $appointment_id = $row['ap_id'];
    } else {
        echo "No appointment found for the specified patient.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Treatment Form</title>
    <style>
    
    h1{
        margin-left:500px;
        margin-top:-600px;
        color: darkblue;
    }

    form {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
    }

    label {
      display: inline-block;
      width: 150px;
      margin-bottom: 10px;
    }

    input[type="text"],
    select {
      width: 300px;
      padding: 10px;
      border: 3px solid darkblue;
    border-radius: 10px;
    }

    select {
            width: 330px;
        }

        .button {
            display: none;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        textarea {
            width: 250px;
            height: 50px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: darkblue;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Add the CSS for the button */
        .previous-treatments-btn {
            position: absolute;
            top: 100px;
            right: 20px;
            padding: 10px 20px;
            background-color: darkblue;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h1>DAILY TREATMENTS</h1>

    <button class="previous-treatments-btn" onclick="location.href='previoustreatments.php?patient_number=<?php echo $patient_number; ?>&patient_name=<?php echo $patient_name; ?>'">Previous Treatments</button>



    <form method="POST" action="addtreatmentinsert.php">
  
    <label for="patientNumber">Patient Number:</label>
    <input type="text" id="patientNumber" name="patientNumber" value="<?php echo $patient_number; ?>" readonly required><br><br>

    <label for="patientName">Patient Name:</label>
    <input type="text" id="patientName" name="patientName" value="<?php echo $patient_name; ?>" readonly required><br><br>

    <?php
    date_default_timezone_set('Asia/Kolkata');

    // Add the current date and time
    $current_date = date("Y-m-d");
    $current_time = date("H:i:s");
    ?>
   <label for="currentDate">Current Date:</label>
<input type="text" id="currentDate" name="currentDate" value="<?php echo $current_date; ?>" readonly required><br><br>

<label for="currentTime">Current Time:</label>
<input type="text" id="currentTime" name="currentTime" value="<?php echo $current_time; ?>" readonly required><br><br>


    <div id="treatmentTypeField" >
  <?php
  // Retrieve the patient number and patient name from the URL parameters
  $patient_number = isset($_GET['patient_number']) ? $_GET['patient_number'] : '';
  $patient_name = isset($_GET['patient_name']) ? $_GET['patient_name'] : '';

  // Retrieve the appointment ID based on the patient number and patient name
  $appointment_id = '';
  if (!empty($patient_number) && !empty($patient_name)) {
    $query = "SELECT d.spe_name, t.treatment_name
              FROM doctor_details d
              INNER JOIN treatment_details t ON d.spe_name = t.treatment_sp
              WHERE doctor_name = '".$_SESSION['uname']."'";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      echo '<label for="treatmentType">Treatment </label>';
      echo '<select id="treatmentType" name="treatmentType">';

      while ($row = mysqli_fetch_assoc($result)) {
        $treatment_name = $row['treatment_name'];
        echo '<option value="' . $treatment_name . '">' . $treatment_name . '</option>';
      }

      echo '</select><br><br>';
    } else {
      echo "No treatment found for the doctor's specialization.";
    }
  }
  ?>
</div>


    <label for="others">Others Treatments:</label>
    <input type="text" id="others" name="others" ><br><br>
   

    <input type="submit" value="Submit">
</form>
</body>
</html>