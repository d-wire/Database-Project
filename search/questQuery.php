<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();

	$stmt = $db->stmt_init();

	if($_GET['title'] != '') {
		if($stmt->prepare("select * from skyrim_Quest where title like ?") or die(mysqli_error($db))) {
			$searchString = '%' . $_GET['title'] . '%';
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($questID, $difficulty, $title);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Difficulty</th><th>Title</th>\n";
			while($stmt->fetch()) {
				echo "<tr><td>$questID</td><td>$difficulty</td><td>$title</td></tr>";
			}
			echo "</table>";

			$stmt->close();
		}
	}

	if($_GET['difficulty'] != '') {
		if($_GET['gt'] === "true" && $_GET['lt'] === "true") {
			if($stmt->prepare("select * from skyrim_Quest") or die(mysqli_error($db))) {
				$searchString = $_GET['difficulty'];
				$stmt->bind_param(s, $searchString);
				$stmt->execute();
				$stmt->bind_result($questID, $difficulty, $title);
				echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Difficulty</th><th>Title</th>\n";
				while($stmt->fetch()) {
					echo "<tr><td>$questID</td><td>$difficulty</td><td>$title</td></tr>";
				}
				echo "</table>";

				$stmt->close();
			}
		} else if($_GET['gt'] === "true") {
			if($stmt->prepare("select * from skyrim_Quest where difficulty >= ?") or die(mysqli_error($db))) {
				$searchString = $_GET['difficulty'];
				$stmt->bind_param(s, $searchString);
				$stmt->execute();
				$stmt->bind_result($questID, $difficulty, $title);
				echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Difficulty</th><th>Title</th>\n";
				while($stmt->fetch()) {
					echo "<tr><td>$questID</td><td>$difficulty</td><td>$title</td></tr>";
				}
				echo "</table>";

				$stmt->close();
			}
		} else if($_GET['lt'] === "true") {
			if($stmt->prepare("select * from skyrim_Quest where difficulty <= ?") or die(mysqli_error($db))) {
				$searchString = $_GET['difficulty'];
				$stmt->bind_param(s, $searchString);
				$stmt->execute();
				$stmt->bind_result($questID, $difficulty, $title);
				echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Difficulty</th><th>Title</th>\n";
				while($stmt->fetch()) {
					echo "<tr><td>$questID</td><td>$difficulty</td><td>$title</td></tr>";
				}
				echo "</table>";

				$stmt->close();
			}

		} else {
			if($stmt->prepare("select * from skyrim_Quest where difficulty = ?") or die(mysqli_error($db))) {
				$searchString = $_GET['difficulty'];
				$stmt->bind_param(s, $searchString);
				$stmt->execute();
				$stmt->bind_result($questID, $difficulty, $title);
				echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Difficulty</th><th>Title</th>\n";
				while($stmt->fetch()) {
					echo "<tr><td>$questID</td><td>$difficulty</td><td>$title</td></tr>";
				}
				echo "</table>";

				$stmt->close();
			}
		}
	}

	$db->close();


?>
