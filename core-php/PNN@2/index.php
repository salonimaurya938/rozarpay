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
	    
	    color:white;
	    list-style:none;
	    
	}
</style>
</head>
<body class="header-fixed">


<?php
include('include-navbar.php');
?>


	<!--=== Slider ===-->
		<div class="tp-banner-container">
			<div class="tp-banner">
				<ul>
<?php 

$ddaa = $mysqli->query("SELECT img FROM slider_home ORDER BY id");
    while ($data = mysqli_fetch_array($ddaa))
    {

?>


<!-- SLIDE -->
<li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">
<!-- MAIN IMAGE -->
<img src="slider/<?php echo $data[0];?>"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
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



<!--=== Product Content ===-->
<div class="container content-md">

<div class="row ">
<?php 


$ht=$mysqli->query("SELECT btext FROM menus WHERE id='1'");
$htxt=$ht->fetch_array(MYSQLI_BOTH);

echo "$htxt[0]";

?>

</div>
<?php
include('newnav.php');
?>
<div class="row margin-bottom-30">
	<?php 
	mysqli_set_charset($mysqli,"utf8");
$sql=$mysqli->query("SELECT product_title,pro_real_price,product_des,qty,product_img ,product_id_rr FROM product ");


while($res=mysqli_fetch_array($sql)){
$image = 'admin12/uploads/'.$res['product_img'];
?>
			<div class="col-sm-3 product-service  sm-margin-bottom-30">
				<?php echo"<a href='product_details_indes.php?userid=$res[5]'>";?>
			<img src="<?php echo $image;?>" class="img-fluid img-thumbnail" id="img" ></a>
			<div class="text-center">
			<h3><?php echo $res[0]?></h3>
			    <h4>RS.<?php echo $res[1]?></h4>
			  
			</div>
			</div>	
			   <?php echo"</a>";?>
		<?php }?>	
</div>


</div>

<!--=== End Product Content ===-->

<?php 
include('include-footer.php');
?>


</body>
</html>
