 <?php 
$pgtitle = "Add Fund";
include('include-header.php');
require_once('../function.php');
require_once("anotifier.php");
?>
     

<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo $adminurl; ?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $adminurl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<link href="<?php echo $adminurl; ?>/assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />


<style>
    
    body{
}

.dt-buttons {
    float: right !important;
    margin-top: -64px;
}
</style>

</head>
<body class="header-fixed">


<?php
include('include-navbar.php');
?>
<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1>Add <span class="shop-green">Fund</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">
<div class="shop-product">
<div class="row">
<?php 
$tm = time();
$dt = date("YmdH", $tm);
$payid = "$dt$uid";
//$general = mysql_fetch_array(mysql_query("SELECT sitetitle, pmuid, pmsec, pp FROM general_setting WHERE id='1'"));
$gen=$mysqli->query("SELECT sitetitle, pmuid, pmsec, pp FROM general_setting WHERE id='1'");
$general=$gen->fetch_array(MYSQLI_BOTH);
?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!--=== Registre ===-->
<div class="log-reg-v3 content-md" style="margin-top:-220px;">
<div class="container">
<div class="row">
        <div class="col-md-8 col-md-offset-2" >
        <form id="sky-form4" class="log-reg-block sky-form" action="" method="post" enctype="multipart/form-data">
        <h2>Add Fund Account</h2>
<div class="row">
<div class="col-sm-12">
<?php
if($_POST)
{
$id = $mysqli->real_escape_string($_POST["id"]);

$name = $mysqli->real_escape_string($_POST["name"]);

$paymethod = $mysqli->real_escape_string($_POST["paymethod"]);

$username = $mysqli->real_escape_string($_POST["username"]);

$email = $mysqli->real_escape_string($_POST["email"]);

$paystatus = $mysqli->real_escape_string($_POST["paystatus"]);

$amount = $mysqli->real_escape_string($_POST["amount"]);

$trx_date = $mysqli->real_escape_string($_POST["trx_date"]);

$trx_number = $mysqli->real_escape_string($_POST["trx_number"]);

  $filename=$_FILES["uplaodfile"]["name"];
$tempname=$_FILES["uplaodfile"]["tmp_name"];
$folder="../admin/student/$filename";
move_uploaded_file($tempname,$folder);


$err1=0;
$err2=0;
$err3=0;
$err4=0;
$err5=0;
$err6=0;
$err7=0;

if(trim($trx_number)==""){
    $err1 = 1;
}

if(trim($paystatus)==""){
    $err2 = 1;
}

if(trim($paymethod)==""){
    $err3 = 1;
}

if(trim($trx_date)==""){
    $err4 = 1;
}

if(trim($folder)==""){
    $err5 = 1;
}

$jkkl=$mysqli->query("SELECT COUNT(*) FROM request_activation WHERE trx_number='".$trx_number."'");
$uuu=$jkkl->fetch_array(MYSQLI_BOTH);

if($uuu[0]!=0){
$err6=1;
}

if(trim($trx_date)==""){
    $err7 = 1;
}

$error = $err1+$err2+$err3+$err4+$err5+$err6+$err7;


if ($error == 0){

$a1 = date("Hmyd", time());
$a2 = rand(1000,9999);
$TRXid = "TRX$a1$a2";

$res = $mysqli->query("INSERT INTO request_activation SET name='".$name."',username='".$username."',paystatus='".$paystatus."',paymethod='".$paymethod."',email='".$email."',trxid='".$TRXid."',trx_number='".$trx_number."',trx_date='".$trx_date."',trx_recipt='".$folder."',mid1='".$id."'");

if($res){
  echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  

Add Fund Completed Successfully!

</div>";

echo "<div class=\"alert alert-info alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Transaction ID $TRXid
</div>";

echo "<div class=\"alert alert-info alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Your Input Transaction ID $trx_number
</div>";

///////////////////------------------------------------->>>>>>>>>Send Email AND SMS


$txt = "Thank you for joining us.<br/><br/><br/>

<b>Your account credentials:</b><br/><br/>
Name: $name <br/>
Username: $username <br/>
Transaction Number:$trx_number<br/>

Transaction Recipt:$folder
";
 $namess = "$name";

abiremail($email, "Add Fund PM",$namess,$txt);
//abirsms($txt);
///////////////////------------------------------------->>>>>>>>>Send Email AND SMS
 
}


else{
  echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  

Some Problem Occurs, Please Try Again. 

</div>";
}


}
else{

 
      if ($err1== 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Please Input Transaction Number!
</div>";
}       
  
      if ($err2== 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Please Select Payment Status!
</div>";
} 


      if ($err3== 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Please Select Payment Method!
</div>";
} 


      if ($err4== 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Please Enter Date and Time!
</div>";
} 


      if ($err5== 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Please Uplaod Transaction recipt!
</div>";
} 

      if ($err6== 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Transaction Number Already Exist in our database... Please Use Correct Transaction Number!!
</div>";
} 

  if ($err7== 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Please Enter Amount!!
</div>";
}
  }
    
}

