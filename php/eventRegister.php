<?php

   //$id=$_GET['eid'];

 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="mmc";
	
	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $id = $request->eventId;
    $mid = $request->employeeId;
	
	//$mid=$_POST['mid'];

	
	$con = mysqli_connect($servername, $username, $password,$db);

	if (!$con) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	else
	{		
        	$res=mysqli_query($con,"select count(event_id) from event where event_id='$id'");
        	$a=mysqli_fetch_row($res);
		
        	

		$res1=mysqli_query($con,"select count(event_id) from eventmember where event_id='$id'");
        	$b=mysqli_fetch_row($res1);

		
		$res2=mysqli_query($con,"select count(EmpID) from joinus where EmpID='$mid'");
        	$c=mysqli_fetch_row($res2);
		
		$res3=mysqli_query($con,"select member_limit from event where event_id='$id'");
        	$d=mysqli_fetch_row($res3);

		$res4=mysqli_query($con,"select count(event_id) from eventmember where event_member_id ='$mid' and event_id='$id'");
		$e=mysqli_fetch_row($res4);
		


		if(preg_match('/^[^0-9]*$/',$mid))
		{
			echo "Enter only Numbers in Member ID";	
		
		}
	
	
		elseif($a[0]==0)
			{
                         
	
			echo "Event ID  does not exists !!";

			}
		elseif($b[0]==$d[0])
			{
				
			echo "Seats are full!!";
			}

		elseif($c[0]==0)
			{
				
                         echo "You are not a registered member . Go to \"JOIN US\" and become a member";

			}

		elseif($e[0]==1)
			{
				echo "$mid have already registered in $id";
			}
		
			
		else
			{
				$sql="insert into eventmember (event_id,event_member_id) VALUES('".$id."','".$mid."')";
			if (mysqli_query($con, $sql)) 
			{
				mysqli_query($con,"update event set no_of_members=no_of_members+1 where event_id='$id'");
				echo "You are added successfully in event id :$id";
				//echo"<script>window.location.href='event.php'</script>";
			}
			}
	
		
						
			
				
	
}	

?>