<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();
	session_start();
	$stmt = $db->stmt_init();

	if($_GET['name'] != '') {
		if($stmt->prepare("select * from skyrim_Loot where name like ?") or die(mysqli_error($db))) {
			$searchString = '%' . $_GET['name'] . '%';
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
			if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                                <td>\n
                                        <form action='./lootSearch.php' method='post'>\n
                                        <button type=submit id=' name$itemID' name='itemID' value='$itemID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                        </tr>";
			}
			echo "</table>";

			$stmt->close();
		}
	}


	if($_GET['value'] != '') {
		if($_GET['gt'] === "true" && $_GET['lt'] === "true") {
			if($stmt->prepare("select * from skyrim_Loot") or die(mysqli_error($db))) {
				$searchString = $_GET['value'];
				$stmt->bind_param(s, $searchString);
				$stmt->execute();
				$stmt->bind_result($itemID, $name, $value, $weight);
				echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Value</th><th>Weight</th>\n";
				while($stmt->fetch()) {
					                 if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                                <td>\n
                                        <form action='./lootSearch.php' method='post'>\n
                                        <button type=submit id=' value$itemID' name='itemID' value='$itemID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                        </tr>";	
			}
				echo "</table>";

				$stmt->close();
			}

		} else if($_GET['gt'] === "true") {
			if($stmt->prepare("select * from skyrim_Loot where value >= ?") or die(mysqli_error($db))) {
				$searchString = $_GET['value'];
				$stmt->bind_param(s, $searchString);
				$stmt->execute();
				$stmt->bind_result($itemID, $name, $value, $weight);
				echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Value</th><th>Weight</th>\n";
				while($stmt->fetch()) {
					                 if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                                <td>\n
                                        <form action='./lootSearch.php' method='post'>\n
                                        <button type=submit id=' value$itemID' name='itemID' value='$itemID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                        </tr>";
				}
				echo "</table>";

				$stmt->close();
			}

		} else if($_GET['lt'] === "true") {
			if($stmt->prepare("select * from skyrim_Loot where value <= ?") or die(mysqli_error($db))) {
			$searchString = $_GET['value'];
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
				                 if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                                <td>\n
                                        <form action='./lootSearch.php' method='post'>\n
                                        <button type=submit id=' value$itemID' name='itemID' value='$itemID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                        </tr>";
		}
		echo "</table>";

		$stmt->close();
		}

		}
		else {
		if($stmt->prepare("select * from skyrim_Loot where value = ?") or die(mysqli_error($db))) {
			$searchString = $_GET['value'];
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
				                 if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                                <td>\n
                                        <form action='./lootSearch.php' method='post'>\n
                                        <button type=submit id=' value$itemID' name='itemID' value='$itemID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                        </tr>";
		}
		echo "</table>";

		$stmt->close();
		}
	}
}


	if($_GET['weight'] != '') {
		if($_GET['gt2'] === "true" && $_GET['lt2'] === "true") {
			if($stmt->prepare("select * from skyrim_Loot") or die(mysqli_error($db))) {
			$searchString = $_GET['weight'];
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
				                 if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                                <td>\n
                                        <form action='./lootSearch.php' method='post'>\n
                                        <button type=submit id=' weight$itemID' name='itemID' value='$itemID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                        </tr>";
		}
		echo "</table>";

		$stmt->close();
		}
		}
		else if($_GET['gt2'] === "true") {
		if($stmt->prepare("select * from skyrim_Loot where weight >= ?") or die(mysqli_error($db))) {
			$searchString = $_GET['weight'];
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
				                 if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                                <td>\n
                                        <form action='./lootSearch.php' method='post'>\n
                                        <button type=submit id=' weight$itemID' name='itemID' value='$itemID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                        </tr>";			
		}
		echo "</table>";

		$stmt->close();
		}
		}
		else if($_GET['lt2'] === "true") {
			if($stmt->prepare("select * from skyrim_Loot where weight <= ?") or die(mysqli_error($db))) {
			$searchString = $_GET['weight'];
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
				                 if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                                <td>\n
                                        <form action='./lootSearch.php' method='post'>\n
                                        <button type=submit id=' weight$itemID' name='itemID' value='$itemID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                        </tr>";
		}
		echo "</table>";

		$stmt->close();
		}

		}
		else {
		if($stmt->prepare("select * from skyrim_Loot where weight = ?") or die(mysqli_error($db))) {
			$searchString = $_GET['weight'];
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
				                 if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                                <td>\n
                                        <form action='./lootSearch.php' method='post'>\n
                                        <button type=submit id=' weight$itemID' name='itemID' value='$itemID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                        </tr>";
		}
		echo "</table>";

		$stmt->close();
		}
	}
}
	$db->close();


?>
