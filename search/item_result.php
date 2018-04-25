<?php
    require "dbutil.php";
    $db = DbUtil::loginConnection();

    $stmt = $db->stmt_init();

    $creatureArray = array();

    if($_GET['id'] != '') {
      if($stmt->prepare("select actorID from skyrim_drops WHERE itemID = ?") or die(mysqli_error($db))) {
  			$searchString = $_GET['id'];
  			$stmt->bind_param(s, $searchString);
  			$stmt->execute();
  			$stmt->bind_result($actorID);

        echo "<a class='btn btn-primary' href='lootSearch.php'>Back</a>";

        $stmt->store_result();
        if($stmt->num_rows > 0) {
          echo "<table class='table' style='margin-right: auto; margin-left: auto; margin-top: 100px; width: 80%;' border=1><th>ID</th><th>Species</th>\n";
          while($stmt->fetch()) {
              $bind_result = $actorID;
              array_push($creatureArray, $bind_result);
          }

          $total = count($creatureArray);
          for($i = 0; $i < $total; $i++) {
              if($stmt->prepare("select * from skyrim_Creature WHERE actorID = {$creatureArray[$i]}") or die(mysqli_error($db))) {
                $stmt->execute();
                $stmt->bind_result($actorID, $species);

                while($stmt->fetch()) {
                    echo "<tr><td>$actorID</td><td>$species</td></tr>";
                }
              }
        }
        echo "</table>";
    }

        else {
          echo "<h1 style='text-align: center;'>No results found</h1>";
        }

  			$stmt->close();
  		}
    }
    $stmt->close();
    $db->close();
 ?>

<html>
 <head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/jsbootstrap.min.js"></script>
 </head>
 <body>

 </body>
</html>
