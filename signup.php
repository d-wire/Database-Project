<?php
include_once("./library.php");                                                      
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);                        
                                                                                    
if(mysqli_connect_errno())                                                          
{                                                                                   
        echo "Failed to connect to MySQL: " . mysqli_connect_error();               
} else echo "Connected";    

 
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
               <label>Username</label>
                <input type="text" name="username" value="">  
                <label>Password</label>
                <input type="password" name="password">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password">
                <input type="submit">
    </form>
</html>
