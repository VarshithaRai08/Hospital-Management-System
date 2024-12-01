<!DOCTYPE html>
<html>
<head>
  <style>


    .button-container {
      display: flex;
      margin-left: 300px;
      margin-top:-320px;
    }

    button {
      padding: 30px 40px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    .add-appointment {
      margin-left: 200px;
    }

    .view-appointment {
      background-color:red;
      margin-left: 100px;
    }
    button:hover {
      background-color:blue;
    }

  </style>
  
</head>
<body>
    <?php
  // include first file
  require('navigation.php');

  // include second file
  require('sider_bar1.php');
?>
  <div class="button-container">
    <a href="appointment.php">
      <button class="add-appointment">General Ward</button>
    </a>

    <a href="doctorappointmentview.php">
      <button class="view-appointment">Special Ward</button>
    </a>
  </div>
</body>
</html>
