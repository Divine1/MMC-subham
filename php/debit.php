

<?php


	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="mmc";

//$name=$_POST['dname'];
//$amount=$_POST['damount'];
//$date=$_POST['ddate'];
//$reason=$_POST['dreason'];
//$link=$_POST['dlink'];
//$desc=$reason." ".$link;


	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $name = $request->cName;
	$amount = $request->cAmount;
	$date = $request->cDate;
	$link = $request->cLink;
	$reason = $request->cReason;
	$desc=$reason." ".$link;





	
	$con = mysqli_connect($servername, $username, $password,$db);
	if (!$con) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	else
	{
	
	 $stmt=mysqli_query($con,"select sum(Amount) from billing where Status='Credited'");
	 $a=mysqli_fetch_row($stmt);
		
	$stmt1=mysqli_query($con,"select sum(Amount) from billing where Status='Debited'");
	$b=mysqli_fetch_row($stmt1);


		$totalamount=$a[0]-$b[0];
 		if($totalamount>=$amount)
		{
		$status="Debited";
	
		$sql="insert into billing (Name,Amount,Date,Description,Status) VALUES('".$name."','".$amount."','".$date1."','".$desc."','".$status."')";
		if (mysqli_query($con, $sql)) 
			{
				echo "The record of debited amount: $amount added successfully";
				//echo"<script>window.location.href='debit.php'</script>";
				
				
			}

		else
			{
			echo "Error in adding the record";

			}
		}

		else
		{


			echo "Insufficient amount";

		}

	}
	

?>