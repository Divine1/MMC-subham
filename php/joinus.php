
<?php
 

	//$emp_id=$_POST['emp'];
	//$first_name=$_POST['FirstName'];
	//$last_name=$_POST['LastName'];
	//$email=$_POST['Email'];
	//$unit=$_POST['Unit'];
	//$contactno=$_POST['ContactNumber'];
	//$sele=$_POST['sel'];
	//$mess=$_POST['message'];
	//$length=strlen($contactno);
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="mmc";
	
	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $emp_id = $request->id;
	$first_name = $request->fname;
    $last_name = $request->lname;
	$email = $request->email;
	$unit = $request->unit;
	$contactno = $request->contact;
	$sele = $request->experience;
	$mess = $request->reason;
	$length = 10;
  
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
				echo "Successfully added you as a member with member ID: $emp_id";
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
			
			echo"Employee ID already exists";
			}
			else{
			
			$sql="insert into joinus (EmpID,First_Name,Last_Name,Email,Unit,Contact,Experience,Why) VALUES('".$emp_id."','".$first_name."','".$last_name."','".$email."','".$unit."','".$contactno."','".$sele."','".$mess."')";
			if (mysqli_query($con, $sql)) 
			{
				echo "Successfully added you as a member with member ID: $emp_id";
				//echo"<script>window.location.href='homepage.php";
			}
		

		
		
			}
			}		

		
			}	
		
			}
				
			}
		else
		{
			echo "enter only alphabets in message";
		}}
		else
		{
			echo "Enter 10 digits for contact number";
		}}
		else
		{
			echo "enter only digits in contact number";
		}}
		else
		{
			echo "enter valid Unit name";
		}}
		else
		{
			echo "enter valid email";
		}}
		else
		{
			echo "enter valid last name";
		}}
		else
		{
			echo "enter valid first name";
		}}
		else
		{
			echo "enter valid employee id";
		}
	


?>





