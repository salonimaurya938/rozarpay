<?php 
$pgtitle = "Registration";
include('include-header-nuser.php');
include('mysqli.php');
?>

</head>
<body class="header-fixed">


<?php
include('include-navbar-nuser.php');
?>


<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1>Member <span class="shop-green">Registration</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->








<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">

		<div class="col-md-8 col-md-offset-2">
		<form id="sky-form4" class="log-reg-block sky-form" action="" method="post">
		<h2>Create New Account</h2>






<div class="row">
<div class="col-sm-12">






<?php


if($_POST)
{

$refname = $mysqli->real_escape_string($_POST["refname"]);
$position = $mysqli->real_escape_string($_POST["position"]);

$firstname = $mysqli->real_escape_string($_POST["firstname"]);
$lastname = $mysqli->real_escape_string($_POST["lastname"]);

$day = $mysqli->real_escape_string($_POST["day"]);
$month = $mysqli->real_escape_string($_POST["month"]);
$year = $mysqli->real_escape_string($_POST["year"]);
$dob = "$day-$month-$year";

$email = $mysqli->real_escape_string($_POST["email"]);
$mobile = $mysqli->real_escape_string($_POST["mobile"]);

$address = $mysqli->real_escape_string($_POST["address"]);
//$city = $mysqli->real_escape_string($_POST["city"]);
$post = $mysqli->real_escape_string($_POST["post"]);
$address = $mysqli->real_escape_string($_POST["address"]);


//$country = ip_info("Visitor", "Country");


$username = $mysqli->real_escape_string($_POST["username"]);
$password = $mysqli->real_escape_string($_POST["password"]);
$password2 = $mysqli->real_escape_string($_POST["passwordConfirm"]);


$err1=0;
$err2=0;
$err3=0;
$err4=0;
$err5=0;
$err6=0;
$err7=0;
$err8=0;
$err9=0;
$err10=0;
$err11=0;
$err12=0;
$err13=0;
$err14=0;
$err15=0;
$err16=0;
$err17=0;
$err18=0;
$err19=0;
$err20=0;
$err21=0;



if(trim($firstname)==""){
$err1=1;
}

if(trim($lastname)==""){
$err2=1;
}
/*
if(trim($day)=="")
      {
$err3=1;
}

if(trim($month)=="")
      {
$err3=1;
}

if(trim($year)=="")
      {
$err3=1;
}




$dobSec = strtotime($dob);
$nowAge = time()-$dobSec;
$agyr = floor($nowAge/(365*24*60*60));

if($agyr<18)
      {
//$err4=1;
}

*/




if(trim($email)==""){
$err6=1;
}

//$eee = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE email='".$email."'"));
$fgkl=$mysqli->query("SELECT COUNT(*) FROM users WHERE email='".$email."'");
$eee=$fgkl->fetch_array(MYSQLI_BOTH);

if($eee[0]!=0){
$err7=1;
}

if(trim($mobile)==""){
$err8=1;
}

//$mob = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE mobile='".$mobile."'"));
$mm=$mysqli->query("SELECT COUNT(*) FROM users WHERE mobile='".$mobile."'");
$mob=$mm->fetch_array(MYSQLI_BOTH);

if($mob[0]!=0){
$err9=1;
}







if(trim($address)==""){
$err10=1;
}



if(trim($post)==""){
$err12=1;
}


/*
if(trim($city)==""){
$err11=1;
}

if(trim($country)==""){
$err13=1;
}


*/
if(trim($username)==""){
$err14=1;
}
//$uuu = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$username."'"));
$jkkl=$mysqli->query("SELECT COUNT(*) FROM users WHERE username='".$username."'");
$uuu=$jkkl->fetch_array(MYSQLI_BOTH);

if($uuu[0]!=0){
$err15=1;
}



if($password!=$password2)
      {
$err16=1;
}

if(strlen($password)<="7"){
$err17=1;
}



////------------------>>>> JOINING ERROR


if(trim($refname)==""){
$err18=1;
}
//$rrr = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$refname."'"));
$ghko=$mysqli->query("SELECT COUNT(*) FROM users WHERE username='".$refname."'");
$rrr=$ghko->fetch_array(MYSQLI_BOTH);

if($rrr[0]!=1){
$err19=1;
}

if(trim($position)==""){
$err20=1;
}



//$refid = mysql_fetch_array(mysql_query("SELECT mid FROM users WHERE username='".$refname."'"));
$refgg=$mysqli->query("SELECT mid FROM users WHERE username='".$refname."'");
$refid=$refgg->fetch_array(MYSQLI_BOTH);

$willPosition = getLastChildOfLR($refname,$position);

//$pos = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE posid='".$willPosition."' AND position='".$position."'"));
$mmnn=$mysqli->query("SELECT COUNT(*) FROM users WHERE posid='".$willPosition."' AND position='".$position."'");
$pos=$mmnn->fetch_array(MYSQLI_BOTH);

if($pos[0]!=0){
$err21=1;
}

////------------------>>>> JOINING ERROR




$error = $err1+$err2+$err3+$err4+$err5+$err6+$err7+$err8+$err9+$err10+$err11+$err12+$err13+$err14+$err15+$err16+$err17+$err18+$err19+$err20+$err21;


if ($error == 0){

$passmd = md5($password);
//$passmd = $password;
$vercode = rand(100000,999999);

$time=time();
//$res = $mysqli->query("  ='".."', trxpin='0', ='', ='".."'");
$res="INSERT INTO users(refid,posid,position,username,password,jiondate,fname,lname,mobile,email,status,paid_status,verstat,vercode,dob,address,postcode,country,forgotcode,sid,tm,dtm,usercat)VALUES('$refid[0]','$willPosition','$position','$username','$passmd','$time','$firstname','$lastname','$mobile','$email','1','0','0','$vercode','','$address','$post','','','','','','')";
if($mysqli->query($res)===TRUE){
	echo"";
}
else{
	echo "Wrong RES".$res."<br>".$mysqli->error;
}
if($res){
  echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  

Registretion Completed Successfully!

</div>";
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button> <a href=". $baseurl."/login.php>Please Login And Verify</a>";

include('mysqli.php');
//$getMid = mysql_fetch_array(mysql_query("SELECT mid FROM users WHERE username='".$username."'"));
$ffjj=$mysqli->query("SELECT mid FROM users WHERE username='".$username."'");
$getMid=$ffjj->fetch_array(MYSQLI_BOTH);

$mysqli->query("INSERT INTO member_bv SET mid='".$getMid[0]."', lbv='0', rbv='0'");
$mysqli->query("INSERT INTO member_below SET mid='".$getMid[0]."', lpaid='0', rpaid='0', lfree='0', rfree='0'");


updateMemberBelow($getMid[0], 'FREE');

///////////////////------------------------------------->>>>>>>>>Send Email AND SMS

$txt = "Thank you for joining us.<br/><br/><br/>

<b>Your account credentials:</b><br/><br/>

Username: $username <br/>
Password: $password <br/>

<b style='color:red;'> Important: Please do not share your username and/or password with anyone!</b><br/><br/>


We are looking forward a long and mutually prosperous relationship.<br/>";

$namess = "$firstname $lastname";

abiremail($email, "Registration Completed Successfully", $namess, $txt);

$sms ="Hi $firstname, Thanks For Registration. Your Verification Code is $vercode";
abirsms($mobile, $sms);
///////////////////------------------------------------->>>>>>>>>Send Email AND SMS



}else{
  echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  

Some Problem Occurs, Please Try Again. 

</div>";
}
} else {
  
if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
First Name Can Not be Empty!!!
</div>";
}   
  
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Last Name Can Not be Empty!!!
</div>";
}   
  
