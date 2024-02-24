<?php

require_once('../function.php');
//connectdb();
include('mysqli.php');
session_start();


$trx_number = $mysqli->real_escape_string($_POST["trx_number"]);

//$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$username."'"));
$wde=$mysqli->query("SELECT COUNT(*) FROM request_activation WHERE trx_number='".$trx_number."'");
$count=$wde->fetch_array(MYSQLI_BOTH);

if($count[0]!=0){
echo "<p style='color:red;'>Transaction Number Already Taken. Try With Different Transaction Number</p>";
}

?>


