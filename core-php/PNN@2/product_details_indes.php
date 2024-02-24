<?php 
$pgtitle = "HOME";
include('include-header.php');
?>
<style>
	#img{

	
	border-radius:8px;
    border-radius: 2px solid  #3f51b5;
     box-shadow: 0 0 15px hsla(0deg, 0%, 0%, 0.5);
    

	}
	.n{
		font-weight: bold;
		font-size: 16px;
		height: 50px;
		margin: 5px;

	}
	#aa{
		color: white;
		list-style: none;
	}
</style>
</head>
<body class="header-fixed">


<?php
include('include-navbar.php');
?>

<!--=== Product Content ===-->
<div class="container ">


<div class="row margin-bottom-30">
<?php 

//$htxt = mysql_fetch_array(mysql_query("SELECT btext FROM menus WHERE id='1'"));
$ht=$mysqli->query("SELECT btext FROM menus WHERE id='1'");
$htxt=$ht->fetch_array(MYSQLI_BOTH);

echo "$htxt[0]";
$sql=$mysqli->query("SELECT product_title,pro_real_price,product_des,qty,product_img ,product_id_rr FROM product ");
$res=$sql->fetch_array(MYSQLI_BOTH);
?>

</div>
<?php 

$id=$_GET['userid'];
mysqli_set_charset($mysqli,"utf8");
$sql=$mysqli->query("SELECT product_title,pro_real_price,product_des,qty,product_img ,product_id_rr ,product_img1,product_img2,product_img3 FROM product WHERE product_id_rr='".$id."'");
$res=$sql->fetch_array(MYSQLI_BOTH);
include('newnav.php');
?>

<div class="row margin-bottom-30">
<div class="col-sm-1 "></div>
<div class="col-sm-4 product-service  sm-margin-bottom-30">
			<br>
	<!--=== Slider ===-->

    <div class="tp-banner-container">
        
			<div class="tp-banner">
				<ul>

<?php
        $imgarray = array("admin12/uploads/$res[4]", "admin12/uploads/$res[6]","admin12/uploads/$res[7]");

$arrlength = count($imgarray);

for($x = 0; $x < $arrlength; $x++) {
  
	


?>

<!-- SLIDE -->
<li id="img" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">

<!-- MAIN IMAGE -->
<img src="<?php echo $imgarray[$x]; ?>"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">


</li>
<!-- END SLIDE -->
<?php

}

?>


</ul>
<div class="tp-bannertimer tp-bottom"></div>
</div>
</div>

	
<!--=== End Slider ===-->
			</div>


			<div class="col-sm-1"></div>
     		<div class="col-sm-4 product-service  sm-margin-bottom-30">
				<h3>Product Details:<?php echo $res[0] ?></h3>
			
			<h3>Rs.<?php echo $res[1] ?></h3>
			<h4>Description: <?php echo $res[2]?></h4>
			<a href="<?php echo $baseurl ?>/register.php" class="btn btn-success " > Register</a>&nbsp;&nbsp; <a class="btn btn-success " href="<?php echo $baseurl ?>/login.php">Login</a>
			</div>
<div class="col-sm-1"></div>


</div>
</div>

</div>
<div style="margin-top: 200px;" ></div>
<!--=== End Product Content ===-->

<?php 
include('include-footer.php');
?>


</body>
</html>
