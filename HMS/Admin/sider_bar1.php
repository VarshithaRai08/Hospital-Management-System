<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

  <title>Admin Panel</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }
    
    .sidebar {
      margin-left:10px;
		margin-top:40px;
		position:initial;
      top:150;
      left: 0;
      height: 100%;
      width: 225px;
      background-color: darkred;
      color: #fff;
      margin-right:10px;
	 

    }
    
    .sidebar-menu {
      list-style: none;
      margin: 0;
      padding: 0;
    }
    
    .sidebar-menu li a {
      display: block;
      padding: 18px;
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      font-size: 15px;
    }
    
    .sidebar-menu li a:hover {
      background-color:#FFE87C;
      color: darkred;
     font-weight: 600;
      width: 210px;
    }
    
    .sidebar-menu li.active a {
      background-color:blue;
    }
    
    .main-content {
		margin-top:-520px;
      margin-left:240px;
      padding: 50px;
      background-color: #f2f2f2;
    }
    
    .centered {
      text-align: center;
	  font-size:25px;
    margin-left: 30px;
    position:relative;
    }
    
    .logo img {
      height: 90px;
      width: 250px;
    }
    .sidebar-menu li a i {
  margin-right: 10px;
  font-size: 30px;
}

.sidebar-menu li a:hover i,
.sidebar-menu li.active a i {
  color:darkred;
}

.sidebar-menu li a:hover i {
  transform: scale(1.2);
}

    
   
  </style>
</head>
<body>
  <nav class="sidebar">
    <ul class="sidebar-menu" id="nav-accordion">
      
        <h5 class="centered">ADMIN</h5>
    
      
<li>
  <a href="../Admin/doctorview.php"><i class="fas fa-user-md"></i> Doctor Details</a>
</li>
<li>
  <a href="../Admin/patient.php"><i class="fas fa-user-injured"></i> Patient Details</a>
</li>
<li>
  <a href="../Admin/TreatmentView.php"><i class="fas fa-notes-medical"></i> Treatment</a>
</li>
<li>
  <a href="../Admin/bedform.php"><i class="fa-solid fa-bed-pulse fa"></i> Bed Available</a>
</li>

<li>
  <a href="../Admin/dischargepatientlist.php"><i class="fas fa-file-invoice-dollar"></i> Bill Details</a>
</li>
<li>
  <a href="../Admin/qualification.php"><i class="fas fa-graduation-cap"></i> Qualification</a>
</li>
<li>
  <a href="../Admin/specializationView.php"><i class="fas fa-stethoscope"></i> Specialization</a>
</li>
<li>
  <a href="../Admin/blog.php"><i class="fas fa-file-alt"></i>
 Reports</a>
</li>

<li>
  <a href="../Dashboard/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</li>

    </ul>
  </nav>
  
</body>
</html>

