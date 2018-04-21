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
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="../sidebar.css">
  <link rel="icon" href="SkyrimLogo.png">
	<title>Skyrim Loot Search</title>
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
  <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <nav id="spy">
                <ul class="sidebar-nav nav">
                  <li class="sidebar-brand">
                      <a href="../tableOfContents.php" data-scroll>
                          <span class="fa fa-home solo">Home</span>
                      </a>
                  </li>
      <?php	if($_SESSION['staff'] == '1'): ?>
      <li class="sidebar-brand">
                        <a href="../insert/tableInsertForm.php">
                          <span class="fa fa-home solo">Insert</span>
                        </a>
                    </li>
                    <li class="sidebar-brand">
                        <a href="#anch1" data-scroll>
                            <span class="fa fa-home solo">Update</span>
                        </a>
                    </li>
                    <li class="sidebar-brand">
                        <a href="#anch2" data-scroll>
                            <span class="fa fa-home solo">Delete</span>
                        </a>
                    </li>
       <?php endif; ?>
                    <li class="sidebar-brand">
                        <a href="../logout.php" data-scroll>
                            <span class="fa fa-home solo">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div id="page-content-wrapper">
                   <a id="menu-toggle" href="#" class="glyphicon glyphicon-align-justify btn-menu toggle" style="color: black; font-size: 30px;">
                       <i class="fa fa-bars"></i>
                   </a>
<div class="container">
  <h3 style="position: relative; left: -15px;">Search by Loot Name</h3>
		<div class="row">
			<div class="form-group">
	       <input class="form-control" style="width: 20%;" id="searchLootInput" type="search" size="30" placeholder="Loot Name"/>
	       <button id="button1" class="btn btn-primary">Search</button>
      </div>
    </div>
  <h4 style="position: relative; left: 25px;">Loot Name Search Result</h4>
	<div id="searchLootResult"></div>
	</br>

	<h3 style="position: relative; left: -15px;">Search by Loot Value</h3>
		<div class="row">
			<div class="form-group">
	       <input class="form-control" style="width: 20%;" id="searchLootValue" type="search" size="30" placeholder="Loot Value"/>
	       <button id="button2" class="btn btn-primary">Search</button>
      </div>
    </div>
	<span style="position: relative; left: -15px;"><input type="checkbox" id="gt"/>Greater Than</span>
	<span style="position: relative; left: -5px;"><input type="checkbox" id="lt"/>Less Than</span>
  <h4 style="position: relative; left: 25px;">Loot Value Search Result</h4>
	<div id="searchLootResult2"></div>
	<br/><br/>

	<h3 style="position: relative; left: -15px;">Search by Loot Weight</h3>
		<div class="row">
			<div class="form-group">
	       <input class="form-control" style="width: 20%;" id="searchLootWeight" type="search" size="30" placeholder="Loot Weight"/>
	       <button id="button3" class="btn btn-primary">Search</button>
      </div>
    </div>
	<span style="position: relative; left: -15px;"><input type="checkbox" class="form-check-input" id="gt2"/>Greater Than</span>
	<span style="position: relative; left: -5px;"><input type="checkbox" class="form-check-input" id="lt2"/>Less Than</span>
  <h4 style="position: relative; left: 25px;">Loot Weight Search Result</h4>
	<div id="searchLootResult3"></div>
	<br/><br/>
</div>
</div>
</div>
</body>

<script>
  $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("active");
  });

  $("#menu-toggle").trigger('click');

  /*Scroll Spy*/
  $('body').scrollspy({ target: '#spy', offset:80});

  /*Smooth link animation*/
  $('a[href*=#]:not([href=#])').click(function() {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
              $('html,body').animate({
                  scrollTop: target.offset().top
              }, 1000);
              return false;
          }
      }
  });
</script>
</html>
