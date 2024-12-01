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
   margin-left: 10px;
      margin-top: 50px;
      position: initial;
      top: 150px;
      left: 0;
      height: 100%;
      width: 225px;
      background-color:darkblue;
      color: #fff;
      
    }
 .sb img {
  height: 80px;
  width: 80px;
  border-radius: 50%;
  margin-left:10px;
}

    
    .sb ul {
      list-style: none;
      margin: 0;
      padding: 0;
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
     color:darkblue;
     font-weight: 600;
      width: 215px;
    }
    
    .sb ul li.active a,
    .sb ul li.sub-menu:hover a {
      background-color: blue;
    }
    
    .main-content {
      margin-top:-520px;
      margin-left:240px;
      padding: 50px;
      background-color: #f2f2f2;
    }
    
    .centered {
      text-align: center;
      font-size: 20px;
    }

  </style>
</head>
<body>
  <nav class="sb">
    <ul>
      <li>
        <p class="centered"><img src="../img/doctor.png" class="img-circle"  align="center" width="100"></p>
        <h5 class="centered"><?php echo $_SESSION['uname']; ?></h5>
      </li>
      <ul>
      <li>
            <a href="../Doctor/dashboard.php"><i class="fas fa-tachometer-alt"></i>
 Dashboard</a>
          </li>
        <li>
            <a href="../Doctor/ddoctorView1.php"><i class="fas fa-user-md "></i> Doctor Profile</a>
          </li>
          <li>
            <a href="../Doctor/patientview1.php"><i class="fas fa-user-injured"></i> Patient Details</a>
          </li>
         
          <li>
            <a href="../Doctor/currentappointment.php"><i class="fa-solid fa-calendar-days"></i> Appointments</a>
          </li>
          <li>
            <a href="../Doctor/PatientVistButton.php"><i class="fa-solid fa-hospital-user"></i> Patient Visit</a>
          </li>
        
          <li>
            <a href="../Doctor/changeform.php"><i class="fas fa-lock"></i> Change Password</a>
          </li>
          <li>
            <a href="../Dashboard/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </li>
          
    </ul>
  </nav>

</body>
</html>
