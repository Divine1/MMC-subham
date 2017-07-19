<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db="mmc";
//$user=$_POST['emp'];
$con = mysqli_connect($servername, $username, $password,$db);
if (!$con) 
{
die("Connection failed: " . mysqli_connect_error());
}
else
{

$postdata = file_get_contents("php://input");
  $request = json_decode($postdata);
  $name = $request->email;
  $pass = $request->password;
//$name=$_POST['emp'];
//$pass=$_POST['pass'];
$res=mysqli_query($con,"select count(*) from admin_login where Email='$name' and Password='$pass'");
  $a=mysqli_fetch_row($res);
if($a[0]==1)
     {
     $_SESSION['login']="success";
echo "1";
}
else
{
echo "0";
}	
}
?>