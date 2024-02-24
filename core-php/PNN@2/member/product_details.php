<?php
$pgtitle = "Dashboard";
include('include-header.php');
?>

</head>
<body class="header-fixed">


<?php
include('include-navbar.php');
?>


<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1>Account  <span class="shop-green">Dashboard</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->




<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">

<div class="row">
	
<?php
include('mysqli.php');

//$psts = mysql_fetch_array(mysql_query("SELECT paid_status FROM users WHERE mid='".$uid."'"));
$ps=$mysqli->query("SELECT paid_status FROM users WHERE mid='".$uid."'");
$psts=$ps->fetch_array(MYSQLI_BOTH);

//$gen = mysql_fetch_array(mysql_query("SELECT uc, comitree, comi FROM general_setting WHERE id='1'"));

$ge=$mysqli->query("SELECT uc, comitree, comi FROM general_setting WHERE id='1'");
$gen=$ge->fetch_array(MYSQLI_BOTH);
if($psts[0]==0){

echo "<div class=\"alert alert-warning alert-dismissable\">

<a href=\"$baseurl/UpgradeToPremium.php\" class='btn btn-success btn-md pull-right'> UPGRADE NOW</a>

<strong> If You Upgrade Profile You will Eligible for Comissions. </strong><br>
You will Get ₹ $gen[2] INR When any of Your Referral Upgrade To Premium Account <br>
You will Get ₹ $gen[1] INR When any of Your Below Tree Member Upgrade To Premium Account <br>

</div>";


}else{

echo "<div class=\"alert alert-success alert-dismissable\">

<strong> You Are Eligible for Comissions. </strong><br>
You will Get ₹ $gen[2] INR When any of Your Referral Upgrade To Premium Account <br>
You will Get ₹ $gen[1] INR When any of Your Below Tree Member Upgrade To Premium Account <br>


</div>";


}

 ?>


</div>

</div>
<?php 

$id=$_GET['userid'];

$sql=$mysqli->query("SELECT product_title,product_price,product_des,qty,product_img ,product_id_rr FROM product WHERE product_id_rr='".$id."'");
$res=$sql->fetch_array(MYSQLI_BOTH);
?>
<div class="row margin-bottom-30">
	<form action="product_manage_cart.php" method="post">
<div class="form-gruop"> 
<div class="col-sm-6 product-service  sm-margin-bottom-30">
	
			<img src="<?php echo '../student/'.$res[4]?>" class="img-fluid img-thumbnail"  ></a>
			</div>
			<div class="col-sm-6 product-service  sm-margin-bottom-30">
				<h1><?php echo $res[0] ?></h1>
			
			<h1>Rs.<?php echo $res[1] ?></h1>
			<p><?php echo $res[2]?></p>
	<button type="submit" class="btn btn-info" name="Add_To_Cart"> Add To Cart</button>
	<input type="hidden" name="product_title" value="<?php $res[0]?>">
     <input type="hidden" name="product_price" value="<?php $res[1]?>">
			</div>
		</form>
</div>
</div>

</div>


</div>





<div style="margin-top:30px;"></div>





<?php 


echo date("d M Y ----- h:i:s A");


 ?>







</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->

<div style="margin-top:230px;"></div>
<?php
include("include-footer.php");
?>
</body>
</html>