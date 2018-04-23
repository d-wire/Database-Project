<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();
	session_start();
	$stmt = $db->stmt_init();

	if($_GET['title'] != '') {
		if($stmt->prepare("select * from skyrim_Quest where title like ?") or die(mysqli_error($db))) {
			$searchString = '%' . $_GET['title'] . '%';
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($questID, $difficulty, $title);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Title</th><th>Difficulty</th>\n";
			while($stmt->fetch()) {
					if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$questID</td>\n
																<td>$title <a class='btn btn-primary itemBtn pull-right' href='quest_result?id={$questID}'>Where Do I Begin?</a></td>\n
																<td>$difficulty</td>\n
                                <td>\n
                                        <form action='./questSearch.php' method='post'>\n
                                        <button type=submit id='title$questID' name='questID' value='$questID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$questID</td>\n
																<td>$title <a class='btn btn-primary itemBtn pull-right' href='quest_result?id={$questID}'>Where Do I Begin?</a></td>\n
																<td>$difficulty</td>\n
                        </tr>";
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
				echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Title</th><th>Difficulty</th>\n";
				while($stmt->fetch()) {
					                 if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$questID</td>\n
                                <td>$title <a class='btn btn-primary itemBtn pull-right' href='quest_result?id={$questID}'>Where Do I Begin?</a></td>\n
																<td>$difficulty</td>\n
                                <td>\n
                                        <form action='./questSearch.php' method='post'>\n
                                        <button type=submit id='difficulty$questID' name='questID' value='$questID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$questID</td>\n
																<td>$title <a class='btn btn-primary itemBtn pull-right' href='quest_result?id={$questID}'>Where Do I Begin?</a></td>\n
																<td>$difficulty</td>\n
                        </tr>";
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
				echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Title</th><th>Difficulty</th>\n";
				while($stmt->fetch()) {
					                 if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$questID</td>\n
																<td>$title <a class='btn btn-primary itemBtn pull-right' href='quest_result?id={$questID}'>Where Do I Begin?</a></td>\n
																<td>$difficulty</td>\n
                                <td>\n
                                        <form action='./questSearch.php' method='post'>\n
                                        <button type=submit id='difficulty$questID' name='questID' value='$questID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$questID</td>\n
																<td>$title <a class='btn btn-primary itemBtn pull-right' href='quest_result?id={$questID}'>Where Do I Begin?</a></td>\n
																<td>$difficulty</td>\n
                        </tr>";
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
				echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Title</th><th>Difficulty</th>\n";
				while($stmt->fetch()) {
					                 if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$questID</td>\n
																<td>$title <a class='btn btn-primary itemBtn pull-right' href='quest_result?id={$questID}'>Where Do I Begin?</a></td>\n
																<td>$difficulty</td>\n
                                <td>\n
                                        <form action='./questSearch.php' method='post'>\n
                                        <button type=submit id='difficulty$questID' name='questID' value='$questID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$questID</td>\n
																<td>$title <a class='btn btn-primary itemBtn pull-right' href='quest_result?id={$questID}'>Where Do I Begin?</a></td>\n
																<td>$difficulty</td>\n
                        </tr>";
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
				echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Title</th><th>Difficulty</th>\n";
				while($stmt->fetch()) {
					                 if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$questID</td>\n
																<td>$title <a class='btn btn-primary itemBtn pull-right' href='quest_result?id={$questID}'>Where Do I Begin?</a></td>\n
																<td>$difficulty</td>\n
                                <td>\n
                                        <form action='./questSearch.php' method='post'>\n
                                        <button type=submit id='difficulty$questID' name='questID' value='$questID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$questID</td>\n
																<td>$title <a class='btn btn-primary itemBtn pull-right' href='quest_result?id={$questID}'>Where Do I Begin?</a></td>\n
																<td>$difficulty</td>\n
                        </tr>";
				}
				echo "</table>";

				$stmt->close();
			}
		}
	}

	$db->close();


?>
