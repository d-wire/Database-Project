<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();
	
	$stmt = $db->stmt_init();
	
	$entity = $_POST['entity'];

	if ($entity === "creatures") {
		$sql = "select * from skyrim_Creature";	// Select everything from table
		$result = mysqli_query($db, $sql) or die("Error in Selecting " . mysqli_error($db));	// Get result

		$jsonData = array();
		while($row =mysqli_fetch_assoc($result))	// Fetch data for each row
		{
			$jsonData[] = $row;
		}
		
		// Write to json file that user downloads
		header('Content-disposition: attachment; filename=skyrim_Creature.json');
		header('Content-type: application/json');
		echo(json_encode($jsonData));
		
		
		// Close the db connection
		mysqli_close($db);
		
	} else if ($entity === "locations") {
		$sql = "select * from skyrim_Location";	// Select everything from table
		$result = mysqli_query($db, $sql) or die("Error in Selecting " . mysqli_error($db));	// Get result

		$jsonData = array();
		while($row =mysqli_fetch_assoc($result))	// Fetch data for each row
		{
			$jsonData[] = $row;
		}
		
		// Write to json file that user downloads
		header('Content-disposition: attachment; filename=skyrim_Location.json');
		header('Content-type: application/json');
		echo(json_encode($jsonData));
		
		// Close the db connection
		mysqli_close($db);
		
	} else if ($entity === "loot") {
		$sql = "select * from skyrim_Loot";	// Select everything from table
		$result = mysqli_query($db, $sql) or die("Error in Selecting " . mysqli_error($db));	// Get result

		$jsonData = array();
		while($row =mysqli_fetch_assoc($result))	// Fetch data for each row
		{
			$jsonData[] = $row;
		}
		
		// Write to json file that user downloads
		header('Content-disposition: attachment; filename=skyrim_Loot.json');
		header('Content-type: application/json');
		echo(json_encode($jsonData));
		
		// Close the db connection
		mysqli_close($db);
		
	} else if ($entity === "npcs") {
		$sql = "select * from skyrim_NPC";	// Select everything from table
		$result = mysqli_query($db, $sql) or die("Error in Selecting " . mysqli_error($db));	// Get result

		$jsonData = array();
		while($row =mysqli_fetch_assoc($result))	// Fetch data for each row
		{
			$jsonData[] = $row;
		}
		
		// Write to json file that user downloads
		header('Content-disposition: attachment; filename=skyrim_NPC.json');
		header('Content-type: application/json');
		echo(json_encode($jsonData));
		
		// Close the db connection
		mysqli_close($db);
		
	} else if ($entity === "quests") {
		$sql = "select * from skyrim_Quest";	// Select everything from table
		$result = mysqli_query($db, $sql) or die("Error in Selecting " . mysqli_error($db));	// Get result

		$jsonData = array();
		while($row =mysqli_fetch_assoc($result))	// Fetch data for each row
		{
			$jsonData[] = $row;
		}
		
		// Write to json file that user downloads
		header('Content-disposition: attachment; filename=skyrim_Quest.json');
		header('Content-type: application/json');
		echo(json_encode($jsonData));
		
		// Close the db connection
		mysqli_close($db);
		
	} else if ($entity === "weapons") {
		$sql = "select * from skyrim_Weapons";	// Select everything from table
		$result = mysqli_query($db, $sql) or die("Error in Selecting " . mysqli_error($db));	// Get result

		$jsonData = array();
		while($row =mysqli_fetch_assoc($result))	// Fetch data for each row
		{
			$jsonData[] = $row;
		}
		
		// Write to json file that user downloads
		header('Content-disposition: attachment; filename=skyrim_Weapons.json');
		header('Content-type: application/json');
		echo(json_encode($jsonData));
		
		// Close the db connection
		mysqli_close($db);
		
	}
	$db->close();
?>
