<?php
    require "dbutil.php";
    $db = DbUtil::loginConnection();

    $stmt = $db->stmt_init();

    $questArray = array();

    if($_GET['id'] != '') {
      if($stmt->prepare("select questID from skyrim_issues WHERE actorID = ?") or die(mysqli_error($db))) {
  			$searchString = $_GET['id'];
  			$stmt->bind_param(s, $searchString);
  			$stmt->execute();
  			$stmt->bind_result($questID);

        echo "<a class='btn btn-primary' href='npcSearch.php'>Back</a>";

        $stmt->store_result();
        if($stmt->num_rows > 0) {
          echo "<table class='table' style='margin-right: auto; margin-left: auto; margin-top: 100px; width: 80%;' border=1><th>ID</th><th>Difficulty</th><th>Title</th>\n";
          while($stmt->fetch()) {
              $bind_result = $questID;
              array_push($questArray, $bind_result);
          }

          $total = count($questArray);
          for($i = 0; $i < $total; $i++) {
              if($stmt->prepare("select * from skyrim_Quest WHERE questID = {$questArray[$i]}") or die(mysqli_error($db))) {
                $stmt->execute();
                $stmt->bind_result($questID, $difficulty, $title);

                while($stmt->fetch()) {
                    echo "<tr><td>$questID</td><td>$difficulty</td><td>$title</td></tr>";
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
