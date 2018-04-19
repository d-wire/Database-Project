<!DOCTYPE html>

<html>
<head>
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/jsbootstrap.min.js"></script>
 	<link rel="icon" href="SkyrimLogo.png">
	<title>Skyrim Loot Search</title>
	<button class="btn btn-info" type=button onclick="location.href = 'http://plato.cs.virginia.edu/~ljd3za/skyrim/tableOfContents.php';">Home</button>
	<button class="btn btn-danger" type=button onclick="location.href = 'http://plato.cs.virginia.edu/~ljd3za/skyrim/logout.php'">Logout</button>
	<script>
	$(document).ready(function() {
		$("#button1").click(function() {

			$.ajax({
				url: 'lootQuery.php',
				data: {name: $( "#searchLootInput" ).val()},
				success: function(data){
					$('#searchLootResult').html(data);

				}
			});
		});

	});
	</script>

	<script>
	$(document).ready(function() {
		$("#button2").click(function() {

			$.ajax({
				url: 'lootQuery.php',
				data: {value: $( "#searchLootValue" ).val(), gt: $( "#gt" ).prop("checked"), lt: $( "#lt" ).prop("checked")},
				success: function(data){
					$('#searchLootResult2').html(data);

				}
			});
		});

	});
	</script>

	<script>
	$(document).ready(function() {
		$("#button3").click(function() {

			$.ajax({
				url: 'lootQuery.php',
				data: {weight: $( "#searchLootWeight" ).val(), gt2: $( "#gt2" ).prop("checked"), lt2: $( "#lt2" ).prop("checked")},
				success: function(data){
					$('#searchLootResult3').html(data);

				}
			});
		});

	});
	</script>
</head>
<body>
	<h3 style="position: relative; left: 50px;">Search by Loot Name</h3>
  <div class="container">
		<div class="row">
			<div class="form-group">
	       <input class="form-control" style="width: 20%;" id="searchLootInput" type="search" size="30" placeholder="Loot Name"/>
	       <button id="button1" class="btn btn-primary">Search</button>
      </div>
    </div>
  </div>
  <h4 style="position: relative; left: 25px;">Loot Name Search Result</h4>
	<div id="searchLootResult"></div>
	</br>

	<h3 style="position: relative; left: 50px;">Search by Loot Value</h3>
  <div class="container">
		<div class="row">
			<div class="form-group">
	       <input class="form-control" style="width: 20%;" id="searchLootValue" type="search" size="30" placeholder="Loot Value"/>
	       <button id="button2" class="btn btn-primary">Search</button>
      </div>
    </div>
  </div>
	<span style="position: relative; left: 50px;"><input type="checkbox" id="gt"/>Greater Than</span>
	<span style="position: relative; left: 60px;"><input type="checkbox" id="lt"/>Less Than</span>
  <h4 style="position: relative; left: 25px;">Loot Value Search Result</h4>
	<div id="searchLootResult2"></div>
	<br/><br/>

	<h3 style="position: relative; left: 50px;">Search by Loot Weight</h3>
  <div class="container">
		<div class="row">
			<div class="form-group">
	       <input class="form-control" style="width: 20%;" id="searchLootWeight" type="search" size="30" placeholder="Loot Weight"/>
	       <button id="button3" class="btn btn-primary">Search</button>
      </div>
    </div>
  </div>
	<span style="position: relative; left: 50px;"><input type="checkbox" class="form-check-input" id="gt2"/>Greater Than</span>
	<span style="position: relative; left: 60px;"><input type="checkbox" class="form-check-input" id="lt2"/>Less Than</span>
  <h4 style="position: relative; left: 25px;">Loot Weight Search Result</h4>
	<div id="searchLootResult3"></div>
	<br/><br/>

</body>
</html>
