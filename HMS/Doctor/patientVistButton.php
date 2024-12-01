<!DOCTYPE html>
<html>
<head>
<style>
    .button-container {
      display: flex;
      margin-left: 300px;
      margin-top: -450px;
    }

    .add-appointment-button {
      padding: 100px 150px;
    
      margin-left: 60px;
      color: white;
      border: none;
      border-radius: 20px;
      border: 3px solid blue;
      cursor: pointer;
      font-size: 16px;
      background-image: url("../img/ip1.jpg"); /* Replace with the path to your add appointment button image */
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      margin-right: 40px;;
    }

    .view-appointment-button {
      padding: 100px 150px;
      margin-left: -40px;
      color: white;
      border: none;
      border-radius: 20px;
      border: 3px solid blue;
      cursor: pointer;
      font-size: 16px;
      background-image: url("../img/op1.jpg"); /* Replace with the path to your view appointment button image */
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      margin-left: 50px;
    }

    .add-appointment-button:hover {
      background-color: red;
    }

    .view-appointment-button:hover {
      background-color: red;
    }
  </style>
</head>
<body>
    <?php  // include first file
  require('../Dashboard/navigation.php');

  // include second file
  require('../Doctor/dcdash.php');
?>
  <div class="button-container">
    <a href="../Doctor/inpatientsView.php">
      <button class="add-appointment-button"></button>
    </a>

    <a href="../Doctor/outpatients.php">
      <button class="view-appointment-button"></button>
    </a>
  </div>
</body>
</html>
