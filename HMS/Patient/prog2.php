<?php
$host="localhost:3307";
$user="root";
$password="";
$database="student";

$conn=mysqli_connect($host,$user,$password,$database);

if(!$conn)
{
die("connection error:".mysqli_connect_error());
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>php program</title>
</head>
<body>
<div>
<form method="POST" action="#">
<p>FULL NAME
<input type="text" name="name" required>
<p>AGE
<input type="text" name="age" required>
<p>ADDRESS
<textarea name="address" required></textarea>
<p>PHONE
<input type="text" name="phone" required pattern="[0-9]{10}">
<input type="submit" value="save" name="save">
</form>
<?php

if(isset($_POST['save']))
{
$name=$_POST['name'];
$age=$_POST['age'];
$address=$_POST['address'];
$phone=$_POST['phone'];

$query="INSERT INTO `user` (`name`,`age`,`address`,`phone`)values('".$name."','".$age."','".$address."','".$phone."')";
mysqli_query($conn,$query);
echo " <script>
alert('save sucessfully');
</script>";
}
?>

</div>
<div>
<table border="1">
<tr style="color:red;">
<th>Name</th>
<th>Age</th>
<th>Address</th>
<th>Phone</th>
<tr>
<?php
$sql="select * from user";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0)
{
	while($row=mysqli_fetch_array($result))
	{
		$name=$row[0];
		$age=$row[1];
		$address=$row[2];
		$phone=$row[3];
?>
<tr>
<td><?php echo $name; ?></td>
<td><?php echo $age; ?></td>
<td><?php echo $address; ?></td>
<td><?php echo $phone; ?></td>
<tr>
<?php
	}
}
?>
</table>
</div>
</body>
</head>

