
<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../login.php");
  exit;
}
if($_SESSION['staff'] != 1) {
	header("location: ../tableOfContents.php");
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
  <link rel="stylesheet" href="../sidebar.css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
 	<title>Skyrim Table Insert</title>
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
	<?php if($_SESSION['staff'] == 1): ?>
              <li class="sidebar-brand">
                  <a href="tableInsertForm.php">
                    <span class="fa fa-plus circle">Insert</span>
                  </a>
              </li>
              <li class="sidebar-brand">
                  <a href="../search/export.php" data-scroll>
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
  <a id="menu-toggle" href="#" class="glyphicon glyphicon-align-justify btn-menu toggle" style="color: black; font-size: 30px; position: fixed;">
  </a>
  <script>
      window['i'] = 0;
  </script>
<div class="container">
  <div class="panel panel-default" style="width: 75%; margin-left: auto; margin-right: auto; margin-top: 10px;">
                    <div class="panel-heading" style="background-color: black;">
                        <h3 class="panel-title" style="color: white;">Add Entities</h3>
                    </div>
                    <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row toggle" id="dropdown-detail-" data-toggle="detail-">
                                    <script>
                                        $("#dropdown-detail-").attr("data-toggle", "detail-" + window.i);
                                        $("#dropdown-detail-").attr("id", "dropdown-detail-" + window.i);
                                    </script>
                                    <div class="col-xs-10">
                                      Add a Location
                                    </div>
                                    <div class="col-xs-2">
                                        <i class="fa fa-chevron-down pull-right"></i></div>
                                </div>
                                <div id="detail-">
                                    <script>
                                        $("#detail-").attr("id", "detail-" + window.i);
                                        window.i++;
                                    </script>
                                    <hr></hr>
                                    <div class="container">
                                        <div class="fluid-row">
                                            <form action="locationInsert.php" method="post">
                                            Coordinates: <input type="number" name="coordinates">
                                            Region: <input type="text" name="region">
                                            Title: <input type="text" name="title">
                                            <button class="btn btn-primary" type="Submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row toggle" id="dropdown-detail-" data-toggle="detail-">
                                    <script>
                                        $("#dropdown-detail-").attr("data-toggle", "detail-" + window.i);
                                        $("#dropdown-detail-").attr("id", "dropdown-detail-" + window.i);
                                    </script>
                                    <div class="col-xs-10">
                                      Add an NPC
                                    </div>
                                    <div class="col-xs-2">
                                        <i class="fa fa-chevron-down pull-right"></i></div>
                                </div>
                                <div id="detail-">
                                    <script>
                                        $("#detail-").attr("id", "detail-" + window.i);
                                        window.i++;
                                    </script>
                                    <hr></hr>
                                    <div class="container">
                                        <div class="fluid-row">
                                          <form action="npcInsert.php" method="post">
                                          Name: <input type="text" name="name">
                                          Race: <input type="text" name="race">
                                          <button class="btn btn-primary" type="Submit">Submit</button>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row toggle" id="dropdown-detail-" data-toggle="detail-">
                                    <script>
                                        $("#dropdown-detail-").attr("data-toggle", "detail-" + window.i);
                                        $("#dropdown-detail-").attr("id", "dropdown-detail-" + window.i);
                                    </script>
                                    <div class="col-xs-10">
                                      Add a Weapon
                                    </div>
                                    <div class="col-xs-2">
                                        <i class="fa fa-chevron-down pull-right"></i></div>
                                </div>
                                <div id="detail-">
                                    <script>
                                        $("#detail-").attr("id", "detail-" + window.i);
                                        window.i++;
                                    </script>
                                    <hr></hr>
                                    <div class="container">
                                        <div class="fluid-row">
                                          <form action="weaponInsert.php" method="post">
                                            Name: <input type="text" name="name">
                                            Damage: <input type="number" name="damage">
                                            Value: <input type="number" name="value">
                                          </br>
                                        </br>
                                            Weight: <input type="number" name="weight">
                                            <button class="btn btn-primary" type="Submit">Submit</button>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row toggle" id="dropdown-detail-" data-toggle="detail-">
                                    <script>
                                        $("#dropdown-detail-").attr("data-toggle", "detail-" + window.i);
                                        $("#dropdown-detail-").attr("id", "dropdown-detail-" + window.i);
                                    </script>
                                    <div class="col-xs-10">
                                      Add a Creature
                                    </div>
                                    <div class="col-xs-2">
                                        <i class="fa fa-chevron-down pull-right"></i></div>
                                </div>
                                <div id="detail-">
                                    <script>
                                        $("#detail-").attr("id", "detail-" + window.i);
                                        window.i++;
                                    </script>
                                    <hr></hr>
                                    <div class="container">
                                        <div class="fluid-row">
                                          <form action="creatureInsert.php" method="post">
                                          Species: <input type="text" name="species">
                                          <button class="btn btn-primary" type="Submit">Submit</button>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row toggle" id="dropdown-detail-" data-toggle="detail-">
                                    <script>
                                        $("#dropdown-detail-").attr("data-toggle", "detail-" + window.i);
                                        $("#dropdown-detail-").attr("id", "dropdown-detail-" + window.i);
                                    </script>
                                    <div class="col-xs-10">
                                      Add a Quest
                                    </div>
                                    <div class="col-xs-2">
                                        <i class="fa fa-chevron-down pull-right"></i></div>
                                </div>
                                <div id="detail-">
                                    <script>
                                        $("#detail-").attr("id", "detail-" + window.i);
                                        window.i++;
                                    </script>
                                    <hr></hr>
                                    <div class="container">
                                        <div class="fluid-row">
                                          <form action="questInsert.php" method="post">
                                          Difficulty: <input type="number" name="difficulty">
                                          Title: <input type="text" name="title">
                                          <button class="btn btn-primary" type="Submit">Submit</button>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row toggle" id="dropdown-detail-" data-toggle="detail-">
                                    <script>
                                        $("#dropdown-detail-").attr("data-toggle", "detail-" + window.i);
                                        $("#dropdown-detail-").attr("id", "dropdown-detail-" + window.i);
                                    </script>
                                    <div class="col-xs-10">
                                      Add an Item
                                    </div>
                                    <div class="col-xs-2">
                                        <i class="fa fa-chevron-down pull-right"></i></div>
                                </div>
                                <div id="detail-">
                                    <script>
                                        $("#detail-").attr("id", "detail-" + window.i);
                                        window.i++;
                                    </script>
                                    <hr></hr>
                                    <div class="container">
                                        <div class="fluid-row">
                                          <form action="lootInsert.php" method="post">
                                          Name: <input type="text" name="name">
                                          Value: <input type="text" name="value">
                                          Weight: <input type="text" name="weight">
                                          <button class="btn btn-primary" type="Submit">Submit</button>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row toggle" id="dropdown-detail-" data-toggle="detail-">
                                    <script>
                                        $("#dropdown-detail-").attr("data-toggle", "detail-" + window.i);
                                        $("#dropdown-detail-").attr("id", "dropdown-detail-" + window.i);
                                    </script>
                                    <div class="col-xs-10">
                                      Give a Quest a Start Point
                                    </div>
                                    <div class="col-xs-2">
                                        <i class="fa fa-chevron-down pull-right"></i></div>
                                </div>
                                <div id="detail-">
                                    <script>
                                        $("#detail-").attr("id", "detail-" + window.i);
                                        window.i++;
                                    </script>
                                    <hr></hr>
                                    <div class="container">
                                        <div class="fluid-row">
                                          <form action="beginsInsert.php" method="post">
                                          Location Name: <input type="text" name="locationID">
                                          Quest Name: <input type="text" name="questID">
                                          <button class="btn btn-primary" type="Submit">Submit</button>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row toggle" id="dropdown-detail-" data-toggle="detail-">
                                    <script>
                                        $("#dropdown-detail-").attr("data-toggle", "detail-" + window.i);
                                        $("#dropdown-detail-").attr("id", "dropdown-detail-" + window.i);
                                    </script>
                                    <div class="col-xs-10">
                                      Give a Creature Loot to Drop
                                    </div>
                                    <div class="col-xs-2">
                                        <i class="fa fa-chevron-down pull-right"></i></div>
                                </div>
                                <div id="detail-">
                                    <script>
                                        $("#detail-").attr("id", "detail-" + window.i);
                                        window.i++;
                                    </script>
                                    <hr></hr>
                                    <div class="container">
                                        <div class="fluid-row">
                                          <form action="dropsInsert.php" method="post">
                                          Creature Species: <input type="text" name="actorID">
                                          Loot Name: <input type="text" name="itemID">
                                          <button class="btn btn-primary" type="Submit">Submit</button>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row toggle" id="dropdown-detail-" data-toggle="detail-">
                                    <script>
                                        $("#dropdown-detail-").attr("data-toggle", "detail-" + window.i);
                                        $("#dropdown-detail-").attr("id", "dropdown-detail-" + window.i);
                                    </script>
                                    <div class="col-xs-10">
                                      Give an NPC a Quest to Issue
                                    </div>
                                    <div class="col-xs-2">
                                        <i class="fa fa-chevron-down pull-right"></i></div>
                                </div>
                                <div id="detail-">
                                    <script>
                                        $("#detail-").attr("id", "detail-" + window.i);
                                        window.i++;
                                    </script>
                                    <hr></hr>
                                    <div class="container">
                                        <div class="fluid-row">
                                          <form action="issuesInsert.php" method="post">
                                          NPC Name: <input type="text" name="actorID">
                                          Quest Name: <input type="text" name="questID">
                                          <button class="btn btn-primary" type="Submit">Submit</button>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row toggle" id="dropdown-detail-" data-toggle="detail-">
                                    <script>
                                        $("#dropdown-detail-").attr("data-toggle", "detail-" + window.i);
                                        $("#dropdown-detail-").attr("id", "dropdown-detail-" + window.i);
                                    </script>
                                    <div class="col-xs-10">
                                      Give a Creature a Spawn Point
                                    </div>
                                    <div class="col-xs-2">
                                        <i class="fa fa-chevron-down pull-right"></i></div>
                                </div>
                                <div id="detail-">
                                    <script>
                                        $("#detail-").attr("id", "detail-" + window.i);
                                        window.i++;
                                    </script>
                                    <hr></hr>
                                    <div class="container">
                                        <div class="fluid-row">
                                          <form action="locatedInsert.php" method="post">
                                          Creature Name: <input type="text" name="actorID">
                                          Location Name: <input type="text" name="locationID">
                                          <button class="btn btn-primary" type="Submit">Submit</button>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row toggle" id="dropdown-detail-" data-toggle="detail-">
                                    <script>
                                        $("#dropdown-detail-").attr("data-toggle", "detail-" + window.i);
                                        $("#dropdown-detail-").attr("id", "dropdown-detail-" + window.i);
                                    </script>
                                    <div class="col-xs-10">
                                      Give an NPC a Weapon to Wield
                                    </div>
                                    <div class="col-xs-2">
                                        <i class="fa fa-chevron-down pull-right"></i></div>
                                </div>
                                <div id="detail-">
                                    <script>
                                        $("#detail-").attr("id", "detail-" + window.i);
                                        window.i++;
                                    </script>
                                    <hr></hr>
                                    <div class="container">
                                        <div class="fluid-row">
                                          <form action="wieldsInsert.php" method="post">
                                          NPC Name: <input type="text" name="actorID">
                                          Weapon Name: <input type="text" name="itemID">
                                          <button class="btn btn-primary" type="Submit">Submit</button>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                          </ul>
                        </div>
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

<script>
    $(document).ready(function () {
        $('[id^=detail-]').hide();
        $('.toggle').click(function () {
            $input = $(this);
            $target = $('#' + $input.attr('data-toggle'));
            $target.slideToggle();
        });
    });
</script>
</html>
