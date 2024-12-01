  <?php
  // include first file
  require('../Dashboard/navigation.php');

  // include second file
  require('../Doctor/dcdash.php');

  ?> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>


   <style>
    body {
      font-family: Arial, sans-serif;
   
    }

    .widget-container {
      display: flex;
      justify-content: flex-start;
      margin-top: -500px;
      margin-left: 280px;
    }

    .widget {
      width: 290px;
      height: 125px;
      background-color: darkorange;
      padding: 15px;
      border-radius: 5px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-right: 30px;
      margin-bottom: 90px;
      margin-top: 20px;
    }

    .widget h2 {
      color: white;
      font-size: 15px;
      margin-bottom: -90px;
      margin-left: -70px;
    }
    .widget p {
      color: white;
      margin-top: 80px;
      font-style: bold;
      font-size: 100px;
    }
    .widget i {
  color: white;

  font-size: 85px;
  opacity: 0.5; /* Set the opacity value between 0 and 1 */
}
.widget-red {
      background-color: darkred;
    }
    .widget-green{
      background-color: darkgreen;
    }
    .widget-red h2 {
      color: white;
      font-size: 18px;
      margin-bottom: -90px;
      margin-left: -120px;
    }
    .widget-green h2 {
      color: white;
      font-size: 18px;
      margin-bottom: -90px;
      margin-left: -110px;
    }
    .widget-green i {
  color: white;
margin-right: 20px;
  font-size: 100px;
  opacity: 0.5; /* Set the opacity value between 0 and 1 */
}
  </style>
  <body>
  <div class="widget-container">
  <div class="widget">
    <?php
    include('../Dashboard/db_connection.php');
    
    // Get the current date
    $currentDate = date('Y-m-d');

    // Query to get the count of appointments for the current date and doctor's name
    $doctorName = $_SESSION["uname"]; // Replace "uname" with the actual doctor's name
    $sql = "SELECT COUNT(*) AS total_count FROM doctor_appointments WHERE appointment_date = '$currentDate' AND doctor_name = '$doctorName'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $totalAppointments = $row["total_count"];
      echo "<p>" . $totalAppointments . "</p>";
      echo "<h2>Today's Appointments</h2>";
    } else {
      echo "No appointments found.";
    }

    $conn->close();
    ?>
    <i class="fas fa-users"></i>
  </div>
  <div class="widget widget-red">
      <?php
    
      include('../Dashboard/db_connection.php');
      $doctorName = $_SESSION["uname"];
      // Query to get the count of doctor suggestions for inpatients
      $sql = "SELECT COUNT(*) AS total_count
      FROM inpatients
      LEFT JOIN discharge ON inpatients.discharge_date = discharge.bill_date
      WHERE discharge.bill_date IS NULL
      AND inpatients.doctor_name = '$doctorName'";

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
      <i class="fa-solid fa-bed-pulse fa"></i>
    </div>
    <div class="widget widget-green">
      <?php
      include('../Dashboard/db_connection.php');
      $doctorName = $_SESSION["uname"];
      $currentDate = date("Y-m-d"); // Current date in Y-m-d format

      $sql = "SELECT COUNT(*) AS total_count 
              FROM doctor_suggestion 
              WHERE doctor_name = '$doctorName' 
              AND patient_visit = '$currentDate' 
              AND patient_type = 'outpatient'";

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
