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

if($_POST['itemID'] != '')
{
   $id = $_POST['itemID'];
   if($stmt->prepare("DELETE FROM skyrim_Loot WHERE itemID=$id") or die(mysqli_error
($db)))
   {
       $stmt->execute();
       $stmt->close();
   }
   $_POST['itemID'] = '';
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
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
  <link rel="icon" href="SkyrimLogo.png">
        <title>Skyrim Loot Search</title>

        <script>
        $(document).ready(function() {
                $("#button").click(function() {

                        $.ajax({
                                url: 'lootQuery.php',
                                data: {param: $( "#searchLoot" ).val(), gt: $( "#gt" ).prop("checked"), lt: $( "#lt" ).prop("checked"), sb: $( "#sb" ).val() },
                                success: function(data){
                                        $('#searchLootResult').html(data);

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
      <?php     if($_SESSION['staff'] == '1'): ?>
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
                   <a id="menu-toggle" href="#" class="glyphicon glyphicon-align-justify btn-menu toggle" style="color: black; font-size: 30px;">
                   </a>
<div class="container">
        <h3 style="position: relative; left: -15px;">Search by Loot Value</h3>
                <div class="row">
                        <div class="form-group">
               <input class="form-control" style="width: 20%;" id="searchLoot"
type="search" size="30" placeholder="Loot Value"/>
               <button id="button" class="btn btn-primary">Search</button>
      </div>
    </div>
    Search by:
      <select style="position: relative; left: -15px;" id="sb">
	<option value="sbn">Name</option>
	<option value="sbv">Value</option>
	<option value="sbw">Weight</option>
      </select>
        <span style="position: relative; left: -15px;"><input type="checkbox" id="gt"/>Greater Than</span>
        <span style="position: relative; left: -5px;"><input type="checkbox" id="lt"/>Less Than</span>

  <h4 style="position: relative; left: 25px;">Search Result</h4>
  <div id="searchLootResult"></div>
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
