<?php
include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);


// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    //Check username not taken
    $sql = "SELECT username, password FROM users WHERE username = '$username'";
    if ($result = mysqli_query($con,$sql))
    {
            if (mysqli_num_rows($result) > 0)
            {
                echo "Username already taken.";
                $username_err = "taken";
            }

    } else die('Error: ' . mysqli_error($con));

    if ($password != $confirm_password)
    {
        echo "Passwords don't match";
        $password_err = "match";
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, staff) VALUES ('$username', '$password', false)";

        if($result = mysqli_query($con, $sql)){
                header("location: login.php");
        } else echo "Something went wrong. Please try again later.$sql";

        // Close statement
    }

    // Close connection
    mysqli_close($link);
}
?>

<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/jsbootstrap.min.js"></script>
<link rel="stylesheet" href="login_style.css">

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
                <input type="text" name="username" value="">
          </div>
          <div class="form-group">
                <label>Password</label>
                <input type="password" name="password">
          </div>
          <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password">
          </div>
          <button class="btn btn-success" style="width: 100%;" type="submit">Sign Up</button>
          <a class="btn btn-danger" href="login.php" style="width: 100%; margin-top: 5px;">Cancel</a>
    </form>
</div>
</html>
