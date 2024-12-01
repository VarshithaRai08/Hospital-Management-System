<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <style >
    nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 80px;
  background-color: white;
  padding: 0px 20px 0 0;
}

.logo img {
  margin-top: 30px;
  height: 100px;
  width: 250px;
}

.title h1 {
  font-size: 35px;
  margin: 0;
  text-transform: uppercase;
  color: darkgreen;
  font-weight: 900;
  font-family: sans-serif;
}

.menu-button {
  position: relative;
  display: inline-block;
}

.menu-btn {
  background-color: #3c6cc7;
  border-radius: 50px;
  padding: 15px 30px;
  color: #ffffff;
  font-size: 20px;
  padding: 8px 20px;
  transition: all 0.3s ease-in-out; 
  text-decoration: none;
}



.menu-btn:hover {
  
  color:white;
border-radius: 50px; 
      background-color: rgb(34, 146, 68);
      padding: 8px 20px; 
      font-weight: bold; 
      transition: all 0.3s ease-in-out; 
}



  </style>
</head>

<body>
<nav>
  <div class="logo">
    <img src="../img/logo3.jpeg" alt="Logo">
  </div>
  <div class="title">
    <h1>Hospital Management System</h1>
  </div>
  <div class="menu-button">
  <a href="../Dashboard/logout.php" class="menu-btn">Logout</a>
</div>

</nav>

</script>
</body>
</html>
