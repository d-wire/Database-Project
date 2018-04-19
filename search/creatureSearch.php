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
	<title>Skyrim Creature Search</title>
	<button class="btn btn-info" type=button onclick="location.href = 'http://plato.cs.virginia.edu/~ljd3za/skyrim/tableOfContents.php';">Home</button>
	<button class="btn btn-danger" type=button onclick="location.href = 'http://plato.cs.virginia.edu/~ljd3za/skyrim/logout.php'">Logout</button>
	<script>
	$(document).ready(function() {
		$("#button1").click(function() {

			$.ajax({
				url: 'creatureSearch.php',
				data: {species: $( "#searchCreatureSpecies" ).val()},
				success: function(data){
					$('#searchCreatureResult').html(data);

				}
			});
		});

	});
	</script>


</head>
<body>
	<h3 style="position: relative; left: 50px;">Search by Creature Species</h3>
  <div class="container">
		<div class="row">
			<div class="form-group">
	         <input class="form-control" style="width: 20%;" id="searchCreatureSpecies" type="search" size="30" placeholder="Creature Species"/>
	         <button id="button1" class="btn btn-primary">Search</button>
        </div>
      </div>
    </div>
  <h4 style="position: relative; left: 25px;">Creature Species Search Result</h4>
	<div id="searchCreatureResult"></div>
	</br>

</body>
</html>
