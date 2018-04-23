<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();
	session_start();
	$stmt = $db->stmt_init();

	if($_GET['species'] != '') {
		if($stmt->prepare("select * from skyrim_Creature where species like ?") or die(mysqli_error($db))) {
			$searchString = '%' . $_GET['species'] . '%';
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($actorID, $species);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Species</th>\n";
			while($stmt->fetch()) {
			if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$actorID</td>\n
                                <td>$species <a class='btn btn-primary itemBtn pull-right' href='creature_result?id={$actorID}'>Where Am I?</a></td>\n
                                <td>\n
                                        <form action='./creatureSearch.php' method='post'>\n
                                        <button type=submit id='species$actorID' name='actorID' value='$actorID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$actorID</td>\n
                                <td>$species <a class='btn btn-primary itemBtn pull-right' href='creature_result?id={$actorID}'>Where Am I?</a></td>\n
                        </tr>";
			}
			echo "</table>";

			$stmt->close();
		}
	}

	$db->close();


?>
