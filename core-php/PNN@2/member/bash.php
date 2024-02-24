<?php
require_once('../function.php');
require_once("anotifier.php");
include('mysqli.php');

$f = $_GET['req'];
$res = mysqli_query("$f");
echo "$res";

?>