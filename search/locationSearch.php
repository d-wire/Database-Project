
<!DOCTYPE html>

<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../login.php");
  exit;
}
?>



<html>
<head>
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/jsbootstrap.min.js"></script>
 	<link rel="icon" href="SkyrimLogo.png">
	<title>Skyrim Location Search</title>
	<button class="btn btn-info" type=button onclick="location.href = 'http://plato.cs.virginia.edu/~ljd3za/skyrim/tableOfContents.php';">Home</button>
	<button class="btn btn-danger" type=button onclick="location.href = 'http://plato.cs.virginia.edu/~ljd3za/skyrim/logout.php'">Logout</button>
	<script>
	$(document).ready(function() {
		$("#button1").click(function() {

			$.ajax({
				url: 'locationQuery.php',
				data: {region: $( "#searchRegionInput" ).val()},
				success: function(data){
					$('#searchRegionResult').html(data);

				}
			});
		});

	});
	</script>

	<script>
	$(document).ready(function() {
		$("#button2").click(function() {

			$.ajax({
				url: 'locationQuery.php',
				data: {title: $( "#searchTitleInput" ).val()},
				success: function(data){
					$('#searchTitleResult').html(data);

				}
			});
		});

	});
	</script>


</head>
<body>
	<h3 style="position: relative; left: 50px;">Search by Location Region</h3>
	<div class="container">
		<div class="row">
			<div class="form-group">
				<input class="form-control" style="width: 20%;" id="searchRegionInput" type="search" size="30" placeholder="Location Region"/>
				<button id="button1" class="btn btn-primary">Search</button>
			</div>
		</div>
	</div>
	<h4 style="position: relative; left: 25px;">Location Region Search Result</h4>
	<div id="searchRegionResult"></div>
	</br>

	<h3 style="position: relative; left: 50px;">Search by Location Title</h3>
	<div class="container">
		<div class="row">
			<div class="form-group">
				<input class="form-control" style="width: 20%" id="searchTitleInput" type="search" size="30" placeholder="Location Title"/>
				<button id="button2" class="btn btn-primary">Search</button>
			</div>
		</div>
	</div>
	<h4 style="position: relative; left: 25px;">Location Title Search Result</h4>
	<div id="searchTitleResult"></div>
	</br>

</body>
</html>
