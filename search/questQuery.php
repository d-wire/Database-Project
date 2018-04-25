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
		$type = 3;
                $searchString = $_GET['difficulty'];
                $stmt1 = $db->stmt_init();
                $stmt2 = $db->stmt_init();

                if($_GET['gt'] === "true" && $_GET['lt'] === "true") 
                        $type = 2;
                else if($_GET['gt'] === "true")
                        $type = 0;
                else if($_GET['lt'] === "true")
                        $type = 1;

                $stmt1->prepare("SET @p0='$searchString';");
                $stmt2->prepare("SET @p1='$type';");
			if($stmt->prepare("CALL `get_quest_diff`(@p0, @p1);") or die(mysqli_error($db))) {
				$stmt1->execute();
				$stmt2->execute();
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

	$db->close();


?>
