<?php

include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);



$username = $password = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
	
        $sql = "SELECT username, password, staff FROM users WHERE username = '$username'";
        if ($result = mysqli_query($con,$sql))
        {
                if (mysqli_num_rows($result) != 1)
                        echo "Account does not  exist";
                else {
                        $row = mysqli_fetch_array($result);
                        if (password_verify($password, $row['password']))
                        {
                                session_start();
                                $_SESSION['username'] = $username;
				$_SESSION['staff'] = $row['staff'];
				header("location: ./tableOfContents.php");
                        }
                        else
                                echo "Not logged in";
                }

        } else die('Error: ' . mysqli_error($con));


//        echo $sql;
//      echo $username;
//      echo $password;
        mysqli_close($con);
}

?>

<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/jsbootstrap.min.js"></script>
<link rel="stylesheet" href="login_style.css">

<a href="signup.php" style="float: right; margin-right: 10px; font-size: 18px;">Sign Up</a>
<div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login_form">
          <?php
		if(mysqli_connect_errno())
		{
        	echo "<span class='connected' style='color: red;'>Failed to connect to MySQL: " . mysqli_connect_error() . "</span>";
		} else echo "<span class='connected'>Connected</span>";
	?>

	   <div class="form-group">
               <label>Username</label>
                <input type="text" name="username" value="" style="width: 76%;">
          </div>
          <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" style="width: 76%;">
          </div>
          <button class="btn btn-success" style="width: 100%;" type="submit">Login</button>
    </form>
    <img src="Skyrim2.png" style="margin-left: auto; margin-right: auto; display: block; height: 50%; position: relative; top: 110px;"/>
</div>
</html>
