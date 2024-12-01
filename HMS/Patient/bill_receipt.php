<?php
session_start();
include '../Dashboard/db_connection.php';

$username = $_SESSION['uname'];
// Retrieve patient information from the "registration" table
$registrationSql = "SELECT * FROM registration WHERE pidno='$username'";
$registrationResult = $conn->query($registrationSql);

if ($registrationResult->num_rows > 0) {
  $row = $registrationResult->fetch_assoc();
}

// Retrieve doctor suggestion information from the "doctor_suggestion" table
$doctorSql = "SELECT * FROM doctor_suggestion WHERE patient_number='$username'";
$doctorResult = $conn->query($doctorSql);

if ($doctorResult->num_rows > 0) {
    $doctorRow = $doctorResult->fetch_assoc();
    $consultedDoctor = $doctorRow['doctor_name'];
  
    $visitedDate = $doctorRow['patient_visit'];

    $doctorDetailsSql = "SELECT * FROM doctor_details WHERE doctor_name='$consultedDoctor'";
  $doctorDetailsResult = $conn->query($doctorDetailsSql);

  if ($doctorDetailsResult->num_rows > 0) {
    $doctorDetailsRow = $doctorDetailsResult->fetch_assoc();
    $doctorContactNumber = $doctorDetailsRow['mobile_number'];
  }
}



$query = "SELECT * FROM discharge WHERE patient_number = '$username'";
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
      max-height: 100%;
      border: 2px solid black;
      padding: 20px;
      margin: 0 auto; /* Add this line to center the form */
    }

    .logo img {
      height: 150px;
      width: 180px;
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

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 100px;
      



    }

    th,
    td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }
    
    .left-image {
  margin-top: -10px;
  margin-left: 400px;
  width: 300px;

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
    <p>Mangalure-575003</p>
  </div>
  <div class="logo right">
    <img src="../img/doc1.jpg" alt="Logo">
  </div>
</nav>
<br>
<hr> <!-- Horizontal line -->
<h2>BILL</h2>
<div class="left-content">
  <p>Patient Number: <span><?php echo isset($row['pidno']) ? $row['pidno'] : ''; ?></span></p>
  <p>Patient Name: <span><?php echo isset($row['first_name']) && isset($row['last_name']) ? $row['first_name'] . ' ' . $row['last_name'] : ''; ?></span></p>
  <p>Contact No: <span><?php echo isset($row['contact_no']) ? $row['contact_no'] : ''; ?></span></p>
  <p>Gender: <span><?php echo isset($row['gender']) ? $row['gender'] : ''; ?></span></p>
  <p>Address: <span><?php echo isset($row['address']) ? $row['address'] : ''; ?></span></p>
</div>
<hr>
<hr>
<div class="right-content">
  <p>Visited Date: <span><?php echo isset($visitedDate) ? $visitedDate : ''; ?></span></p>
  <p>Consulted Doctor: <span><?php echo isset($consultedDoctor) ? $consultedDoctor : ''; ?></span></p>
  <p>Contact Number: <span><?php echo isset($doctorContactNumber) ? $doctorContactNumber : ''; ?></span></p> 
</div>

<!-- Inner Form with Table -->
<form id="inner-form">
  <table>
    <thead>
      <tr>
        <th>Room Type</th>
        <th>No of Days</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Fetch data from the "bill" table
      $billSql = "SELECT * FROM bill WHERE patient_number='$username'";
      $billResult = $conn->query($billSql);

      if ($billResult->num_rows > 0) {
        while ($billRow = $billResult->fetch_assoc()) {
          $roomType = $billRow['room_type'];
          $noOfDays = $billRow['no_of_days'];
          $roomprice = $billRow['room_price'];
          ?>
          <tr>
            <td><?php echo $roomType; ?></td>
            <td><?php echo $noOfDays; ?></td>
            <td><?php echo $roomprice; ?></td>
          </tr>
          <?php
        }
      }
      ?>
    </tbody>
  </table>
  </div>
  <div style="text-align:right; margin-top:10px">
  <h3 style="display: inline;">Room Amount:&nbsp;&nbsp;</h3>
  <h3 style="display: inline;margin-right:100px;text-decoration: underline;border-bottom: double;color:red">Rs &nbsp;<?php echo $roomprice; ?></h3>
</div>
<table style="margin-top: 20px;">
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
    $result = $conn->query("SELECT it.treatment_type, COUNT(*) AS qty, td.treatment_fees FROM inpatient_treatment AS it INNER JOIN treatment_details AS td ON it.treatment_type = td.treatment_name WHERE it.patient_number = '$username' GROUP BY it.treatment_type");

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
      $totalWithTax = $total + $tax + $roomprice;

      echo '</tbody>';
      echo '</table>';
      echo '<div style="margin-left: 420px;">';
      echo '<p>Subtotal: ' . $total .  '</p>';
      echo '</div>';
      echo '<div style="margin-left: 420px;">';
      echo '<p>Room Pr: ' . $roomprice . '</p>';
      echo '</div>';
      echo '<div style="margin-left: 420px;">';
      echo '<p>Tax 0.3%: ' . $tax . '</p>';
      echo '</div>';
      echo '<div style="margin-left: 420px;margin:top:50px; font-size:25px; color:red; font-weight:900;">';
      echo '<p>Total: ' . $totalWithTax . '</p>';
      echo '</div>';

    }
    ?>
  </tbody>
</table>
<div class="logo left-image">
  <img src="../img/p1.jpg" alt="Paid" w>
</div>
<button class="print-button" onclick="printForm()">Print</button>
</form>

<script>
  function printForm() {
    var printContents = document.getElementById('print-form').innerHTML;
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
  echo "No bill available";
}
?>
