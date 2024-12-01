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
    $query = "SELECT ap_id FROM doctor_appointments WHERE pidno = '$patient_number' AND patient_name = '$patient_name'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $appointment_id = $row['ap_id'];
    } else {
        echo "No appointment found for the specified patient.";
    }
}

// Get the logged-in doctor's name (uname)
$doctor_name = $_SESSION['uname'];

?>

<!DOCTYPE html>
<html>
<head>
  <title>Patient Form</title>
  <style>
  body {
    font-family: Arial, sans-serif;
  }
h1{
  margin-top:-550px;
  margin-left: 260px;
  color: darkblue;
}
  form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
   
    margin-left: 269px;
  }

  label {
  display: inline-block;
  width: 150px;
  margin-bottom: 10px;
  font-weight: bold;
  font-size: 18px;
}

  input[type="text"],
  select {
    width: 300px;
    padding: 10px;
    border: 3px solid darkblue;
    border-radius: 10px;
  }

  select {
    width: 320px;

  }

  textarea {
    width: 310px;
    height: 50px;
    padding: 5px;
    border: 3px solid darkblue; /* Added border color */
    border-radius: 10px;
  }

  input[type="submit"] {
    padding: 10px 20px;
    background-color: darkblue;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  /* Additional styles for the submit button */
  button[type="submit"] {
    display: inline-block;
    padding: 10px 20px;
    background-color: darkblue;
    color: #fff;
    border: none;
    border-radius: 10px;
    cursor: pointer;
  }

  button[type="submit"]:hover {
    background-color: darkblue;
  }
</style>


</head>
<body>
  <h1>SUGGESTION</h1>

<form method="POST" action="../Doctor/doctorsuggestioninsert.php">

    <label for="patientNumber">Patient Number:</label>
    <input type="text" id="patientNumber" name="patientNumber" value="<?php echo $patient_number; ?>" readonly required><br><br>

    <label for="patientName">Patient Name:</label>
    <input type="text" id="patientName" name="patientName" value="<?php echo $patient_name; ?>" readonly required><br><br>

    <label for="doctorName">Doctor Name:</label>
    <input type="text" id="doctorName" name="doctorName" value="<?php echo $doctor_name; ?>" readonly required><br><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea><br><br>

    <label for="prescription">Prescription:</label>
    <textarea id="prescription" name="prescription" required></textarea><br><br>

    <label for="doctorFees">Doctor Fees:</label>
<input type="text" id="doctorFees" name="doctorFees" value="500.00" readonly required><br><br>



    <label for="others">Others:</label>
    <input type="text" id="others" name="others" ><br><br>

    <label for="patientType">Patient Type:</label>
    <select id="patientType" name="patientType"  required>
      <option value="">Select</option>
      <option value="inpatient">Inpatient</option>
      <option value="outpatient">Outpatient</option>
    </select><br><br>



   
   

    <button type="submit">Submit</button>


    <br><br>
    
  </form>
</body>
</html>