$ggvn=$mysqli->query("SELECT mid, fname, lname,username,email, mobile, address, city, postcode, country FROM users WHERE mid='".$uid."'");

$old=$ggvn->fetch_array(MYSQLI_BOTH);



?>
</div>
</div>
        <div class="login-input reg-input">
       

         <section>
        <label class="input">
        <input type="hidden" name="id" value="<?php echo $old[0];?>"placeholder="Id" id="name" class="form-control">
        </label>
        </section>
        <div id="nameerr"></div>

        <section>
        <label class="input">
        <input type="hidden" name="name" value="<?php echo $old[1];?> <?php echo $old[2];?>"placeholder="Name" id="name" class="form-control">
        </label>
        </section>
        <div id="nameerr"></div>  
        
        <section>
        <label class="input"  >
        <input type="hidden" name="username" value="<?php echo $old[3];?>" placeholder="Username" id="username" class="form-control" >
        </label>
        </section>
        <div id="usernaameerr"></div>

          <section>
        <label class="input">
        <input type="hidden" name="email" value="<?php echo $old[4];?>" placeholder="Email" id="email" class="form-control">
        </label>
        </section>
        <div id="emailerr"></div>

        <section>
        <label class="input">
        <input type="text" name="trx_number"  placeholder="Transaction Number" id="trx_number" class="form-control">
        </label>
        </section>
        <div id="trx_numberer"></div>

          <div class="row">
       <div class="col-sm-6">
        <section>
         <label class="select">
        <select name="paystatus"  class="form-control">
        <option selected="" disabled="" value="0">Payment Status</option>
   <option value=" Confirm">Confirm</option>
    <option value="Refund">Refund</option>
      
        </select>
        </label>
        </section>
        </div>
        <div class="col-sm-6">
        <section>
        <label class="select">
        <select name="paymethod"  class="form-control">
        <option  selected="" disabled="" value="0">Payment methode</option>

    <option value="Google Pay ">Google Pay</option>
    <option value="Phone Pe">Phone Pe </option>
       
        </select>
        </label>
        </section>
        </div>
        </div>
           <section>
        <label class="select">
        <select name="amount"  class="form-control">
        <option  selected="" disabled=""  value="0">Payment methode</option>

    <option value="1000">1000</option>
  
       
        </select>
        </label>
        </section>

              <section>
        <label class="input">
        <input type="text" name="trx_date" placeholder="Enter Transaction Date and Time" id="trx_date" required="" class="form-control">
        </label>
        </section>
        <div id="date"></div>

          <section>
        <label class="input">
        <input type="file" name="uplaodfile"placeholder="img" id="img" class="form-control" required="">
        </label>
        </section>
        <div id="imgg"></div>

        </div>

        <label class="checkbox margin-bottom-20">
        <input type="checkbox" name="terms"/>
        <i></i>
        I have read agreed with the <a href="#">terms &amp; conditions</a>
        </label>
        <button class="btn-u btn-u-sea-shop btn-block margin-bottom-20" type="submit">Create Account</button>
        </form>

       
       
        </div>





</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->


<div style="margin-top:100px;"></div>

<?php
include("include-footer.php");
?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo $adminurl; ?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo $adminurl; ?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo $adminurl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        
         <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo $adminurl; ?>/assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>


<script type='text/javascript'>

jQuery(document).ready(function(){

$('#trx_number').on('input', function() {

var trx_number = $("#trx_number").val();

        $.post( 
           "<?php echo $baseurl; ?>/jsapi-trx.php",
                  { 
                     trx_number : trx_number
          },


                            function(data) {
                            $("#trx_numberer").html(data);
                            }
               );
});




  
});
</script>
