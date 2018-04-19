<?php
 require "../search/dbutil.php";
 $db = DbUtil::loginConnection();

 $stmt = $db->stmt_init();

 $creature = -1;
 $location = -1;

 if($_POST['actorID'] != '') {
   if($stmt->prepare("select actorID from skyrim_Creature where species = ?") or die(mysqli_error($db))) {
     $searchString = '' . $_POST['actorID'] . '';
     $stmt->bind_param(s, $searchString);
     $stmt->execute();
     $stmt->bind_result($actorID);

     while($stmt->fetch()) {
       $creature = $actorID;
     }
   }
 }

 if($_POST['locationID'] != '') {
   if($stmt->prepare("select locationID from skyrim_Location where title = ?") or die(mysqli_error($db))) {
     $searchString = '' . $_POST['locationID'] . '';
     $stmt->bind_param(s, $searchString);
     $stmt->execute();
     $stmt->bind_result($locationID);

     while($stmt->fetch()) {
       $location = $locationID;
     }

   }
 }

 if($creature != -1 && $location != -1) {
    if($stmt->prepare("insert into skyrim_located (actorID, locationID) values (?, ?)") or die(mysqli_error($db))) {
      $stmt->bind_param("ss", $creature, $location);
      $stmt->execute();
      echo "<a class='btn btn-primary' href='tableInsertForm.html'>Back</a>";
      echo "<h2 style='text-align: center'>Creature: {$creature}</h2>";
      echo "<h2 style='text-align: center'>Location: {$location}<h2>";
      echo "<h2 style='text-align: center'>Insterted into skyrim_located"; // Output to user
    }
}
  $stmt->close();
  $db->close();
?>

<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/jsbootstrap.min.js"></script>
</html>
