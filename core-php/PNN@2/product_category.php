<?php 
$pgtitle = "Masala Product";
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


<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1>Category   <span class="shop-green">Product</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->




<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">

<?php
include('newnav.php');
?>




		<div class="row margin-bottom-10">
		
      
		<?php 
		$pro_cate=$_GET['proid'];
	
      $sql=$mysqli->query("SELECT product_title,pro_real_price,product_des,qty,product_img ,product_id_rr FROM product WHERE product_cat_id='$pro_cate' ");
       while($res=mysqli_fetch_array($sql)){
          $image = '../admin12/uploads/'.$res['product_img'];?>
           <div class="col-xs-4">
		<?php echo"<a href='product_details_indes.php?userid=$res[5]'>";?>
			<img src="<?php echo $image;?>" class="img-fluid img-thumbnail" id="img" ></a>
			<div class="text-center">
			    <h4><?php echo $res[0]?></h4>
			    <h4>RS <?php echo $res[1]?></h4>
			  
			</div>
			</div>	
			   <?php echo"</a>";?>
		<?php }?>	
	
		</div>


		

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