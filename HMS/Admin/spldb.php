<?php
include('../Dashboard/db_connection.php');
$spe_name=$_POST['spe_name'];
$sql="insert into specialization values(null,'$spe_name')";

mysqli_query($conn,$sql);
?>
<script>
alert("values inserted...");
document.location="../Admin/SpecializationView.php";
</script>