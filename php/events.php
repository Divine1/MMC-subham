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
$result=mysqli_query($con,"select event_id,event_Name,event_date,member_limit,no_of_members from event");
$array_result = array();
while($row = mysqli_fetch_array($result)){    
$array_result[] = $row;
}
echo json_encode($array_result);
}
?>