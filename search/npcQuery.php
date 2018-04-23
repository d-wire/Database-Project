<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();
	session_start();
	$stmt = $db->stmt_init();

	if($_GET['name'] != '') {
		if($stmt->prepare("select * from skyrim_NPC where name like ?") or die(mysqli_error($db))) {
			$searchString = '%' . $_GET['name'] . '%';
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($actorID, $name, $race, $bag);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Race</th>\n";
			while($stmt->fetch()) {
				                 if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$actorID</td>\n
                                <td>$name <a class='btn btn-primary itemBtn pull-right' href='npc_result?id={$actorID}'>What Quest Do I Issue?</a></td>\n
                                <td>$race</td>\n
                                <td>\n
                                        <form action='./npcSearch.php' method='post'>\n
                                        <button type=submit id='name$actorID' name='actorID' value='$actorID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$actorID</td>\n
                                <td>$name <a class='btn btn-primary itemBtn pull-right' href='npc_result?id={$actorID}'>What Quest Do I Issue?</a></td>\n
                                <td>$race</td>\n
                        </tr>";
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
			$stmt->bind_result($actorID, $name, $race, $bag);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Race</th>\n";
			while($stmt->fetch()) {
				                 if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$actorID</td>\n
                                <td>$name <a class='btn btn-primary itemBtn pull-right' href='npc_result?id={$actorID}'>What Quest Do I Issue?</a></td>\n
                                <td>$race</td>\n
                                <td>\n
                                        <form action='./npcSearch.php' method='post'>\n
                                        <button type=submit id='race$actorID' name='actorID' value='$actorID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$actorID</td>\n
                                <td>$name <a class='btn btn-primary itemBtn pull-right' href='npc_result?id={$actorID}'>What Quest Do I Issue?</a></td>\n
                                <td>$race</td>\n
                        </tr>";
			}
			echo "</table>";

			$stmt->close();
		}
	}

	$db->close();


?>
