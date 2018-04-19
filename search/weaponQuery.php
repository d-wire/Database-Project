<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();

	$stmt = $db->stmt_init();

	if($_GET['weapon'] != '') {
	if($stmt->prepare("select * from skyrim_Weapons where name like ?") or die(mysqli_error($db))) {
		$searchString = '%' . $_GET['weapon'] . '%';
		$stmt->bind_param(s, $searchString);
		$stmt->execute();
		$stmt->bind_result($itemID, $name, $damage, $value, $weight);

		echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Damage</th><th>Value</th><th>Weight</th>\n";
		while($stmt->fetch()) {
			echo "<tr><td>$itemID</td><td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td><td>$damage</td><td>$value</td><td>$weight</td></tr>";
		}
		echo "</table>";

		$stmt->close();
	}
	}

	if($_GET['damage'] != '') {
		if($_GET['gt'] === "true" && $_GET['lt'] === "true") {
			if($stmt->prepare("select * from skyrim_Weapons") or die(mysqli_error($db))) {
			$searchString = $_GET['damage'];
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $damage, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Damage</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
				echo "<tr><td>$itemID</td><td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td><td>$damage</td><td>$value</td><td>$weight</td></tr>";
		}
		echo "</table>";

		$stmt->close();
		}
		}
		else if($_GET['gt'] === "true") {
		if($stmt->prepare("select * from skyrim_Weapons where damage >= ?") or die(mysqli_error($db))) {
			$searchString = $_GET['damage'];
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $damage, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Damage</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
				echo "<tr><td>$itemID</td><td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td><td>$damage</td><td>$value</td><td>$weight</td></tr>";
		}
		echo "</table>";

		$stmt->close();
		}
		}
		else if($_GET['lt'] === "true") {
			if($stmt->prepare("select * from skyrim_Weapons where damage <= ?") or die(mysqli_error($db))) {
			$searchString = $_GET['damage'];
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $damage, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Damage</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
				echo "<tr><td>$itemID</td><td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td><td>$damage</td><td>$value</td><td>$weight</td></tr>";
		}
		echo "</table>";

		$stmt->close();
		}

		}
		else {
		if($stmt->prepare("select * from skyrim_Weapons where damage = ?") or die(mysqli_error($db))) {
			$searchString = $_GET['damage'];
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $damage, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Damage</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
				echo "<tr><td>$itemID</td><td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td><td>$damage</td><td>$value</td><td>$weight</td></tr>";
		}
		echo "</table>";

		$stmt->close();
		}
	}
}

	if($_GET['value'] != '') {
		if($_GET['gt2'] === "true" && $_GET['lt2'] === "true") {
			if($stmt->prepare("select * from skyrim_Weapons") or die(mysqli_error($db))) {
			$searchString = $_GET['value'];
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $damage, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Damage</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
				echo "<tr><td>$itemID</td><td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td><td>$damage</td><td>$value</td><td>$weight</td></tr>";
		}
		echo "</table>";

		$stmt->close();
		}
		}
		else if($_GET['gt2'] === "true") {
		if($stmt->prepare("select * from skyrim_Weapons where value >= ?") or die(mysqli_error($db))) {
			$searchString = $_GET['value'];
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $damage, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Damage</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
				echo "<tr><td>$itemID</td><td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td><td>$damage</td><td>$value</td><td>$weight</td></tr>";
		}
		echo "</table>";

		$stmt->close();
		}
		}
		else if($_GET['lt2'] === "true") {
			if($stmt->prepare("select * from skyrim_Weapons where value <= ?") or die(mysqli_error($db))) {
			$searchString = $_GET['value'];
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $damage, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Damage</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
				echo "<tr><td>$itemID</td><td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td><td>$damage</td><td>$value</td><td>$weight</td></tr>";
		}
		echo "</table>";

		$stmt->close();
		}

		}
		else {
		if($stmt->prepare("select * from skyrim_Weapons where value = ?") or die(mysqli_error($db))) {
			$searchString = $_GET['value'];
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $damage, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Damage</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
				echo "<tr><td>$itemID</td><td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td><td>$damage</td><td>$value</td><td>$weight</td></tr>";
		}
		echo "</table>";

		$stmt->close();
		}
	}
}


	if($_GET['weight'] != '') {
		if($_GET['gt3'] === "true" && $_GET['lt3'] === "true") {
			if($stmt->prepare("select * from skyrim_Weapons") or die(mysqli_error($db))) {
			$searchString = $_GET['weight'];
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $damage, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Damage</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
				echo "<tr><td>$itemID</td><td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td><td>$damage</td><td>$value</td><td>$weight</td></tr>";
		}
		echo "</table>";

		$stmt->close();
		}
		}
		else if($_GET['gt3'] === "true") {
		if($stmt->prepare("select * from skyrim_Weapons where weight >= ?") or die(mysqli_error($db))) {
			$searchString = $_GET['weight'];
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $damage, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Damage</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
				echo "<tr><td>$itemID</td><td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td><td>$damage</td><td>$value</td><td>$weight</td></tr>";
		}
		echo "</table>";

		$stmt->close();
		}
		}
		else if($_GET['lt3'] === "true") {
			if($stmt->prepare("select * from skyrim_Weapons where weight <= ?") or die(mysqli_error($db))) {
			$searchString = $_GET['weight'];
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $damage, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Damage</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
				echo "<tr><td>$itemID</td><td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td><td>$damage</td><td>$value</td><td>$weight</td></tr>";
		}
		echo "</table>";

		$stmt->close();
		}

		}
		else {
		if($stmt->prepare("select * from skyrim_Weapons where weight = ?") or die(mysqli_error($db))) {
			$searchString = $_GET['weight'];
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $damage, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Damage</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch()) {
				echo "<tr><td>$itemID</td><td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td><td>$damage</td><td>$value</td><td>$weight</td></tr>";
		}
		echo "</table>";

		$stmt->close();
		}
	}
}
	$db->close();


?>
