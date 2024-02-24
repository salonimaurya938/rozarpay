<?php

require_once('../function.php');
//connectdb();
include('mysqli.php');
session_start();


$username = $mysqli->real_escape_string($_POST["username"]);

//$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$username."'"));
$wde=$mysqli->query("SELECT COUNT(*) FROM users WHERE username='".$username."'");
$count=$wde->fetch_array(MYSQLI_BOTH);

if($count[0]!=0){
echo "<p style='color:red;'>Username Already Taken. Try With Different Username</p>";
}

?>


