<!DOCTYPE html>

<html>
<head>
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/jsbootstrap.min.js"></script>
 	<link rel="icon" href="SkyrimLogo.png">
	<title>Skyrim Weapon Search</title>
	<button class="btn btn-info" type=button onclick="location.href = 'http://plato.cs.virginia.edu/~ljd3za/skyrim/tableOfContents.php';">Home</button>
	<button class="btn btn-danger" type=button onclick="location.href = 'http://plato.cs.virginia.edu/~ljd3za/skyrim/logout.php'">Logout</button>
	<script>
	$(document).ready(function() {
		$("#button1").click(function() {

			$.ajax({
				url: 'weaponQuery.php',
				data: {weapon: $( "#searchWeaponInput" ).val()},
				success: function(data){
					$('#searchWeaponResult').html(data);

				}
			});
		});

	});
	</script>

	<script>
	$(document).ready(function() {
		$("#button2").click(function() {

			$.ajax({
				url: 'weaponQuery.php',
				data: {damage: $( "#searchWeaponDamage" ).val(), gt: $( "#gt" ).prop("checked"), lt: $( "#lt" ).prop("checked")},
				success: function(data){
					$('#searchWeaponResult2').html(data);

				}
			});
		});

	});
	</script>

	<script>
	$(document).ready(function() {
		$("#button3").click(function() {

			$.ajax({
				url: 'weaponQuery.php',
				data: {value: $( "#searchWeaponValue" ).val(), gt2: $( "#gt2" ).prop("checked"), lt2: $( "#lt2" ).prop("checked")},
				success: function(data){
					$('#searchWeaponResult3').html(data);

				}
			});
		});

	});
	</script>

	<script>
	$(document).ready(function() {
		$("#button4").click(function() {

			$.ajax({
				url: 'weaponQuery.php',
				data: {weight: $( "#searchWeaponWeight" ).val(), gt3: $( "#gt3" ).prop("checked"), lt3: $( "#lt3" ).prop("checked")},
				success: function(data){
					$('#searchWeaponResult4').html(data);

				}
			});
		});

	});
	</script>

</head>
<body>
	<h3 style="position: relative; left: 50px;">Search by Weapon Name</h3>
  <div class="container">
		<div class="row">
			<div class="form-group">
	       <input class="form-control" style="width: 20%;" id="searchWeaponInput" type="search" size="30" placeholder="Weapon Name"/>
	       <button id="button1" class="btn btn-primary">Search</button>
      </div>
    </div>
  </div>
  <h4 style="position: relative; left: 25px;">Weapon Name Search Result</h4>
	<div id="searchWeaponResult"></div>
</br>
	</br>

	<h3 style="position: relative; left: 50px;">Search by Weapon Damage</h3>
  <div class="container">
    <div class="row">
      <div class="form-group">
         <input class="form-control" style="width: 20%;" id="searchWeaponDamage" type="search" size="30" placeholder="Weapon Damage"/>
         <button id="button2" class="btn btn-primary">Search</button>
      </div>
    </div>
  </div>
	<span style="position: relative; left: 50px;"><input type="checkbox" class="form-check-input" id="gt"/>Greater Than</span>
	<span style="position: relative; left: 60px;"><input type="checkbox" class="form-check-input" id="lt"/>Less Than</span>
  <h4 style="position: relative; left: 25px;">Weapon Damage Search Result</h4>
	<div id="searchWeaponResult2"></div>
	<br/><br/>

	<h3 style="position: relative; left: 50px;">Search by Weapon Value</h3>
  <div class="container">
    <div class="row">
      <div class="form-group">
         <input class="form-control" style="width: 20%;" id="searchWeaponValue" type="search" size="30" placeholder="Weapon Value"/>
         <button id="button3" class="btn btn-primary">Search</button>
      </div>
    </div>
  </div>
	<span style="position: relative; left: 50px;"><input type="checkbox" class="form-check-input" id="gt2"/>Greater Than</span>
	<span style="position: relative; left: 60px;"><input type="checkbox" class="form-check-input" id="lt2"/>Less Than</span>
  <h4 style="position: relative; left: 25px;">Weapon Value Search Result</h4>
	<div id="searchWeaponResult3"></div>
	<br/><br/>

	<h3 style="position: relative; left: 50px;">Search by Weapon Weight</h3>
  <div class="container">
    <div class="row">
      <div class="form-group">
         <input class="form-control" style="width: 20%;" id="searchWeaponWeight" type="search" size="30" placeholder="Weapon Weight"/>
         <button id="button4" class="btn btn-primary">Search</button>
      </div>
    </div>
  </div>
	<span style="position: relative; left: 50px;"><input type="checkbox" class="form-check-input" id="gt3"/>Greater Than</span>
	<span style="position: relative; left: 60px;"><input type="checkbox" class="form-check-input" id="lt3"/>Less Than</span>
  <h4 style="position: relative; left: 25px;">Weapon Weight Search Result</h4>
	<div id="searchWeaponResult4"></div>
	<br/><br/>

</body>
</html>
