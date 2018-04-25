<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();
	session_start();
	$stmt = $db->stmt_init();
	
	if($_GET['sb'] === "sbr") {
	if($stmt->prepare("select * from skyrim_Location where region like ?") or die(mysqli_error($db))) {
		$searchString = '%' . $_GET['param'] . '%';
		$stmt->bind_param(s, $searchString);
		$stmt->execute();
		$stmt->bind_result($locationID, $coordinates, $region, $title);
		echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>LocationID</th><th>Coordinates</th><th>Region</th><th>Title</th>\n";
		while($stmt->fetch()) {
			     if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$locationID</td>\n
                                <td>$coordinates</td>\n
                                <td>$region</td>\n
                                <td>$title</td>\n
                                <td>\n
                                        <form action='./locationSearch.php' method='post'>\n
                                        <button type=submit id='location$locationID' name='locationID' value='$locationID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$locationID</td>\n
                                <td>$coordinates</td>\n
                                <td>$region</td>\n
                                <td>$title</td>\n
                        </tr>";
		}
		echo "</table>";
	
		$stmt->close();
	}
	}

	if($_GET['sb'] === "sbt") {
	if($stmt->prepare("select * from skyrim_Location where title like ?") or die(mysqli_error($db))) {
		$searchString = '%' . $_GET['param'] . '%';
		$stmt->bind_param(s, $searchString);
		$stmt->execute();
		$stmt->bind_result($locationID, $coordinates, $region, $title);
		echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Coordinates</th><th>Region</th><th>Title</th>\n";
		while($stmt->fetch()) {
			     if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$locationID</td>\n
                                <td>$coordinates</td>\n
                                <td>$region</td>\n
                                <td>$title</td>\n
                                <td>\n
                                        <form action='./locationSearch.php' method='post'>\n
                                        <button type=submit id='location$locationID' name='locationID' value='$locationID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$locationID</td>\n
                                <td>$coordinates</td>\n
                                <td>$region</td>\n
                                <td>$title</td>\n
                        </tr>";
		}
		echo "</table>";
	
		$stmt->close();
	}
	}

	
	$db->close();


?>
