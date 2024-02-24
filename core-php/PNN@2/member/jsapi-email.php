<?php

require_once('../function.php');
//connectdb();
include('mysqli.php');
session_start();


$email = $mysqli->real_escape_string($_POST["email"]);

//$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE email='".$email."'"));
$ccvv=$mysqli->query("SELECT COUNT(*) FROM users WHERE email='".$email."'");
$count=$ccvv->fetch_array(MYSQLI_BOTH);
if($count[0]!=0){
echo "<p style='color:red;'>Email Already Exist in our database... Please Use another Email!!</p>";
}

?>


