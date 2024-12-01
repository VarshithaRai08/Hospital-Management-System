<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Blog</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
    
    }
.w1{
  margin-top: -720px;
      margin-left: 290px;
}
    .widget-container {
      display: flex;
      justify-content: flex-start;
     
    }

    .widget {
      width: 280px;
      height: 115px;
      background-color: darkblue;
      padding: 15px;
      border-radius: 5px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-right: 30px;
      margin-bottom: 10px;
      margin-top: 20px;
    }

    .widget h2 {
      color: white;
      font-size: 18px;
      margin-bottom: -90px;
      margin-left: -100px;
    }
    .widget-red h2 {
      color: white;
      font-size: 18px;
      margin-bottom: -90px;
      margin-left: -80px;
    }
    .widget-orange h2 {
      color: white;
      font-size: 18px;
      margin-bottom: -90px;
      margin-left: -130px;
    }
    .widget-brown h2{
      color: white;
      font-size: 18px;
      margin-bottom: -90px;
      margin-left: -71px;
    }
    .widget-green h2 {
      color: white;
      font-size: 18px;
      margin-bottom: -90px;
      margin-left: -80px;
    }
    .widget-purple h2 {
      color: white;
      font-size: 18px;
      margin-bottom: -90px;
      margin-left: -180px;
    }
    .widget-pink h2 {
      color: white;
      font-size: 17px;
      margin-bottom: -90px;
      margin-left: -140px;
    }
    .widget-gray h2 {
      color: white;
      font-size: 17px;
      margin-bottom: -90px;
      margin-left: -100px;
    }
    .widget-green {
      background-color: green;
    }
    .widget-brown {
      background-color: brown;
    }
    .widget-orange {
      background-color: orange;
    }
    .widget-purple {
      background-color: purple;
    }
    .widget-pink {
      background-color: darkcyan;
    }
    .widget-gray {
      background-color: darkslategray;
    }
    .widget-blue {
      background-color: #FF007F;
    }



    .widget p {
      color: white;
      margin-top: 80px;
      font-style: bold;
      font-size: 100px;
    }
    .widget-purple p {
      color: white;
      margin-top: 20px;
      font-style: bold;
      font-size: 40px
    }
    .widget-pink p {
      color: white;
      margin-top: 20px;
      font-style: bold;
      font-size: 30px
    } 

    .widget i {
      color: white;
      font-size: 100px;
      opacity: 0.5;
    }

    .widget-red {
      background-color: red;
    }
  </style>
</head>
<body>
<?php
  // include first file
  require('../Dashboard/navigation.php');

  // include second file
  require('../Admin/sider_bar1.php');
?>
<div class="w1">
  <div class="widget-container">
    <div class="widget">
      <?php
      include('../Dashboard/db_connection.php');
      // Query to get the count of patients from patient_details table
      $sql = "SELECT COUNT(*) AS total_count FROM patient_details";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalPatients = $row["total_count"];
        echo "<p>" . $totalPatients . "</p>";
        echo "<h2>Visited Patients</h2>";
      } else {
        echo "No patients found.";
      }

      $conn->close();
      ?>
       <a href="patient_list.php"><i class="fas fa-user-injured"></i></a>
    </div>
    
    <div class="widget widget-gray">
      <?php
      include('../Dashboard/db_connection.php');
      $currentDate = date("Y-m-d");
      // Query to get the count of something else
      $sql = "SELECT COUNT(*) AS total_count FROM registration WHERE time = '$currentDate'";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalAmount = $row["total_count"];
        echo "<p>" . $totalAmount . "</p>";
        echo "<h2>Today visted patients</h2>";
      } else {
        echo "No data found.";
      }

      $conn->close();
      ?>
 <a href="registration_list.php"><i class="fas fa-hospital"></i></a>
</div>

<div class="widget widget-blue">
  <?php
  include('../Dashboard/db_connection.php');

  // Query to get the count of visited patients today from doctor_details table
  $sql = "SELECT COUNT(*) AS total_count FROM doctor_details ";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalVisitedPatients = $row["total_count"];
    echo "<p>" . $totalVisitedPatients . "</p>";
    echo "<h2>Total Doctors</h2>";
  } else {
    echo "No data found.";
  }

  $conn->close();
  ?>
  <a href="doctor_list.php"><i class="fas fa-stethoscope"></i></a>