if ($err3 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Please Provide a valid Date of Birth!!!
</div>";
}   

if ($err4 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
You are not 18 Years old! you have to be 18+ to join...
</div>";
}   

  




  
if ($err6 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Email Can Not be Empty!!!
</div>";
}   


  
if ($err7 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Email Already Exist in our database... Please Use another Email!!
</div>";
}   


  
if ($err8 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Mobile Can Not be Empty!!!
</div>";
}   


  
if ($err9 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Mobile Number Already Exist in our database... Please Use another Mobile Number!!
</div>";
}   
  


 
if ($err10 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Street Address Can Not be Empty!!!
</div>";
}   
   

  
if ($err11 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
City/State Can Not be Empty!!!
</div>";
}   
  
 

 
if ($err12 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Post Code Can Not be Empty!!!
</div>";
}   
  
if ($err13 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Country Can Not be Empty!!!
</div>";
}   






if ($err14 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Username Can Not be Empty!!!
</div>";
}   
 
if ($err15 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Username Already Exist in our database... Please Use another Username!!
</div>";
}   
  

 
if ($err16 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Password and Confirm Password not match!!!
</div>";
}   
   

  
if ($err17 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Password must be minimum 8 Char!!!
</div>";
}   
  
 

 
if ($err18 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Referrer ID Can not be Empty !!!
</div>";
}   
  
 
if ($err19 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Referrer ID not Found in Our Database!!!
</div>";
}   
  




 
if ($err20 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Please Select Poition!!!
</div>";
}   
  
 
if ($err21 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Position already taken!!
</div>";
}   
  

}

}

?>






</div>
</div>









		<div class="login-input reg-input">


		<div class="row">
		<div class="col-sm-6">
		<section>
		<label class="input">
		<input type="text" name="refname" placeholder="Referrer Username" id="refname" class="form-control">
		</label>
		</section>
		</div>
		<div class="col-sm-6">
		<select name="position" class="form-control" id="poss">
		<option value="0" selected disabled>Position</option>
		<option value="L">Left</option>
		<option value="R">Right</option>
		</select>
		</div>

		<div class="col-sm-12">
			<div id="resu"></div>
		</div>
		</div>





		<div class="row">
		<div class="col-sm-6">
		<section>
		<label class="input">
		<input type="text" name="firstname" placeholder="First name" class="form-control">
		</label>
		</section>
		</div>
		<div class="col-sm-6">
		<section>
		<label class="input">
		<input type="text" name="lastname" placeholder="Last name" class="form-control">
		</label>
		</section>
		</div>
		</div>



		<div class="row margin-bottom-10" hidden="hidden">
		<div class="col-xs-6">
		<label class="select">
		<select name="month" class="form-control">
		<option  selected="" value="">DOB(Month)</option>
		<option value="01">January</option>
		<option value="02">February</option>
		</select>
		</label>
		</div>

		<div class="col-xs-3">
		<section>

		<label class="select">
		<select name="day" class="form-control">
		<option  selected="" value="">DOB(Day)</option>

