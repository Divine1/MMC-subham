
<!DOCTYPE html>
<html>
<head>   
<title>Madras Makers Club</title>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/app.js"></script>
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /><!-- fontawesome css -->     
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /><!-- Bootstrap stylesheet -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /><!-- stylesheet -->
<link rel="stylesheet" href="css/jquery.maximage.css?v=1.2" type="text/css" media="screen" />

<link href="//fonts.googleapis.com/css?family=Lobster+Two:400,400i,700,700i" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Abel" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		
</head>

	<body ng-app="myApp">
	<!-- top-strip -->
	<div class="w3layouts-top-strip">
		<div class="container-fluid">
		<?php 
			session_start();
			
			if( isset($_SESSION['login']) && $_SESSION['login'] == "success"){ } else{?>
			<div class="w3layouts-login">
				<button class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Join </button>
					<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;</button>
									<h4 class="modal-title" id="myModalLabel">
										Join Us</h4>
										<div class="agileits-login" ng-controller='joinusController'>
													<form>
														<input type="text" ng-model="id" placeholder="Employee Id" required=""/>
														<input type="text" ng-model="fname" placeholder="First Name" required=""/>
														<input type="text" ng-model="lname" placeholder="Last Name" required=""/>
														<input type="text" ng-model="email" placeholder="Infosys EmailId" required=""/>
														<input type="text" ng-model="unit" placeholder="Posted Unit" required=""/>
														<input type="text" ng-model="contact" placeholder="Contact No." required=""/>
														<input type="text" ng-model="experience" placeholder="Experience (Yes/No)" required=""/>
														<input type="text" ng-model="reason" placeholder="Why you would like to join" required=""/> 
														<div class="w3ls-submit">
															<div class="submit-text"> 
															<button class="btn btn-success" ng-click="joinus()">JoinUs</button><br>
															<!--	<input type="submit" value="LOGIN"> -->
															</div>		
														</div>	
													</form>
										</div> 
								</div>
								
							</div>
						</div>
					</div>
			</div>
			<?php }?>
			<!-- Large modal -->
			<?php 
			
			
			if( isset($_SESSION['login']) && $_SESSION['login'] == "success"){ ?>
			
			<button class="btn btn-primary" data-toggle="modal" style="margin-left:700px"><a href="logout.php">Logout</a></button>
			<?php  } else{?>
			
			
			<div class="w3layouts-login">
				<button class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Login</button>
					<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;</button>
									<h4 class="modal-title" id="myModalLabel">
										Login now!</h4>
								</div>
								<div class="modal-body">
									<div class="sap_tabs">
									<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
										<ul class="resp-tabs-list">
											<li class="resp-tab-item"><span>Login Admin</span></li>
											<li class="resp-tab-item"><span>Login Core Members</span></li> 
										</ul>	
										<div class="clearfix"> </div>	
										<div class="resp-tabs-container">
											<div class="tab-1 resp-tab-content" style="background-color:aqua">
												<div class="agileits-login" ng-controller='loginController'>
													<form>
														<input type="text" class="email" ng-model="email" name="Email" placeholder="Username" required=""/>
														<input type="password" class="password" ng-model="password" name="Password" placeholder="Password" required=""/>
														<div class="wthree-text"> 
															<div class="clearfix"> </div>
														</div>  
														<div class="w3ls-submit">
															<div class="submit-text"> 
															<button class="btn btn-success" ng-click="login()">Login</button><br>
															<!--	<input type="submit" value="LOGIN"> -->
															</div>															
														</div>	
													</form>
												</div> 
											</div>
											<div class="tab-1 resp-tab-content">
												<div class="login-top sign-top" style="background-color:pink">
													<div class="agileits-login">
														<form action="#" method="post">
														<input type="text" class="email" name="Email" placeholder="Username" required=""/>
														<input type="password" class="password" name="Password" placeholder="Password" required=""/>
														<div class="wthree-text"> 
															<ul> 
																<li>
																	<label class="anim">
																		<input type="checkbox" class="checkbox">
																		<span> Remember me ?</span> 
																	</label> 
																</li>
																<li> <a href="#">Forgot password?</a> </li>
															</ul>
															<div class="clearfix"> </div>
														</div>  
														<div class="w3ls-submit">
															<div class="submit-text">
																<input type="submit" value="LOGIN"> 
															</div>	
														</div>	
													</form>
													</div>  
												</div>
											</div>
										</div>	
									</div>
									<div class="clearfix"> </div>
								</div>  			
								</div>
							</div>
						</div>
					</div>
			</div>		
<?php }?>			
			<div class="agileinfo-contact-info">
				
				<ul id="Menu">
					<li><img src="images/mmclogo.png" alt="slider image" style="height:50px" /></li>
					<li><h1>Madras Makers Club</h1></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>	
	<!-- //top-strip -->
		
		<!-- navigation -->
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav">
					<li><a href="#home">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#projects">Projects</a></li>
					<li><a href="#events">Events</a></li>
					<li><a href="#workshops">Workshops</a></li>
					<li><a href="#gallery">Gallery</a></li>
					<?php 
			if( isset($_SESSION['login']) && $_SESSION['login'] == "success"){ ?>
			<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Billing <span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li><a href="#credit">Credit</a></li>
						<li><a href="#debit">Debit</a></li>
						
					  </ul>
					</li>
			
			<?php  } else{ }?>
					
					
				  </ul>
				</div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			
		<!-- //navigation -->
		
		<div ng-view></div>
		
		<footer>
			<div class="w3ls-footer-grids">
				<div class="container">
					<div class="col-md-4 w3l-footer one">
						<h3>About MMC</h3>
						<p> The official robotics club ka infosys aims at empowering robotics enthusiasts by providing them with a platform where they learn, collaborate and showcase their creativities in fun-filled environment.</p>
						
						<div class="clearfix"></div>
					</div>
					
					<div class="col-md-4 w3l-footer two">
						<h3>Keep Connected</h3>
						<ul>
							<li><a class="fb" href="#"><i class="fa fa-facebook"></i>Like us on Facebook</a></li>
							<li><a class="fb1" href="#"><i class="fa fa-twitter"></i>Follow us on Twitter</a></li>
							<li><a class="fb2" href="#"><i class="fa fa-google-plus"></i>Add us on Google Plus</a></li>
						</ul>
					</div>
					<div class="col-md-4 w3l-footer three">
						<h3>Contact Information</h3>
						<ul>
							<li><i class="fa fa-map-marker"></i><p>Madras Makers Club <span>Room No - 104,</span>ETA Block. </p><div class="clearfix"></div> </li>
							<li><i class="fa fa-phone"></i><p>+91 8939816497</p> <div class="clearfix"></div> </li>
							<li><i class="fa fa-envelope-o"></i><a href="mailto:roboticsclub_mcity@infosys.com">roboticsclub_mcity@infosys.com</a> <div class="clearfix"></div></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="copy-right-grids">
				<div class="container">
					<div class="copy-left">
							<p class="footer-gd">Copyright © 2016 Infosys Limited | Design by <a href="" target="_blank">Shubham Jaiswal</a></p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</footer>

		

	<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion           
					width: 'auto', //auto or any width like 600px
					fit: true   // 100% fit in a container
				});
			});
		</script>

	
	</body>
	<!-- //body -->
</html>
<!-- //html -->
