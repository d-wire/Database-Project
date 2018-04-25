<?php
 require "../search/dbutil.php";
 $db = DbUtil::loginConnection();

 $stmt = $db->stmt_init();

 $actor = -1;
 $quest = -1;

 if($_POST['actorID'] != '') {
   if($stmt->prepare("select actorID from skyrim_NPC where name = ?") or die(mysqli_error($db))) {
     $searchString = '' . $_POST['actorID'] . '';
     $stmt->bind_param(s, $searchString);
     $stmt->execute();
     $stmt->bind_result($actorID);

     while($stmt->fetch()) {
       $actor = $actorID;
     }
   }
 }

 if($_POST['questID'] != '') {
   if($stmt->prepare("select questID from skyrim_Quest where title = ?") or die(mysqli_error($db))) {
     $searchString = '' . $_POST['questID'] . '';
     $stmt->bind_param(s, $searchString);
     $stmt->execute();
     $stmt->bind_result($questID);

     while($stmt->fetch()) {
       $quest = $questID;
     }

   }
 }

 
 if($actor != -1 && $quest != -1) {
    if($stmt->prepare("insert into skyrim_issues (actorID, questID) values (?, ?)") or die(mysqli_error($db))) {
      $stmt->bind_param("ss", $actor, $quest);
      $stmt->execute();
      echo "<a class='btn btn-primary' href='tableInsertForm.php'>Back</a>";
      echo "<h2 style='text-align: center'>Actor: {$actor}</h2>";
      echo "<h2 style='text-align: center'>Quest: {$quest}<h2>";
      echo "<h2 style='text-align: center'>Inserted into skyrim_issues"; // Output to user
    }
}
  $stmt->close();
  $db->close();
?>

<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/jsbootstrap.min.js"></script>
</html>
