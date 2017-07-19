<?php
 
if(isset($_POST["submit"]))
{
	$emp_id=$_POST['emp'];
	$first_name=$_POST['FirstName'];
	$last_name=$_POST['LastName'];
	$email=$_POST['Email'];
	$unit=$_POST['Unit'];
	$contactno=$_POST['ContactNumber'];
	$sele=$_POST['sel'];
	$mess=$_POST['message'];
	$length=strlen($contactno);
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="mmc";
       
        if (preg_match('/^[0-9]*$/', $emp_id)) 
	{

		if(preg_match('/^[a-zA-Z]*$/',$first_name))
		{
	        if(preg_match('/^[a-zA-Z]*$/',$last_name))
		{
		if(preg_match('/^[a-zA-Z0-9]*\.[a-zA-Z0-9]*\@infosys.com$/',$email) or preg_match('/^[a-zA-Z0-9]*\_[a-zA-Z0-9]*\@infosys.com$/',$email) or preg_match('/^[a-zA-Z0-9]*\@infosys.com$/',$email))
		{
		if(preg_match('/^[a-zA-Z0-9]*$/',$unit))
		{
		if(preg_match('/^[0-9]*$/',$contactno))
		{
		if($length==10)
		{
		if(preg_match('/^[a-zA-Z ,.]*$/',$mess))
		{
			$con = mysqli_connect($servername, $username, $password,$db);

			if (!$con) 
			{
			die("Connection failed: " . mysqli_connect_error());
			}
			else
			{
		
			$stmt1=mysqli_query($con,"select count(EmpID) from joinus");
			$ans1=mysqli_fetch_row($stmt1);
			if($ans1[0]==0)
			{
				$sql="insert into joinus (EmpID,First_Name,Last_Name,Email,Unit,Contact,Experience,Why) VALUES('".$emp_id."','".$first_name."','".$last_name."','".$email."','".$unit."','".$contactno."','".$sele."','".$mess."')";
			if (mysqli_query($con, $sql)) 
			{
				echo "<script>alert('Successfully added you as a member with member ID: $emp_id')</script>";
			}

			}
	   		else
			{
		
 		
			$stmt=mysqli_query($con,"select EmpID from joinus");
			While($ans=mysqli_fetch_row($stmt))
			{	
			
			$eid=$ans[0];
		
	
			if($eid==$emp_id)
			{
			
			echo"<script> alert('Employee ID already exists')</script>";
			}
			else{
			
			$sql="insert into joinus (EmpID,First_Name,Last_Name,Email,Unit,Contact,Experience,Why) VALUES('".$emp_id."','".$first_name."','".$last_name."','".$email."','".$unit."','".$contactno."','".$sele."','".$mess."')";
			if (mysqli_query($con, $sql)) 
			{
				echo "<script>alert('Successfully added you as a member with member ID: $emp_id')</script>";
				echo"<script>window.location.href='index.php'</script>";
			}
		

		
		
			}
			}		

		
			}	
		
			}



				
			}
		else
		{
			echo "<script>alert('enter only alphabets in message')</script>";
		}}
		else
		{
			echo "<script>alert('Enter 10 digits for contact number')</script>";
		}}
		else
		{
			echo "<script>alert('enter only digits in contact number')</script>";
		}}
		else
		{
			echo "<script>alert('enter valid Unit name')</script>";
		}}
		else
		{
			echo "<script>alert('enter valid email')</script>";
		}}
		else
		{
			echo "<script>alert('enter valid last name')</script>";
		}}
		else
		{
			echo "<script>alert('enter valid first name')</script>";
		}}
		else
		{
			echo "<script>alert('enter valid employee id')</script>";
		}
	

}
?>