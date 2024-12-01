<!DOCTYPE html>
<html>
  <head>
    <title>Navigation Bar with Logo and Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
	 nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 50px;
        background-color:#2E8B57;
        padding: 0 20px;
        font-family: sans-serif;
        font-weight: 900;
        color: white;
      }

      .left-nav,
      .center-nav,
      .right-nav {
        display: flex;
        align-items: center;
        color:white ;
      }

      .left-nav i,
      .center-nav i,
      .right-nav i {
        margin-right: 5px;
        color: #fafafa;
      }

      .left-nav {
        font-weight: bold;
      }

      .center-nav a,
      .right-nav a {
        text-decoration: none;
        color: #333;
      }
      .nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 100px;
  background-color: white;
  position: relative; /* Add this line to enable top property */
 /* Add this line to set the top position */
top:10px;
     
      }

      .logo {
        display: flex;
        align-items: center;
      }

      .logo img {
        height: 100px;
        width:270px;
      }

      .menu {
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .menu li {
        list-style: none;
        margin-right: 20px;
		font-family:sans-serif;
		padding:25px;
      }

      .menu a {
        text-decoration: none;
        color: #333;
        font-weight:900;
      }

      .menu a:hover {
        color:white;
		border-radius: 50px; 
      background-color: red;
      padding: 8px 20px; 
      font-weight: bold; 
      transition: all 0.3s ease-in-out; 
    }
    </style>
    </head>
  <body>
  <nav>
      <div class="left-nav">
        <i class="fa-sharp fa-solid fa-location-dot fa-beat fa-2xl" style="color:red;"></i> Mangalore-575022
      </div>
      <div class="center-nav">
        <i class="fa-solid fa-envelope fa-beat fa-2xl" style="color:red;"></i>abhayahospital@gmail.com
      </div>
      <div class="right-nav">
        <i class="fa-solid fa-phone-volume fa-beat fa-2xl" style="color:red"></i>0824-323554
      </div>
    </nav>
    <div class="nav">
      <div class="logo">
        <img src="../img/logo3.png" alt="Logo">
       
      </div>
      <ul class="menu">
        <li><a href="board.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="doctors.php">Doctors</a></li>
        <li><a href="logreg.php">Login</a></li>
        <li><a href="registration.php">Register</a></li>
      </ul>
   </div>
   <br>
  </body>
  <html>