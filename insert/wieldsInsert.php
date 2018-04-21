<?php
 require "../search/dbutil.php";
 $db = DbUtil::loginConnection();

 $stmt = $db->stmt_init();

 $actor = -1;
 $weapon = -1;
 $b_weight = 0;
 $w_weight = 0;


 if($_POST['actorID'] != '') {
   if($stmt->prepare("select actorID, bag from skyrim_NPC where name = ?") or die(mysqli_error($db))) {
     $searchString = '' . $_POST['actorID'] . '';
     $stmt->bind_param(s, $searchString);
     $stmt->execute();
     $stmt->bind_result($actorID, $bag);

     while($stmt->fetch()) {
       $actor = $actorID;
       $b_weight = $bag;
     }
   }
 }

 if($_POST['itemID'] != '') {
   if($stmt->prepare("select itemID, weight from skyrim_Weapons where name = ?") or die(mysqli_error($db))) {
     $searchString = '' . $_POST['itemID'] . '';
     $stmt->bind_param(s, $searchString);
     $stmt->execute();
     $stmt->bind_result($itemID, $weight);

     while($stmt->fetch()) {
       $item = $itemID;
       $w_weight = $weight;
     }
   }
 }

$b_weight = $b_weight + $w_weight;
 if($actor != -1 && $item != -1) {
    if($stmt->prepare("insert into skyrim_wields (actorID, itemID) values (?, ?)") or die(mysqli_error($db))) {
      $stmt->bind_param("ss", $actor, $item);
      $stmt->execute();
//trigger to update bag after insert
//assertion to make sure bag does not exceed 50 on that update...
      if ($stmt->prepare("UPDATE skyrim_NPC SET bag = ? WHERE actorID = ?") or die(mysqli_error($db))) {
          $stmt->bind_param("si", $b_weight, $actor);
          $stmt->execute();
      }
      echo "<a class='btn btn-primary' href='tableInsertForm.html'>Back</a>";
      echo "<h2 style='text-align: center'>Actor: {$actor}</h2>";
      echo "<h2 style='text-align: center'>Weapon: {$item}<h2>";
      echo "<h2 style='text-align: center'>New Bag Weight: {$b_weight}<h2>";
      echo "<h2 style='text-align: center'>Insterted into skyrim_wields"; // Output to user
    }
}
  $stmt->close();
  $db->close();
?>

<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/jsbootstrap.min.js"></script>
</html>
