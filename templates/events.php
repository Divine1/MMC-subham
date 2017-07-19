<br>
<h2 class="agile-inner-title">Events</h2>	
<div class="container" style="height:400px">
 
  <table class="table" >
    <thead>
      <tr>
        <th>Name</th>
        <th>Date</th>
        <th>Slot Remaining</th>
		<th>Details</th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="list in lists">
        <td>{{list[1]}}</td>
        <td>{{list[2]}}</td>
        <td>{{list[3]}}</td>
		<td><a href="#/events/{{list[0]}}">View Details</a></td>
      </tr>
     
   
    </tbody>
  </table>
  <?php 
			session_start();
			if( isset($_SESSION['login']) && $_SESSION['login'] == "success"){?>
					<button class="btn btn-primary" data-toggle="modal" data-target="#myModal5">Add Event</button>
					<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;</button>
									<h4 class="modal-title" id="myModalLabel">Add Event</h4>
										<div class="agileits-login">
											<form>
												<input type="text" name="eventId" ng-model="eventId" placeholder="Event Id" required=""/>
												<input type="text" name="eventName" ng-model="eventName" placeholder="Event Name" required=""/>
												<input type="text" name="eventAnchor" ng-model="eventAnchor" placeholder="Event Anchor" required=""/>
												<input type="text" name="eventDate" ng-model="eventDate" placeholder="Event Date" required=""/>
												<input type="email" name="Email" ng-model="Email" placeholder="Email" required=""/>
												<input type="text" name="memberLimit" ng-model="memberLimit" placeholder="Member Limit" required=""/>
												<input type="text" name="eventDesc" ng-model="eventDesc" placeholder="Event Description" required=""/>
													<div class="w3ls-submit">
														<div class="submit-text">
															<button class="btn btn-success" ng-click="eventAdd()">REGISTER</button><br> 
														</div>	
													</div>	
											</form>
										</div> 
								</div>
								
							</div>
						</div>
					</div>
			<?php }else{ echo "";}?>
</div>