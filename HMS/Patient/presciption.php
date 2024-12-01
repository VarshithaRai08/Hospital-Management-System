<?php

session_start();
include '../Dashboard/db_connection.php';

$uname = $_SESSION['uname'];

// Retrieve patient information from the "registration" table
$registrationSql = "SELECT * FROM registration WHERE pidno='$uname'";
$registrationResult = $conn->query($registrationSql);

if ($registrationResult->num_rows > 0) {
  $row = $registrationResult->fetch_assoc();
}

// Retrieve doctor suggestion information from the "doctor_suggestion" table
$doctorSql = "SELECT * FROM doctor_suggestion WHERE patient_number='$uname'";
$doctorResult = $conn->query($doctorSql);

if ($doctorResult->num_rows > 0) {
  $doctorRow = $doctorResult->fetch_assoc();
  $consultedDoctor = $doctorRow['doctor_name'];
  $visitedDate = $doctorRow['patient_visit'];

  // Retrieve doctor details from the "doctor_details" table
  $doctorDetailsSql = "SELECT * FROM doctor_details WHERE doctor_name='$consultedDoctor'";
  $doctorDetailsResult = $conn->query($doctorDetailsSql);

  if ($doctorDetailsResult->num_rows > 0) {
    $doctorDetailsRow = $doctorDetailsResult->fetch_assoc();
    $doctorContactNumber = $doctorDetailsRow['mobile_number'];
  }
}

// Retrieve prescription and treatment_type information from the "doctor_suggestion" table
$prescriptionSql = "SELECT * FROM doctor_suggestion WHERE patient_number='$uname'";
$prescriptionResult = $conn->query($prescriptionSql);

if ($prescriptionResult->num_rows > 0) {
  $prescriptions = array();
  while ($prescriptionRow = $prescriptionResult->fetch_assoc()) {
    $prescriptions[] = $prescriptionRow['prescription'];
  }
}

// Retrieve doctor fees from the "doctor_suggestion" table
$doctorFeesSql = "SELECT doctor_fees FROM doctor_suggestion WHERE patient_number='$uname'";
$doctorFeesResult = $conn->query($doctorFeesSql);

if ($doctorFeesResult->num_rows > 0) {
  $doctorFeesRow = $doctorFeesResult->fetch_assoc();
  $doctorFees = $doctorFeesRow['doctor_fees'];
}

