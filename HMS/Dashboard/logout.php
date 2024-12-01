<?php 
session_start();
unset($_SESSION["uname"]);
session_destroy();

?>

<script>
alert("Logout...");
document.location="../Dashboard/board.php";
</script>