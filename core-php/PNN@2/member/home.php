<?php 
$pgtitle = "Product Dashboard";
include('include-header.php');
?>
<style>
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
	#img{

	
	border-radius:8px;
    border-radius: 2px solid  #3f51b5;
     box-shadow: 0 0 15px hsla(0deg, 0%, 0%, 0.5);
    

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
<h1>Product  <span class="shop-green">Dashboard</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->

<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
    
<div class="row">
<div class="col-md-12">	
<?php
include('mysqli.php');

$ps=$mysqli->query("SELECT paid_status FROM users WHERE mid='".$uid."'");
$psts=$ps->fetch_array(MYSQLI_BOTH);

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
<?php include('../newnav.php'); ?>
<div class="row ">
	<?php 
	mysqli_set_charset($mysqli,"utf8");
$sql=$mysqli->query("SELECT product_title,pro_real_price,product_des,qty,product_img ,product_id_rr FROM product WHERE product_qtyid !='Q' ");


while($res=mysqli_fetch_array($sql)){

?>
			<div class="col-sm-3 product-service  sm-margin-bottom-30">
				<?php echo"<a href='product_details_index.php?userid=$res[5]'>";?>
			<img src="<?php echo '../admin12/uploads/'.$res[4]?>" class="img-fluid img-thumbnail" id
			="img" >
			<div class="text-center">
			<h3><?php echo $res[0]?></h3>
			    <h4>RS.<?php echo $res[1]?></h4>
			     <?php echo"</a>";?>
			</div>
			</div>	
			</a>
		<?php }?>	
</div>
<div class="row ">
  <?php 
  mysqli_set_charset($mysqli,"utf8");
$sql=$mysqli->query("SELECT product_title,pro_real_price,product_des,qty,product_img ,product_id_rr ,product_qtyid FROM product WHERE product_qtyid='Q' ");


while($res=mysqli_fetch_array($sql)){

?>
      <div class="col-sm-3 product-service  sm-margin-bottom-30">
        <?php echo"<a href='product_details_index.php?userid=$res[5]'>";?>
      <img src="<?php echo '../admin12/uploads/'.$res[4]?>" class="img-fluid img-thumbnail" id
      ="img" >
      <div class="text-center">
      <h3><?php echo $res[0]?></h3>
          <h4>RS.<?php echo $res[1]?></h4>
           <?php echo"</a>";?>
      </div>
      </div>  
      </a>
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



  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();
       var puser = $form.find(".puser").val();
      
      $.ajax({
        url: 'product_action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode,
          puser:puser
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'product_action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
