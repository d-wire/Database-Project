<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        session_start();
        $stmt = $db->stmt_init();

        if($_GET['weapon'] != '') {
        if($stmt->prepare("select * from skyrim_Weapons where name like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['weapon'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($itemID, $name, $damage, $value, $weight);

                echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Damage</th><th>Value</th><th>Weight</th>\n";
                while($stmt->fetch()) {
                 if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td>\n
                                <td>$damage</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                                <td>\n
                                        <form action='./weaponSearch.php' method='post'>\n
                                        <button type=submit id='weapon$itemID' name='itemID' value='$itemID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td>\n
                                <td>$damage</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                        </tr>";

                }
                echo "</table>";

                $stmt->close();
        }
        }

        if($_GET['damage'] != '') 
        {
                $type = 3;
                $searchString = $_GET['damage'];
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
                if($stmt->prepare("CALL `get_wep_dmg`(@p0, @p1);") or die(mysqli_error($db))) {
                        $stmt1->execute();
                        $stmt2->execute();
                        $stmt->execute();
                        $stmt->bind_result($itemID, $name, $damage, $value, $weight);
                        echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Damage</th><th>Value</th><th>Weight</
th>\n";
                        while($stmt->fetch()) {
                        if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td>\n
                                <td>$damage</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                                <td>\n
                                        <form action='./weaponSearch.php' method='post'>\n
                                        <button type=submit id='damage$itemID' name='itemID' value='$itemID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td>\n
                                <td>$damage</td>\n
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

                if($_GET['gt2'] === "true" && $_GET['lt2'] === "true") 
                        $type = 2;
                else if($_GET['gt2'] === "true")
                        $type = 0;
                else if($_GET['lt2'] === "true")
                        $type = 1;

                $stmt1->prepare("SET @p0='$searchString';");
                $stmt2->prepare("SET @p1='$type';");
                if($stmt->prepare("CALL `get_wep_val`(@p0, @p1);") or die(mysqli_error($db))) {
                        $stmt1->execute();
                        $stmt2->execute();
                        $stmt->execute();
                        $stmt->bind_result($itemID, $name, $damage, $value, $weight);
                        echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Damage</th><th>Value</th><th>Weight</
th>\n";
                        while($stmt->fetch()) {
                                if($_SESSION['staff'] == 1)
                                        echo "<tr>\n
                                                <td>$itemID</td>\n
                                                <td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td>\n
                                                <td>$damage</td>\n
                                                <td>$value</td>\n
                                                <td>$weight</td>\n
                                                <td>\n
                                                        <form action='./weaponSearch.php' method='post'>\n
                                                        <button type=submit id='value$itemID' name='itemID' value='$itemID' class='btn btn-danger itemBtn'>Delete</button>
                                                        </form>\n
                                                </td>\n
                                        </tr>";
                                 else
                                        echo "<tr>\n
                                                <td>$itemID</td>\n
                                                <td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td>\n
                                                <td>$damage</td>\n
                                                <td>$value</td>\n
                                                <td>$weight</td>\n
                                        </tr>";

                        }
                        echo "</table>";

                        $stmt->close();
                }
        }


        if($_GET['weight'] != '') 
        {
                $type = 3;
                $searchString = $_GET['weight'];
                $stmt1 = $db->stmt_init();
                $stmt2 = $db->stmt_init();

                if($_GET['gt3'] === "true" && $_GET['lt3'] === "true") 
                        $type = 2;
                else if($_GET['gt3'] === "true")
                        $type = 0;
                else if($_GET['lt3'] === "true")
                        $type = 1;

                $stmt1->prepare("SET @p0='$searchString';");
                $stmt2->prepare("SET @p1='$type';");
                if($stmt->prepare("CALL `get_wep_weight`(@p0, @p1);") or die(mysqli_error($db))) {
                        $stmt1->execute();
                        $stmt2->execute();
                        $stmt->execute();
                        $stmt->bind_result($itemID, $name, $damage, $value, $weight);
                        echo "<table class='table' style='margin-right: 20px; margin-left: 20px;' border=1><th>ID</th><th>Name</th><th>Damage</th><th>Value</th><th>Weight</
th>\n";
                        while($stmt->fetch()) {
                                if($_SESSION['staff'] == 1)
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td>\n
                                <td>$damage</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                                <td>\n
                                        <form action='./weaponSearch.php' method='post'>\n
                                        <button type=submit id='weight$itemID' name='itemID' value='$itemID' class='btn btn-danger itemBtn'>Delete</button>
                                        </form>\n
                                </td>\n
                        </tr>";
                 else
                        echo "<tr>\n
                                <td>$itemID</td>\n
                                <td>$name <a class='btn btn-primary itemBtn pull-right' href='weapon_result?id={$itemID}'>Who wields me?</a></td>\n
                                <td>$damage</td>\n
                                <td>$value</td>\n
                                <td>$weight</td>\n
                        </tr>";

                }
                echo "</table>";

                $stmt->close();
                }
        }
        $db->close();


?>

