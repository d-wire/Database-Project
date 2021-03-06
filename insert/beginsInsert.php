<?php
 require "../search/dbutil.php";
 $db = DbUtil::loginConnection();

 $stmt = $db->stmt_init();

 $location = -1;
 $quest = -1;

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

 if($location != -1 && $quest != -1) {
    if($stmt->prepare("insert into skyrim_begins (locationID, questID) values (?, ?)") or die(mysqli_error($db))) {
      $stmt->bind_param("ss", $location, $quest);
      $stmt->execute();
      echo "<a class='btn btn-primary' href='tableInsertForm.php'>Back</a>";
      echo "<h2 style='text-align: center'>Location: {$location}</h2>";
      echo "<h2 style='text-align: center'>Quest: {$quest}<h2>";
      echo "<h2 style='text-align: center'>Insterted into skyrim_begins"; // Output to user
    }
}
else {
  echo "<a class='btn btn-primary' href='tableInsertForm.php'>Back</a>";
  echo "<h2 style='text-align: center;'>One of those entities does not exist</h2>";
}
  $stmt->close();
  $db->close();
?>

<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/jsbootstrap.min.js"></script>
</html>
