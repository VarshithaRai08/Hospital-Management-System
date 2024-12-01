<!DOCTYPE html>
<html>
<head>
  <title>Doctor Profile</title>
  <style>
    .container {
      margin-left: 460px;
      max-width: 400px;
      padding: 20px;
      border: 3px solid darkblue;
      border-radius: 10px;
      background-color: #fff;
      text-align: center;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    h1 {
      margin-left: 260px;
      margin-top: -600px;
      color: darkblue;
      font-weight: 600;
    }
    
    .profile-image {
      border-radius: 50%;
      object-fit: cover;
      width: 150px;
      height: 150px;
      margin-bottom: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
    
    h3 {
      color: darkblue;
      margin: 0;
      font-size: 24px;
      margin-bottom: 10px;
    }
    
    p {
      margin: 20px 0;
      font-size: 18px;
      color: black;
    }
    
    strong {
      font-weight: bold;
    }
    
    .profile-link {
      color: #4CAF50;
      text-decoration: none;
      font-size: 16px;
      display: block;
      margin-top: 20px;
    }
    
    .profile-link:hover {
      text-decoration: underline;
    }
  
    .buttons-container {
      display: flex;
      justify-content: flex-end;
      margin-top: 20px;
    }
  
    .buttons-container button {
      margin-right: 100px;
      background-color: darkblue;
      color: #fff;
      padding: 20px 30px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <?php
    // include first file
    require('../Dashboard/navigation.php');

    // include second file
    require('../Doctor/dcdash.php');

    include('../Dashboard/db_connection.php');

    // Enable error reporting
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // Retrieve the doctor's name from the session
    $doctor_name = $_SESSION['uname'];

    // Escape the doctor's name to prevent SQL injection
    $doctor_name = mysqli_real_escape_string($conn, $doctor_name);

    // Execute a query to retrieve the doctor's details based on the doctor_name
    $sql = "SELECT * FROM doctor_details WHERE doctor_name = '$doctor_name'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Display the doctor details
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
  ?>
  
  <h1>DOCTOR PROFILE</h1>
  
  <?php
    // Check the status of the doctor and determine which button to display
    $status = $row['status'];
    if ($status == 'Available') {
      // Show the "UNAVAILABLE" button
      echo '
      <div class="buttons-container">
        <form method="post" action="unavailable.php">
          <input type="date" name="date" min="' . date('Y-m-d') . '" max="' . date('Y-m-d', strtotime('+10 days')) . '" required>
          <button type="submit">UNAVAILABLE</button>
        </form>
      </div>';
    
    } else {
      // Show the "AVAILABLE" button
      echo '
        <div class="buttons-container">
          <button id="button2" onclick="window.location.href = \'available.php\'">AVAILABLE</button>
        </div>';
    }
  ?>
  
  <div class="container">
    <img src="../upload/<?php echo $row['doctor_photo']; ?>" alt="Doctor Photo" class="profile-image">
    <h3><?php echo $row['doctor_name']; ?></h3>
    <p><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
    <p><strong>Date of Birth:</strong> <?php echo $row['dob']; ?></p>
    <p><strong>Date of Joining:</strong> <?php echo $row['date_of_joining']; ?></p>
    <p><strong>Qualification:</strong> <?php echo $row['qualification_name']; ?></p>
    <p><strong>Specialization:</strong> <?php echo $row['spe_name']; ?></p>
    <p><strong>Address:</strong> <?php echo $row['doctor_address']; ?></p>
    <p><strong>Mobile Number:</strong> <?php echo $row['mobile_number']; ?></p>
    <p><strong>Email ID:</strong> <?php echo $row['email_id']; ?></p>
  </div>
  
  <?php
    } else {
      echo "<p>No doctor details found for the current session.</p>";
    }
  
    // Close the database connection
    mysqli_close($conn);
  ?>

  <script>
    function toggleVisibility(buttonToShow, buttonToHide) {
      var buttonToShowElement = document.getElementById(buttonToShow);
      var buttonToHideElement = document.getElementById(buttonToHide);
      buttonToShowElement.style.display = 'block';
      buttonToHideElement.style.display = 'none';
    }
  </script>
</body>
</html>
