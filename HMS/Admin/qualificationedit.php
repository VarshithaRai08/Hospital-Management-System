<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Qualification</title>
  </head>
  <style>
    body {
  font-family: Arial, sans-serif;
}

#container {
 
  width: 100%;
  max-width: 1250px;

}

#main-content {
   background-color:yellow ;
  margin-left:240px;
  margin-top: -520px;
}

.wrapper {
  padding: 20px;
}

h3 {
  margin-top: -20px;
  font-size: 30px;
  margin-bottom: 80px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

td {
  padding: 5px;
  font-size: 20px;
  font-weight: 600;
}

input[type="text"] {
  font-weight: 900;
  width: 50%;
  padding: 8px;
  border: 2px solid black;
  border-radius: 4px;
  transform: uppercase;
}

input[type="submit"],
input[type="reset"] {
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  background-color: blue;
  color: white;
  margin-top: 60px;
}

input[type="submit"]:hover,
input[type="reset"]:hover {
  background-color: green;
}

  </style>

  <body>

    <section id="container">
      <header class="header black-bg">
        <?php include("../Dashboard/navigation.php"); ?>
      </header>

      <aside>
        <div id="sidebar" class="nav-collapse">
          <?php include("../Admin/sider_bar1.php"); ?>
        </div>
      </aside>

      <section id="main-content">
        <section class="wrapper">
          <h3><span class="style1">Qualification</span></h3>
          <?php
	  include('db_connection.php');
	  $qualification_id=$_REQUEST['qualification_id'];
	  $sql="select * from qualification where qualification_id='$qualification_id'";
	  $res=mysqli_query($conn,$sql);
	  $row=mysqli_fetch_array($res);
	  ?>

          <form name="form1" id="formID" method="post" action="../Admin/qualdb.php">
            <div align="center">
              <table width="468" border="0">
                <tr>
                  <td >Qualification Name</td>
                  <td ><input name="qualification_name" type="text" id="qualification_name"></td>
                </tr>
                <tr>
                  <td height="47" colspan="2" align="center">
                    <input type="submit" name="Submit" value="Submit">
                    <input type="reset" name="Reset" value="Reset">
                  </td>
                </tr>
              </table>
            </div>
          </form>
        </section>

  </body>
</html>
