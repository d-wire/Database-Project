<?php
 include_once("../library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 // Form the SQL query (an INSERT query)
 $sql="INSERT INTO skyrim_Weapons (damage, value, weight, name)
 VALUES
 ('$_POST[damage]','$_POST[value]', '$_POST[weight]', '$_POST[name]')";

 echo "<a class='btn btn-primary' href='tableInsertForm.php'>Back</a>";
 if (!mysqli_query($con,$sql))
 {
 die('Error: ' . mysqli_error($con));
 }
 echo "<h2 style='text-align: center;'>{$_POST['name']} added to skyrim_Weapon"; // Output to user
 mysqli_close($con);
?>

<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/jsbootstrap.min.js"></script>
</html>
