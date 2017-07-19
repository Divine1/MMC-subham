var app = angular.module('myApp', ['ngRoute']);
app.config(function($routeProvider) {
   $routeProvider
.when("/home", {
       templateUrl : "templates/home.php",
	   controller : 'homeController'
   })
   .when("/about", {
       templateUrl : "templates/about.html"
   })
   .when("/projects", {
       templateUrl : "templates/projects.php",
		controller : 'projectsController'
   })
   .when("/events", {
       templateUrl : "templates/events.php",
		controller : 'eventsController'
   })
	.when("/workshops", {
       templateUrl : "templates/workshops.php",
	   controller : 'workshopsController'
   })
	.when("/gallery", {
       templateUrl : "templates/gallery.html",
	   controller : 'galleryController'
   })
	.when("/projects/:projectid", {
		templateUrl : "templates/projectdetail.html",
		controller : 'projectdetailController'
	})
	.when("/events/:eventid", {
		templateUrl : "templates/eventdetail.html",
		controller : 'eventdetailController'
	})
	.when("/workshops/:workshopid", {
		templateUrl : "templates/workshopdetail.html",
		controller : 'workshopdetailController'
	})
	.when("/credit", {
		templateUrl : "templates/credit.html",
		controller : 'creditController'
	})
	.when("/debit", {
		templateUrl : "templates/debit.html",
		controller : 'debitController'
	})
	.when("/transactions", {
		templateUrl : "templates/transactions.html",
		controller : 'transactionsController'
	})
	.otherwise({
       templateUrl : "templates/home.php"
   });
});

app.controller('homeController',function($scope,$rootScope,$http){
	
})



app.controller('galleryController',function($scope,$rootScope,$http){
	$http.get('php/gallery.php',{}).success(function(data){
	$scope.lists=data;
	});
})



app.controller('creditController',function($scope,$http,$q){
	$scope.credit = function(){
		var request = $http({
			method:"POST",
			url: "php/credit.php",
			data:{
				cName:$scope.cName,
				cAmount:$scope.cAmount,
				cDate:$scope.cDate,
				cSource:$scope.cSource
			},
			headers:{'Content-Type': 'application/x-www-form-urlencoded' }
		});
		request.success(function(data){
			alert(data);
			
		
		});
		
	};
	
})
app.controller('debitController',function($scope,$http,$q){
	$scope.debit = function(){
		var request = $http({
			method:"POST",
			url: "php/debit.php",
			data:{
				cName:$scope.cName,
				cAmount:$scope.cAmount,
				cDate:$scope.cDate,
				cReason:$scope.cReason,
				cLink:$scope.cLink
			},
			headers:{'Content-Type': 'application/x-www-form-urlencoded' }
		});
		request.success(function(data){
			alert(data);
			
		
		});
		
	};
	
})
app.controller('transactionsController',function($scope,$http){
	$http.get('php/transactions.php',{}).success(function(data){
		$scope.lists=data;
	});
	
})

app.controller('projectsController',function($scope,$rootScope,$http,$q){
	$http.get('php/projects.php',{}).success(function(data){
	$scope.lists=data;
	});
	$scope.projectAdd = function(){
		var request = $http({
			method:"POST",
			url: "php/projectadd.php",
			data:{
				projectId:$scope.projectId,
				projectName:$scope.projectName,
				projectAnchor:$scope.projectAnchor,
				projectDate:$scope.projectDate,
				memberLimit:$scope.memberLimit,
				email:$scope.Email,
				projectDesc:$scope.projectDesc
			},
			headers:{'Content-Type': 'application/x-www-form-urlencoded' }
		});
		request.success(function(data){
			alert(data);
			$('#myModal4').modal('hide');
		
		});
		
	};
	
})

app.controller('workshopsController',function($scope,$rootScope,$http,$q){
	$http.get('php/workshops.php',{}).success(function(data){
	$scope.lists=data;
	});
	$scope.workshopAdd = function(){
		var request = $http({
			method:"POST",
			url: "php/workshopadd.php",
			data:{
				workshopId:$scope.workshopId,
				workshopName:$scope.workshopName,
				workshopAnchor:$scope.workshopAnchor,
				workshopDate:$scope.workshopDate,
				memberLimit:$scope.memberLimit,
				email:$scope.Email,
				workshopDesc:$scope.workshopDesc
			},
			headers:{'Content-Type': 'application/x-www-form-urlencoded' }
		});
		request.success(function(data){
			alert(data);
			$('#myModal6').modal('hide');
		
		});
		
	};
	
})

