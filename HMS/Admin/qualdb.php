<?php
include('../Dashboard/db_connection.php');
$qualification_name=$_POST['qualification_name'];
$sql="insert into qualification values(null,'$qualification_name')";

mysqli_query($conn,$sql);
?>
<script>
alert("values inserted...");
document.location="qualification.php";
</script>