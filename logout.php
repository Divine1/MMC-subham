<?php
session_start();


$_SESSION['check']="No";
unset($_SESSION['login']);
echo"<script>window.location.href='index.php'</script>";

?>