app.controller('projectdetailController',function($scope,$rootScope,$routeParams,$http,$q){
//console.log("in projectdetailController");

	var x = $routeParams.projectid;

	$http({
	url:'php/projectdetails.php',
	method:'GET',
	params: x
	}).success(function(data){
	$scope.lists=data;
	console.log($scope.lists);
	});
   

	$scope.projectRegister = function () {
	console.log($scope.employeeId);
	var request = $http({
	method: "post",
	url: "php/projectRegister.php",
	data: {
	employeeId: $scope.employeeId,
	projectId: x
	},
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	});
	request.success(function (data) {
	alert(data);
	$('#myModal3').modal('hide');
	});
	};
})

app.controller('workshopdetailController',function($scope,$rootScope,$routeParams,$http,$q){

	var x = $routeParams.workshopid;

	$http({
	url:'php/workshopdetails.php',
	method:'GET',
	params: x
	}).success(function(data){
	$scope.lists=data;
	console.log($scope.lists);
	});
   

	$scope.WorkshopRegister = function () {
	console.log($scope.employeeId);
	var request = $http({
	method: "post",
	url: "php/workshopRegister.php",
	data: {
	employeeId: $scope.employeeId,
	workshopId: x
	},
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	});
	request.success(function (data) {
	alert(data);
	$('#myModal7').modal('hide');
	});
	};
})

app.controller('eventsController',function($scope,$rootScope,$http,$q){
	$http.get('php/events.php',{}).success(function(data){
	$scope.lists=data;
	//console.log($scope.lists);
	});
	$scope.eventAdd = function(){
		var request = $http({
			method:"POST",
			url: "php/eventadd.php",
			data:{
				eventId:$scope.eventId,
				eventName:$scope.eventName,
				eventAnchor:$scope.eventAnchor,
				eventDate:$scope.eventDate,
				memberLimit:$scope.memberLimit,
				email:$scope.Email,
				eventDesc:$scope.eventDesc
			},
			headers:{'Content-Type': 'application/x-www-form-urlencoded' }
		});
		request.success(function(data){
			alert(data);
			$('#myModal5').modal('hide');
		
		});
		
	};
})

app.controller('eventdetailController',function($scope,$rootScope,$routeParams,$http,$q){
	var x = $routeParams.eventid;
	console.log(x);
	$http({
	url:'php/eventdetails.php',
	method:'GET',
	params: x
	}).success(function(data){
	$scope.lists=data;
	console.log($scope.lists);
});
	$scope.eventRegister = function () {
	console.log($scope.employeeId);
	var request = $http({
	method: "post",
	url: "php/eventRegister.php",
	data: {
	employeeId: $scope.employeeId,
	eventId: x
	},
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	});
	request.success(function (data) {
	alert(data);
	$('#myModal4').modal('hide');
	});
	};


})

app.controller('loginController', function ($scope, $http) {
	$scope.login = function () {
	console.log($scope.email);
	console.log($scope.password);
	var request = $http({
	method: "post",
	url: "php/login.php",
	data: {
	email: $scope.email,
	password: $scope.password
	},
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	});
	request.success(function (data) {
	if(data == "1"){
		alert("Successful: "+window.location.href);
		$('#myModal2').modal('hide');
		window.location.reload(true);
	}
	else {
		console.log("Unsuccessful");
		alert("Unsuccessful");
	$scope.responseMessage = "Username or Password is incorrect";
	}
	});
	}
})
app.controller('joinusController', function ($scope, $http) {
	$scope.joinus = function () {
	//console.log($scope.email);
	//console.log($scope.password);
	var request = $http({
	method: "post",
	url: "php/joinus.php",
	data: {
	fname: $scope.fname,
	lname: $scope.lname,
	id:	$scope.id,
	email: $scope.email,
	unit: $scope.unit,
	contact: $scope.contact,
	experience: $scope.experience,
	reason: $scope.reason
	
	},
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	});
	request.success(function (data) {
	alert(data);
	//window.location = '#home';
	$('#myModal1').modal('hide');
	//if(data == "1"){
	//	alert("Successful");
	//	console.log("Successful");
	//$scope.responseMessage = "Successfully Logged In";
	//}
	//else {
	//	console.log("Unsuccessful");
	//	alert("Unsuccessful");
	//$scope.responseMessage = "Username or Password is incorrect";
	//}
	});
	}
});