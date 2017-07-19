<?php

	
     $servername = "localhost";
	$username = "root";
	$password = "";
	$db="mmc";
	
	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $eid = $request->eventId;
    $ename =$request->eventName;
	$eanchor=$request->eventAnchor;
	$edate=$request->eventDate;
	$edesc=$request->eventDesc;
	$eemail=$request->email;
	$mlimit=$request->memberLimit;
	//$sysdate=date("d/m/Y");
	
	//echo "Shubham";
	//$pid=$_POST['projid'];
	//$pname=$_POST['projname'];
	//$panchor=$_POST['projectAnchor'];
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

	$sql="insert into event (event_name,event_date,event_anchor, event_desc,event_id,member_limit,email,status) VALUES('".$ename."','".$edate."','".$eanchor."','".$edesc."','".$eid."','".$mlimit."','".$eemail."','Inprogress')";
	if (mysqli_query($con, $sql)) 
		{
	
		echo "Event added successfully";
					
		}
		else
		{
		echo "Enter valid Details";	
		}


  

?>