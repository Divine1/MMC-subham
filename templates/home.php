
<div class="container" style="margin-top:50px;margin-bottom:50px">
    
  <div class="row">
    <div class="col-sm-9" style="">
     <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width=670px">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/slider1.jpg" alt="Chania" width="898" height="345">
      </div>

      <div class="item">
        <img src="images/slider2.jpg" alt="Chania" width="898" height="345">
      </div>
    
      <div class="item">
        <img src="images/slider3.jpg" alt="Flower" width="898" height="345">
      </div>

      <div class="item">
        <img src="images/slider4.jpg" alt="Flower" width="898" height="345">
      </div>
    </div>

    <!-- Left and right controls -->

  </div>
</div>
    <div class="col-sm-3" style="height:500px !important">
     <div id="right-col" class="well" >
		<h3>News Feed</h3> 

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
			echo "<marquee direction='up' height=60% scrollDelay=100 class='sidelink' onMouseDown='this.stop()' onMouseOver='this.stop()' onMouseMove='this.stop()' onMouseOut='this.start()' vspace='10'>";
			
			if($stmt=mysqli_query($con,"SELECT Project_Name,Project_ID FROM project ORDER BY Project_Date DESC LIMIT 3"))
		{
		
  		echo " <b><font size=4px color='#cccc00' face='verdana'><i>Latest Projects </i> </font></b></br> ";
			while($ans=mysqli_fetch_row($stmt))
			{
				$pi=$ans[0];
				$id=$ans[1];
				echo "<a href='projectDetails.php?pid=$id'><font size=2px face='verdana' color='black'>$pi</font></a></br> ";
		}
	echo "</br>";
}
if($stmt1=mysqli_query($con,"SELECT event_name,event_id FROM event ORDER BY event_date DESC LIMIT 3"))
		{
		
  		echo " <b><font size=4px color='#cccc00' face='verdana'><i>Latest Events </i> </font></b></br> ";
			while($ans1=mysqli_fetch_row($stmt1))
			{
				$pi=$ans1[0];
				$id=$ans1[1];
				echo "<a href='eventDetails.php?eid=$id'><font size=2px face='verdana' color='black'>$pi</font></a></br> ";

	}

echo "</br>";	
}

		$stmt3=mysqli_query($con,"select count(Workshop_ID) from workshop");
		$ans4=mysqli_fetch_row($stmt3);
		if($ans4[0]==0)
		{
			echo " <b><font size=4px color='#cccc00' face='verdana' ><i>Latest Workshops </i></font></b></br> ";
			echo "<font size=2px face='verdana'>Coming soon!!!</font>";
			echo "</br>";

		}

		else
			{	
		

				if($stmt2=mysqli_query($con,"SELECT Workshop_Name,Workshop_ID FROM workshop ORDER BY Workshop_Date DESC LIMIT 3"))
				{
		
  					echo " <b><font size=4px color='#cccc00' face='verdana' ><i>Latest Workshops </i></font></b></br> ";
					while($ans2=mysqli_fetch_row($stmt2))
					{
						$pi=$ans2[0];
						$id=$ans2[1];
						echo "<a href='workshopDetails.php?wid=$id'><font size=2px face='verdana' color='black'>$pi</font></a></br> ";
					
					}

					echo "</br>";	
		

				}
  				}


		echo "</marquee>";
	}

 ?>
  
  </div>    
    </div>
  </div>
</div>