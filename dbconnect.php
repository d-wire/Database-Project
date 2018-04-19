<?php
 class DbUtil{
 public static $user = "CS4750ac6bb";
 public static $pass = "1CHEESEcake1!";
 public static $host = "stardock.cs.virginia.edu";
 public static $schema = "CS4750ac6bb";

 public static function loginConnection() {
 $db = new mysqli(DbUtil::$host, DbUtil::$user,
 DbUtil::$pass, DbUtil::$schema);
 if($db->connect_errno) {
 echo "fail";
 $db->close();
 exit();
 }
 return $db;
 }
 }
?>
