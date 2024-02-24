<?php
session_start();
require_once('../function.php');
include('mysqli.php');

 

if(isset($_POST["username"]) or isset($_POST["password"])){

sleep(1);


$username = $_POST["username"];
$password = $_POST["password"];
$mdpass = md5($password);

//$data = mysql_fetch_array(mysql_query("SELECT password FROM users WHERE username='".$username."'"));

$da=$mysqli->query("SELECT password FROM users WHERE username='".$username."'");
$data=$da->fetch_array(MYSQLI_BOTH);

if ($data[0] == $mdpass) {
$return_arr["status"]=1;

//-------------------------------------------------->>>>>>>>>>>>>>>>>>>> Make Auth
$tm = time();
$si = "$username$tm";
$sid = md5($si);
$_SESSION['sid'] = $sid;
$_SESSION['username'] = $username;
$mysqli->query("UPDATE users SET sid='".$sid."' WHERE username='".$username."'");
//-------------------------------------------------->>>>>>>>>>>>>>>>>>>> Make Auth
 echo "ok"; //log in
}else{
$return_arr["status"]=0;
echo "Combination of Username And Password is Wrong";

} //end else
//echo json_encode($return_arr); // return value 

exit();
}

?>