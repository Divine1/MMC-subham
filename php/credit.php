<?php


//$name=$_POST['cname'];
//$amount=$_POST['camount'];
//$date=$_POST['cdate'];
//$desc=$_POST['csource'];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="mmc";

	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $name = $request->cName;
	$amount = $request->cAmount;
	$date = $request->cDate;
	$desc = $request->cSource;
	
	
	
	


	
	$con = mysqli_connect($servername, $username, $password,$db);
	if (!$con) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	else
	{

	
	
	$status="Credited";

	$sql="insert into billing (Name,Amount,Date,Description,Status) VALUES('".$name."','".$amount."','".$date."','".$desc."','".$status."')";
	if (mysqli_query($con, $sql)) 
			{
				echo "The record of credited amount: $amount added successfully";
				//echo"<script>window.location.href='credit.php'</script>";
				
			}

	else
		{
			echo "Error in adding the record";

		}

	}
	


?>