<option value="01">01</option>
<option value="02">02</option>


		</select>
		</label>

		</section>
		</div>
		<div class="col-xs-3">
		<section>


		<label class="select">
		<select name="year" class="form-control">
		<option  selected="" value="">DOB(Year)</option>

<option value="2016">2016</option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="1900">1900</option>


		</select>
		</label>


		</section>
		</div>

		</div>


		<div class="row">
		<div class="col-sm-6">
		<section>
		<label class="input">
		<input type="email" name="email" placeholder="Email address" id="email" class="form-control">
		</label>
		</section>
		<div id="emailerr"></div>
		</div>
		<div class="col-sm-6">
		<section>


<div class="row">

<div class="col-xs-12">

  <div class="input-group">
          <span class="input-group-addon">+91</span>
       <input type="text" name="mobile" placeholder="Enter Mobile Number"  minlength="10" maxlength="10"  id="mobile" class="form-control">
          </div>

		


</div>

</div>
		
		</section>
		<div id="mobileerr"></div>
		</div>
		</div>



		<div class="row" >
		<div class="col-sm-6">
		<section>
		<label class="input">
		<input type="text" name="address" value=""  placeholder="Village Address" class="form-control">
		</label>
		</section>
		</div>
		<div class="col-sm-6">
		<section>
		<label class="input">
		<input type="text" name="post" value="" placeholder="Postcode" class="form-control">
		</label>
		</section>
		</div>
		</div>



		<div class="row" hidden="">
		<div class="col-sm-6">
		<section>
		<label class="input">
		<input type="text" name="post2" value="" placeholder="Postcode" class="form-control">
		</label>
		</section>
		</div>
		<div class="col-sm-6">
		<section>



		<label class="select">
		<select name="country" class="form-control">
		<option  selected="" value="">Country</option>

    <option value="Zambia">Zambia</option>
    <option value="Zimbabwe">Zimbabwe</option>



		</select>
		</label>



		</section>
		</div>
		</div>




		<section>
		<label class="input">
		<input type="text" name="username" placeholder="Username" id="username" class="form-control">
		</label>
		</section>
		<div id="usernaameerr"></div>


		<section>
		<label class="input">
		<input type="password" name="password" placeholder="Password" id="password" class="form-control">
		</label>
		</section>
		<section>
		<label class="input">
		<input type="password" name="passwordConfirm" placeholder="Confirm password" class="form-control">
		</label>
		</section>
		</div>



		<label class="checkbox margin-bottom-20">
		<input type="checkbox" name="terms"/>
		<i></i>
		I have read agreed with the <a href="#">terms &amp; conditions</a>
		</label>
		<button class="btn-u btn-u-sea-shop btn-block margin-bottom-20" type="submit">Create Account</button>
		</form>

		<div class="margin-bottom-20"></div>
		<p class="text-center">Already you have an account? <a href="<?php echo "$baseurl/login.php"; ?>">Sign In</a></p>
		</div>





</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->





<?php 
include('include-footer.php');
?>





<script type='text/javascript'>

jQuery(document).ready(function(){







$('#refname').on('input', function() {

var refname = $("#refname").val();
var poss = $("#poss").val();

        $.post( 
           "<?php echo $baseurl; ?>/jsapi-position.php",
                  { 
                     refname : refname,
                     poss : poss
          },


							function(data) {
							$("#resu").html(data);
							}
               );
});


$('#poss').on('change', function() {

var refname = $("#refname").val();
var poss = $("#poss").val();


        $.post( 
           "<?php echo $baseurl; ?>/jsapi-position.php",
                  { 
                     refname : refname,
                     poss : poss
          },


							function(data) {
							$("#resu").html(data);
							}
               );


});






$('#username').on('input', function() {

var username = $("#username").val();

        $.post( 
           "<?php echo $baseurl; ?>/jsapi-username.php",
                  { 
                     username : username
          },


							function(data) {
							$("#usernaameerr").html(data);
							}
               );
});








$('#mobile').on('input', function() {

var mobile = $("#mobile").val();

        $.post( 
           "<?php echo $baseurl; ?>/jsapi-mobile.php",
                  { 
                     mobile : mobile
          },


							function(data) {
							$("#mobileerr").html(data);
							}
               );
});



$('#email').on('input', function() {

var email = $("#email").val();

        $.post( 
           "<?php echo $baseurl; ?>/jsapi-email.php",
                  { 
                     email : email
          },


							function(data) {
							$("#emailerr").html(data);
							}
               );
});









  
});
</script>



</body>
</html>
