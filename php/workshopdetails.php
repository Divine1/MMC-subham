<?php

	$id=$_GET;
	$string = implode('', $id);
	//echo $string;
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

		$result=mysqli_query($con,"select Workshop_ID,Workshop_Name,Workshop_Desc,No_of_Members,Workshop_Date,Workshop_Anchor,Email from Workshop where Workshop_ID='$string'");
		
		$array_result = array();
		while($row = mysqli_fetch_array($result)){    
		$array_result[] = $row;
		}
		echo json_encode($array_result);	
}
?>
			 
   


	
