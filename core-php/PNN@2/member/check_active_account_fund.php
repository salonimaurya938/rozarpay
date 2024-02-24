
<?php
$pgtitle = "Dashboard";

include('mysqli.php');

include('include-header.php');


//$psts = mysql_fetch_array(mysql_query("SELECT paid_status FROM users WHERE mid='".$uid."'"));
$ps=$mysqli->query("SELECT paid_status FROM users WHERE mid='".$uid."'");
$psts=$ps->fetch_array(MYSQLI_BOTH);

//$gen = mysql_fetch_array(mysql_query("SELECT uc, comitree, comi FROM general_setting WHERE id='1'"));

$ge=$mysqli->query("SELECT uc, comitree, comi FROM general_setting WHERE id='1'");
$gen=$ge->fetch_array(MYSQLI_BOTH);
if($psts[0]==1){

echo '<script>window.location.assign("transferfund.php");</script>';

}else{

echo '<h1><script>alert("Sorry Please Activet Your Account");window.location.assign("UpgradeToPremium.php");</script></h1>';

}

 ?>

