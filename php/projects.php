<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="mmc";
$con = mysqli_connect($servername, $username, $password,$db);
if (!$con) 
{
die("Connection failed: " . mysqli_connect_error());
}
else
{
$result=mysqli_query($con,"select Project_ID,Project_Name,Project_Date,MemberLimit,No_of_Members from project");
$array_result = array();
while($row = mysqli_fetch_array($result)){    
$array_result[] = $row;
}
echo json_encode($array_result);
}
?>