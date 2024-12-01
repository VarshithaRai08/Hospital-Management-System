<!DOCTYPE html>
<html>
<head>
<style>
    .button-container {
      display: flex;
      margin-left: 300px;
      margin-top: -500px;
    }

    .add-appointment-button {
      padding: 100px 150px;
    
      margin-left: 60px;
      color: white;
      border: none;
      border-radius: 20px;
      border: 5px solid darkred;
      cursor: pointer;
      font-size: 16px;
      background-image: url("../img/gen.jpg"); /* Replace with the path to your add appointment button image */
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      margin-right: 100px;;
    }

    .view-appointment-button {
      padding: 100px 150px;
      margin-left: -40px;
      color: white;
      border: none;
      border-radius: 20px;
      border: 5px solid darkred;
      cursor: pointer;
      font-size: 16px;
      background-image: url("../img/spe.jpg"); /* Replace with the path to your view appointment button image */
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
  require('../Admin/sider_bar1.php');
?>
  <div class="button-container">
    <a href="../Admin/genbed.php">
      <button class="add-appointment-button"></button>
    </a>

    <a href="../Admin/spebed.php">
      <button class="view-appointment-button"></button>
    </a>
  </div>
</body>
</html>

     