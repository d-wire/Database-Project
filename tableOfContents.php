<!DOCTYPE html>

<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ./login.php");
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
	<link rel="icon" href="search/SkyrimLogo.png">
  <link rel="stylesheet" href="sidebar.css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
 	<title>Skyrim Table of Contents</title>
<body style="background-image: url('skyrim_bg.jpg'); background-repeat: no-repeat; background-size: cover;" width= "100%" height=auto>

  <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <nav id="spy">
                <ul class="sidebar-nav nav">
                  <li class="sidebar-brand">
                      <a href="tableOfContents.php" data-scroll>
                          <span class="fa fa-home solo">Home</span>
                      </a>
                  </li>
		  <?php	if($_SESSION['staff'] == '1'): ?>
		  <li class="sidebar-brand">
                        <a href="insert/tableInsertForm.php">
                          <span class="fa fa-plus circle">Insert</span>
                        </a>
                    </li>
                    <li class="sidebar-brand">
                      <a href="search/export.php" data-scroll>
                          <span class="fa fa-download solo">Export</span>
                      </a>
                    </li>
		   <?php endif; ?>
                    <li class="sidebar-brand">
                        <a href="logout.php" data-scroll>
                            <span class="fa fa-sign-out">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div id="page-content-wrapper">
                   <a id="menu-toggle" href="#" class="glyphicon glyphicon-align-justify btn-menu toggle" style="color: white; font-size: 30px;">
                   </a>
   <h1 style="text-align: center; color: white; font-family: Bookman Old Style; font-size: 72px;">Skyrim Registry<h1>
  <table class="table" style="margin-right: auto; margin-left: auto; position: relative; top: 50px; width: 40%;">
	<th>
    	<form action="search/creatureSearch.php">
    		<button id="creatures" class="btn btn-primary">Creatures</button>
    	</form>
	</th>
	<th>
    	<form action="search/locationSearch.php">
    		<button id="locations" class="btn btn-primary">Locations</button>
    	</form>
	</th>
	<th>
    	<form action="search/lootSearch.php">
    		<button id="loot" class="btn btn-primary">Loot</button>
    	</form>
	</th>
	<th>
    	<form action="search/npcSearch.php">
    		<button id="npcs" class="btn btn-primary">NPCs</button>
    	</form>
	</th>
	<th>
    	<form action="search/questSearch.php">
    		<button id="quests" class="btn btn-primary">Quests</button>
    	</form>
	</th>
	<th>
    	<form action="search/weaponSearch.php">
    		<button id="weapons" class="btn btn-primary">Weapons</button>
    	</form>
	</th>
  </table>

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
