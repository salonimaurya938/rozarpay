<?php

require_once('../function.php');
//connectdb();
include('mysqli.php');
session_start();


$mobile = $mysqli->real_escape_string($_POST["mobile"]);

//$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE mobile='".$mobile."'"));
$zaq=$mysqli->query("SELECT COUNT(*) FROM users WHERE mobile='".$mobile."'");
$count=$zaq->fetch_array(MYSQLI_BOTH);

if($count[0]!=0){
echo "<p style='color:red;'>Mobile Number Already Exist in our database... Please Use another Mobile Number!!</p>";
}

?>


