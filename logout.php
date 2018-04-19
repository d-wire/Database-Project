<?php 
include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

session_start();
session_destroy();
header("Location: ./login.php");
exit;


?>