// Assuming you have established a database connection, execute the SQL query
$query = "SELECT * FROM doctor_suggestion WHERE patient_number = '$uname'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
  // Display the prescription form
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Hospital Prescription Form</title>
    <style>
      /* Some basic styling for the form */
      form {
        width: 50%;
        height: 900px;
        border: 2px solid black;
        padding: 20px;
        margin: 0 auto; /* Add this line to center the form */
      }

      .logo img {
        height: 150px;
        width: 150px;
        margin-left: -10px;
      }

      .title h1 {
        font-size: 20px;
        text-transform: uppercase;
        color: rgba(11, 10, 84, 0.822);
        font-weight: 900;
        font-family: sans-serif;
        text-align: center; /* Aligns the text in the center */
        margin-top: -130px; /* Removes the default top margin for h1 */
      }
      .title p {
        font-size: 15px;
        color: rgba(11, 10, 84, 0.822);
        font-weight: 700;
        text-align: center; /* Aligns the text in the center */
        margin-top: 10px; /* Adjusted margin-top for proper spacing */
      }

      .logo.right {
        text-align: right;
        margin-top: -110px;
      }

      .logo.right img {
        height: 100px;
        width: 110px;
      }
      hr {
        border: 2px solid black;
      }
      h2 {
        text-align: center; /* Aligns the text in the center */
        font-size: 18px;
        margin-top: 10px;
        color: black;
      }
      h3 {
        text-align: left; /* Aligns the text in the center */
        font-size: 15px;
        margin-top: 10px;
        color: black;
      }
      .right-content {
        margin-top: -150px;
        font-weight: 700;
        margin-left: 350px;
        font-size: 15px;
      }
      .left-content {
        margin-top: 20px;
      }
      .left-content p {
        font-size: 15px;
        margin-bottom: 5px;
        font-weight: 700;
      }
      .inner-form {
        margin-top: 80px;
        max-width: 720px;
        height: 400px;
        border: 2px solid black;
        padding: -60px;
      }
      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }

      th, td {
        margin-top: -10px;
        border-right: 1px solid black;
        padding: 8px;
        text-align: left;
      }

      th.services {
        color: black;
        border-color: black;
        background-color: gray;
        border-color: black;
        width: 70%; /* Adjust the width according to your preference */
      }

      th.amount {
        color: black;
        border-color: black;
        background-color: gray;
        width: 30%; /* Adjust the width according to your preference */
      }
      .hori {
        border: 1px solid black;
      }
      .print-button {
        display: block;
        margin-top: 20px;
        text-align: right;
        background-color: blue;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
  <form id="print-form">
      <nav>
        <div class="logo">
          <img src="../img/abhaya.jpg" alt="Logo">
        </div>
        <div class="title">
          <h1>Abhaya Ayurvedic Hospital</h1>
          <p>Mahatma Gandhi, Kodialbail</p>
          <p>Mangalore-575003</p>
        </div>
        <div class="logo right">
          <img src="../img/doc1.jpg" alt="Logo">
        </div>
      </nav>
      <br>
      <hr> <!-- Horizontal line -->
      <h2>Prescription and Consultant Receipt</h2>
      <?php if ($doctorResult->num_rows > 0) { ?>
        <div class="left-content">
          <p>Patient Number: <span><?php echo isset($row['pidno']) ? $row['pidno'] : ''; ?></span></p>
          <p>Patient Name: <span><?php echo isset($row['first_name']) && isset($row['last_name']) ? $row['first_name'] . ' ' . $row['last_name'] : ''; ?></span></p>

          <p>Contact No: <span><?php echo isset($row['contact_no']) ? $row['contact_no'] : ''; ?></span></p>
          <p>Gender: <span><?php echo isset($row['gender']) ? $row['gender'] : ''; ?></span></p>
          <p>Address: <span><?php echo isset($row['address']) ? $row['address'] : ''; ?></span></p>
        </div>
        <hr>
        <div class="right-content">
          <p>Visited Date: <span><?php echo isset($visitedDate) ? $visitedDate : ''; ?></span></p>
          <p>Consulted Doctor: <span><?php echo isset($consultedDoctor) ? $consultedDoctor : ''; ?></span></p>
          <p>Contact Number: <span><?php echo isset($doctorContactNumber) ? $doctorContactNumber : ''; ?></span></p> 
        </div>
        
        <div class="inner-form">
          <h2>Prescription</h2>
          <hr>
          <?php if (!empty($prescriptions)) { ?>
            <table>
              <?php foreach ($prescriptions as $prescription) { ?>
                <tr>
                  <td><?php echo $prescription; ?></td>
                </tr>
              <?php } ?>
            </table>
          <?php } ?>
          <hr>
          <h2>Payable</h2>
          <hr>
          <table>
            <tr>
              <th class="services">Services</th>
              <th class="amount">Amount</th>
            </tr>
            <tr>
              <td>Consultant Fees</td>
              <td><?php echo $doctorFees; ?></td>
            </tr>
            <tr>
              <td colspan="2"><hr class="hori"></td>
            </tr>
          </table>
          <div style="display: flex; justify-content: space-between;">
            <div>
              <h3>Amount Received <br>Rupees Five Hundred Only</h3>
            </div>
            <div style="text-align:center;">
              <h3 style="display: inline; margin-right:30px;">Net Amount &nbsp; &nbsp; &nbsp; &nbsp;</h3>
              <h3 style="display: inline;margin-right:130px; text-decoration: underline;border-bottom: double;">Rs &nbsp;<?php echo $doctorFees; ?></h3>
            </div>
          </div>
          <tr>
            <td colspan="2"><hr class="hori"></td>
          </tr>
        </div>
      <?php } ?>
      <button class="print-button" onclick="printForm()">Print</button>
    </form>
    <script>
      function printForm() {
        var printContents = document.getElementById("print-form").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
      }
    </script>
  </body>
  </html>
  <?php
} else {
  echo "No prescription found for the patient.";
}
?>
