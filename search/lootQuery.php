<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();
	session_start();
	$stmt = $db->stmt_init();

	if($_GET['name'] != '')
	 {
		if($stmt->prepare("select * from skyrim_Loot where name like ?") or die(mysqli_error($db))) {
			$searchString = '%' . $_GET['name'] . '%';
			$stmt->bind_param(s, $searchString);
			$stmt->execute();
			$stmt->bind_result($itemID, $name, $value, $weight);
			echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Value</th><th>Weight</th>\n";
			while($stmt->fetch())
			 {
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


	if($_GET['value'] != '')
	 {
		$type = 3;
		$searchString = $_GET['value'];
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
		if($stmt->prepare("CALL `get_loot`(@p0, @p1);") or die(mysqli_error($db))) {
			$stmt1->execute();
			$stmt2->execute();				
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
