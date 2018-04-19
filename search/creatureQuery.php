<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();

	$stmt = $db->stmt_init();

	if($_GET['species'] != '') {
		if($stmt->prepare("select * from skyrim_Creature where species like ?") or die(mysqli_error($db))) {
			$searchString = '%' . $_GET['species'] . '%';
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($actorID, $species);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Species</th>\n";
			while($stmt->fetch()) {
				echo "<tr><td>$actorID</td><td>$species</td></tr>";
			}
			echo "</table>";

			$stmt->close();
		}
	}

	$db->close();


?>
