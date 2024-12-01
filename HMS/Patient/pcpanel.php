<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <title>Doctor Panel</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }
    
    .sb {
      margin-left:10px;
      margin-top: 50px;
     
      top: 150px;
      left: 0;
      height: 100%;
      width: 225px;
      background-color:darkgreen;
      color: #fff;
    }
 .sb img {
  height: 80px;
  width: 80px;
  border-radius: 60%;

  margin-top:-10px;
    
}

    
    .sb ul {
      list-style: none;
      margin: 0;
      padding: 0;
      font-size: 15px;
    }
    
    .sb ul li a {
      display: block;
      padding: 15px;
      color: #fff;
      text-decoration: none;
      
    }
    
    .sb ul li a i {
      margin-right: 10px;
      transition: color 0.2s ease-in-out;
      font-size: 28px;
    }
     

    .sb ul li p.centered a:hover {
      background-color: transparent;
    }


    
    .sb ul li a:hover {
      background-color:#FFE87C;
     color:darkgreen;
     font-weight: 600;
      width: 215px;
    }
    
    .sb ul li.active a,
    .sb ul li.sub-menu:hover a {
      background-color: blue;
    }
    
    .main-content {
      margin-top:-448px;
      margin-left:240px;
      padding: 50px;
      background-color: #f2f2f2;
    }
    
    .centered {
      text-align: center;
      font-size: 23px;
    }
 

  </style>
</head>
<body>
<?php
  // include first file
  require('../Dashboard/db_connection.php');

 
?>

  <nav class="sb">
    <ul>
      <li>
        <p class="centered"><img src="../img/fr-05.jpg" class="img-circle"  align="center" width="200">
    </p>
      <h3 class="centered"><?php echo $_SESSION['uname']; ?></h3>
      </li>
      <ul>
        <li>
            <a href="../Patient/patientprofile.php"><i class="fas fa-user-md "></i> Patient profile</a>
          </li>
          <li>
            <a href="../Admin/doctordetails.php"><i class="fas fa-user-injured"></i> Doctor Details</a>
          </li>
          <li>
            <a href="../Patient/buttons.php"><i class="fa-solid fa-hospital-user"></i> Doctor Appoinment</a>
          </li>
         
          
          <li>
            <a href="../Patient/authenticatn.php"><i class="fa-solid fa-bed-pulse fa"></i>Bed Allotment</a>
          </li>
          <li>
            <a href="../Patient/presciption.php"><i class="fa-solid fa-calendar-days"></i> Presciption receipt</a>
          </li>
          <li>
            <a href="../Patient/bill_receipt.php"><i class="fa-solid fa-file-invoice-dollar"></i>Bill Details</a>
          </li>
         
          <li>
            <a href="../Dashboard/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </li>
          
    </ul>
  </nav>
  
</body>
</html>