</div>


</div>
    

    <!-- Fourth Widget with brown background -->
    <div class="widget-container">

    <!-- Second Widget with red background -->
    <div class="widget widget-red">
      <?php
      include('../Dashboard/db_connection.php');
      // Query to get the count of doctor suggestions for inpatients
      $sql = "SELECT COUNT(*) AS total_count
      FROM inpatients
      LEFT JOIN discharge ON inpatients.discharge_date = discharge.bill_date
      WHERE discharge.bill_date IS NULL
      ";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalSuggestions = $row["total_count"];
        echo "<p>" . $totalSuggestions . "</p>";
        echo "<h2>Inpatients</h2>";
      } else {
        echo "No doctor suggestions found for inpatients.";
      }

      $conn->close();
      ?>
      <a href="in_list.php"><i class="fa-solid fa-bed-pulse fa"></i></a>
    </div>


    <div class="widget widget-orange">
      <?php
      include('../Dashboard/db_connection.php');
      // Query to get the count of something else
      $sql = "SELECT COUNT(*) AS total_count  FROM doctor_suggestion WHERE patient_type = 'outpatient'";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalCount = $row["total_count"];
        echo "<p>" . $totalCount . "</p>";
        echo "<h2>Outpatients</h2>";
      } else {
        echo "No data found.";
      }

      $conn->close();
      ?>
       <a href="out.php"><i class="fas fa-walking"></i></a>
    </div>
    <div class="widget widget-brown">
    <?php
include('../Dashboard/db_connection.php');
$currentDate = date("Y-m-d");

$sql = "SELECT COUNT(*) AS total_count
        FROM inpatients
        WHERE discharge_date = '$currentDate'
        AND patient_number NOT IN (
            SELECT patient_number
            FROM discharge
            WHERE bill_date = '$currentDate'
        )";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $totalCount = $row["total_count"];
  echo "<p>" . $totalCount . "</p>";
  echo "<h2>Ready To Discharge</h2>";
} else {
  echo "No data found.";
}

$conn->close();
?>


      <i class="fas fa-user"></i>
    </div>
 

    </div>
    

    <!-- Fourth Widget with brown background -->
    <div class="widget-container">
    <div class="widget widget-green">
      <?php
      include('../Dashboard/db_connection.php');
      // Query to get the count of something else
      $sql = "SELECT COUNT(*) AS total_count FROM discharge";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalCount = $row["total_count"];
        echo "<p>" . $totalCount . "</p>";
        echo "<h2>Total Discharge</h2>";
      } else {
        echo "No data found.";
      }

      $conn->close();
      ?>
      <a href="discharge_list.php"> <i class="fas fa-chart-bar"></i></a>
    </div>
  
    <div class="widget widget-purple">
      <?php
      include('../Dashboard/db_connection.php');
      // Query to get the count of something else
      $sql = "SELECT SUM(final_amount) AS total_amount FROM bill";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalAmount = $row["total_amount"];
        echo "<p>" . $totalAmount . "</p>";
        echo "<h2>Hospital Earning</h2>";
      } else {
        echo "No data found.";
      }

      $conn->close();
      ?>
    <i class="fa-solid fa-file-invoice-dollar"></i> 

  </div>
  <div class="widget widget-pink">
      <?php
      include('../Dashboard/db_connection.php');
      $currentDate = date("Y-m-d");
      // Query to get the count of something else
      $sql = "SELECT SUM(final_amount) AS total_amount FROM bill WHERE bill_date='$currentDate'";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalAmount = $row["total_amount"];
        echo "<p>" . $totalAmount . "</p>";
        echo "<h2>Todays Earning</h2>";
      } else {
        echo "No data found.";
      }

      $conn->close();
      ?>
<i class="fas fa-coins"></i>


  </div>
 
</body>
</html>
