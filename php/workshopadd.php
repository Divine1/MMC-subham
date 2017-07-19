<?php

	
     $servername = "localhost";
	$username = "root";
	$password = "";
	$db="mmc";
	
	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $pid = $request->workshopId;
    $pname =$request->workshopName;
	$panchor=$request->workshopAnchor;
	$pdate=$request->workshopDate;
	$pdesc=$request->workshopDesc;
	$pemail=$request->email;
	$mlimit=$request->memberLimit;
	//$sysdate=date("d/m/Y");
	
	echo "Shubham";
	//$pid=$_POST['projid'];
	//$pname=$_POST['projname'];
	//$panchor=$_POST['workshopAnchor'];
	//$pdate=$_POST['projdate'];
	//$pdesc=$_POST['projdesc'];
	//$pemail=$_POST['projemail'];
	//$mlimit=$_POST['memlimit'];
	//$sysdate=date("d/m/Y");

	//$d=substr($pdate,0,2);

	//$m=substr($pdate,3,2);

	//$y=substr($pdate,6,4);

	//$date=$y."/".$m."/".$d;


	$con = mysqli_connect($servername, $username, $password,$db);

	
	$sql="insert into workshop (Workshop_Name,Workshop_Anchor,Workshop_Date,Workshop_Desc,Workshop_ID,Email,Member_Limit,Status) VALUES('".$pname."','".$panchor."','".$pdate."','".$pdesc."','".$pid."','".$pemail."','".$mlimit."','Inprogress')";
	if (mysqli_query($con, $sql)) 
		{
	
		echo "workshop added successfully";
					
		}
		else
		{
		echo "Enter valid Details";	
		}


  

?>