 <?php 
$pgtitle = "Add Fund";
include('include-header.php');
?>


<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo $adminurl; ?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $adminurl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<link href="<?php echo $adminurl; ?>/assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />


<style>
	
	body{


.dt-buttons {
    float: right !important;
    margin-top: -64px;

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
        <h2>Create New Account</h2>
<div class="row">
<div class="col-sm-12">
<?php
if($_POST)
{

$name = $mysqli->real_escape_string($_POST["name"]);

$paymethod = $mysqli->real_escape_string($_POST["paymethod"]);

$username = $mysqli->real_escape_string($_POST["username"]);

$email = $mysqli->real_escape_string($_POST["email"]);

$trxidn = $mysqli->real_escape_string($_POST["trxidn"]);

$trx_comp_id = $mysqli->real_escape_string($_POST["trx_comp_id"]);

$trx_date = $mysqli->real_escape_string($_POST["trx_date"]);

//$trx_recipt = $mysqli->real_escape_string($_POST["trx_recipt"]);

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


if(trim($name)==""){
$err1=1;
}

if(trim($trxidn)==""){
$err2=1;
}

if(trim($name)==""){
$err3=1;
}


if(trim($email)==""){
$err4=1;
}


$fgkl=$mysqli->query("SELECT COUNT(*) FROM request_activation WHERE email='".$email."'");
$eee=$fgkl->fetch_array(MYSQLI_BOTH);

if($eee[0]!=0){
$err5=1;
}

if(trim($username)==""){
$err6=1;
}


$jkkl=$mysqli->query("SELECT COUNT(*) FROM request_activation WHERE username='".$username."'");
$uuu=$jkkl->fetch_array(MYSQLI_BOTH);

if($uuu[0]!=0){
$err7=1;
}


$error = $err1+$err2+$err3+$err4+$err5+$err6+$err7;




$res = $mysqli->query("INSERT INTO request_activation SET name='".$name."',
    username='".$username."',trxidn='".$trxidn."',paymethod='".$paymethod."',email='".$email."',trx_comp_id='".$trx_comp_id."',trx_date='".$trx_date."',trx_recipt='".$folder."'");

if($res){
  echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  

Registretion Completed Successfully!

</div>";
 
}


else{
  echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  

Some Problem Occurs, Please Try Again. 

</div>";
}


}







?>
</div>
</div>
        <div class="login-input reg-input">
       


        <section>
        <label class="input">
        <input type="text" name="name" placeholder="Name" id="name" class="form-control">
        </label>
        </section>
        <div id="nameerr"></div>  
        
        <section>
        <label class="input">
        <input type="text" name="username" placeholder="Username" id="username" class="form-control">
        </label>
        </section>
        <div id="usernaameerr"></div>

          <section>
        <label class="input">
        <input type="text" name="email" placeholder="Email" id="email" class="form-control">
        </label>
        </section>
        <div id="emailerr"></div>

          <div class="row">
       <div class="col-sm-6">
        <section>
         <label class="select">
        <select name="paymethod" class="form-control">
        <option disabled="" selected="" value="0">Payment methode</option>
   <option value="Google Pay And Confirm">Google Pay And Confirm</option>
    <option value="Phone Pe And Confirm">Phone Pe And Confirm</option>
       <option value="Return">Return</option>
        </select>
        </label>
        </section>
        </div>
        <div class="col-sm-6">
        <section>
        <label class="select">
        <select name="paymethod" class="form-control">
        <option disabled="" selected="" value="0">Payment methode</option>

    <option value="Google Pay And Confirm">Google Pay And Confirm</option>
    <option value="Phone Pe And Confirm">Phone Pe And Confirm</option>
       <option value="Return">Return</option>
        </select>
        </label>
        </section>
        </div>
        </div>
           

          <section>
        <label class="input">
        <input type="text" name="trxidn" placeholder="Transaction ID Number" id="trxidn" class="form-control">
        </label>
        </section>
        <div id="trxidnn"></div>   

         <section>
        <label class="input">
        <input type="text" name="trx_comp_id" placeholder="Google Transaction Number" id="trx_comp_idi" class="form-control">
        </label>
        </section>
        <div id="trx_comp_idi"></div>
              <section>
        <label class="input">
        <input type="date" name="trx_date" placeholder="Transaction Date and Time" id="trx_date" class="form-control">
        </label>
        </section>
        <div id="date"></div>

          <section>
        <label class="input">
        <input type="file" name="uplaodfile"placeholder="img" id="img" class="form-control">
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