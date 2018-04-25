
<!DOCTYPE html>

<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../login.php");
  exit;
}

        require "dbutil.php";
$db = DbUtil::loginConnection();
$stmt = $db->stmt_init();

if($_POST['locationID'] != '')
{
   $id = $_POST['locationID'];
   if($stmt->prepare("DELETE FROM skyrim_Location WHERE locationID=$id") or die(mysqli_error($db)))
   {
       $stmt->execute();
       $stmt->close();
   }
   $_POST['locationID'] = '';
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
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
	<title>Skyrim Location Search</title>
	<script>
	$(document).ready(function() {
		$("#button").click(function() {

			$.ajax({
				url: 'locationQuery.php',
				data: {param: $( "#searchLocation" ).val(), sb: $( "#sb" ).val()},
				success: function(data){
					$('#searchLocationResult').html(data);

				}
			});
		});

	});
	</script>

</head>
<body style="background-image: url('../skyrim_bg.jpg'); background-repeat: no-repeat; background-size: cover; color: white;" width= "100%" height=auto>

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
                          <span class="fa fa-plus circle">Insert</span>
                        </a>
                    </li>
                    <li class="sidebar-brand">
                        <a href="export.php" data-scroll>
                            <span class="fa fa-download solo">Export</span>
                        </a>
                    </li>
       <?php endif; ?>
                    <li class="sidebar-brand">
                        <a href="../logout.php" data-scroll>
                            <span class="fa fa-sign-out">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div id="page-content-wrapper">
                   <a id="menu-toggle" href="#" class="glyphicon glyphicon-align-justify btn-menu toggle" style="color: white; font-size: 30px;">
                   </a>
	<div class="container">
	<h3 style="position: relative; left: -15px; padding-left: 10px;">Search Locations</h3>
		<div class="row">
			<div class="form-group" style="padding-left: 10px;">
				<input class="form-control" style="width: 20%;" id="searchLocation" type="search" size="30" placeholder=""/>
				<button id="button" class="btn btn-primary">Search</button>
			</div>
		</div>
    <span style="font-size: 18px;">
      Search by:
    </span>
      <select id="sb" style="color: black;">
	<option value="sbr">Region</option>
	<option value="sbt">Title</option>
      </select>
	<h4 style="position: relative; left: 25px;">Locations Search Result</h4>
	<div id="searchLocationResult"></div>
	</br>

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
