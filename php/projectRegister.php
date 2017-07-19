<?php

   
// $id=$_GET['pid'];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="mmc";

	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $id = $request->projectId;
    $mid = $request->employeeId;
	//$id = implode('', $projectId);
	
	//$mid=$_POST['mid'];

	$con = mysqli_connect($servername, $username, $password,$db);

	if (!$con) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	else
	{		
        	$res=mysqli_query($con,"select count(Project_ID) from project where Project_ID='$id'");
        	$a=mysqli_fetch_row($res);

        	

		$res1=mysqli_query($con,"select count(Project_ID) from member where Project_ID='$id'");
        	$b=mysqli_fetch_row($res1);
		
		
		$res2=mysqli_query($con,"select count(EmpID) from joinus where EmpID='$mid'");
        	$c=mysqli_fetch_row($res2);

		
		$res3=mysqli_query($con,"select MemberLimit from project where Project_ID='$id'");
        	$d=mysqli_fetch_row($res3);
		
		
		$res4=mysqli_query($con,"select count(Project_ID) from member where Member_ID ='$mid' and Project_ID='$id'");
		$e=mysqli_fetch_row($res4);
		
		       	
		if(preg_match('/^[^0-9]*$/',$mid))
		{
			echo "Enter only Numbers in Member ID";	
		
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
				$sql="insert into member (Project_ID,Member_ID) VALUES('".$id."','".$mid."')";
			if (mysqli_query($con, $sql)) 
			{
				
				mysqli_query($con,"update project set No_of_Members=No_of_Members+1 where Project_ID='$id'");

				echo "You are added successfully in project id :$id";
						
				//echo"<script>window.location.href='project.php'</script>";
			}
			}
	
		
						
			
				
	
}	

?>