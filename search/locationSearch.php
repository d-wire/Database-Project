<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();
	
	$stmt = $db->stmt_init();
	
	if($_GET['region'] != '') {
	if($stmt->prepare("select * from skyrim_Location where region like ?") or die(mysqli_error($db))) {
		$searchString = '%' . $_GET['region'] . '%';
		$stmt->bind_param(s, $searchString);
		$stmt->execute();
		$stmt->bind_result($locationID, $coordinates, $region, $title);
		echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>LocationID</th><th>Coordinates</th><th>Region</th><th>Title</th>\n";
		while($stmt->fetch()) {
			echo "<tr><td>$locationID</td><td>$coordinates</td><td>$region</td><td>$title</td></tr>";
		}
		echo "</table>";
	
		$stmt->close();
	}
	}

	if($_GET['title'] != '') {
	if($stmt->prepare("select * from skyrim_Location where title like ?") or die(mysqli_error($db))) {
		$searchString = '%' . $_GET['title'] . '%';
		$stmt->bind_param(s, $searchString);
		$stmt->execute();
		$stmt->bind_result($locationID, $coordinates, $region, $title);
		echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Coordinates</th><th>Region</th><th>Title</th>\n";
		while($stmt->fetch()) {
			echo "<tr><td>$locationID</td><td>$coordinates</td><td>$region</td><td>$title</td></tr>";
		}
		echo "</table>";
	
		$stmt->close();
	}
	}

	
	$db->close();


?>
