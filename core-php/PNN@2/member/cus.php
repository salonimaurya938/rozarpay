<?php
include('mysqli.php');

if($_POST)
{

$name = (string)$mysqli->real_escape_string($_POST["name"]);
$mobile =(int) $mysqli->real_escape_string($_POST["mobile"]);

$email = (string)$mysqli->real_escape_string($_POST["email"]);
$subject = (string)$mysqli->real_escape_string($_POST["subject"]);

$message = (string)$mysqli->real_escape_string($_POST["message"]);

$err1=0;
$err2=0;
$err3=0;
$err4=0;
$err5=0;

////------------------>>>> JOINING ERROR

if(trim($name)==""){
	$err1=0;
}
if(trim($mobile)==""){
	$err2=0;
}
if(trim($email)==""){
	$err3=0;
}
if(trim($subject)==""){
	$err4=0;
}
if(trim($message)==""){
	$err5=0;
}


$error = $err1+$err2+$err3+$err4+$err5;


if ($error == 0){


$time=time();
$res="INSERT INTO contact_us (name,mobile,email,subject,message,tm)VALUES('$name','$mobile','$email','$subject','$message','$time')";
if($mysqli->query($res)===TRUE){
	echo"";
}
else{
	echo "Wrong RES".$res."<br>".$mysqli->error;
}
if($res){
echo"<script>alert('Message Send Completed Successfully!');window.location='http://localhost/pp/index.php';</script>";

///////////////////------------------------------------->>>>>>>>>Send Email AND SMS

///////////////////------------------------------------->>>>>>>>>Send Email AND SMS



}else{

}
} else {
  
if ($err1 == 1){
echo"<script>alert('Some Problem Occurs, Please Try Again.');window.location='http://localhost/pp/member/contuct_us.php';</script>";

}   
  
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Mobile Number Can Not be Empty!!!
</div>";
}   
  
if ($err3 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Subject Number Can Not be Empty!!!
</div>";
} 

if ($err4 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Message Can Not be Empty!!!
</div>";
}   

if ($err5 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Email Can Not be Empty!!!
</div>";
} 

}

}

?>



