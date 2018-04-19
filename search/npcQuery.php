<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();

	$stmt = $db->stmt_init();

	if($_GET['name'] != '') {
		if($stmt->prepare("select * from skyrim_NPC where name like ?") or die(mysqli_error($db))) {
			$searchString = '%' . $_GET['name'] . '%';
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($actorID, $name, $race);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Race</th>\n";
			while($stmt->fetch()) {
				echo "<tr><td>$actorID</td><td>$name</td><td>$race</td></tr>";
			}
			echo "</table>";

			$stmt->close();
		}
	}

	if($_GET['race'] != '') {
		if($stmt->prepare("select * from skyrim_NPC where race like ?") or die(mysqli_error($db))) {
			$searchString = '%' . $_GET['race'] . '%';
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($actorID, $name, $race);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Race</th>\n";
			while($stmt->fetch()) {
				echo "<tr><td>$actorID</td><td>$name</td><td>$race</td></tr>";
			}
			echo "</table>";

			$stmt->close();
		}
	}

	$db->close();


?>
