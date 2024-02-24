 	<div class="wrapper">
		<!--=== Header v5 ===-->
		<div class="header-v5 header-static">


<?php 
//$wcmsg = mysql_fetch_array(mysql_query("SELECT wcmsg FROM general_setting WHERE id='1'"));
include('mysqli.php');
$wc=$mysqli->query("SELECT wcmsg FROM general_setting WHERE id='1'");
$wcmsg=$wc->fetch_array(MYSQLI_BOTH);
?>

<!-- Topbar v3 -->
<div class="topbar-v3">
<div class="container">
<div class="row">
<marquee behavior="scroll" direction="left" style="color:#fff;"><?php echo $wcmsg[0]; ?></marquee>
</div>
</div>
</div>
<!-- End Topbar v3 -->





<!-- Navbar -->
<div class="navbar navbar-default mega-menu" role="navigation">
<div class="container">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">
<img id="logo-header" src="<?php echo $baseurl; ?>/assets/img/logo.png" alt="Logo">
</a>
</div>





<!-- Shopping Cart -->
<div class="shop-badge badge-icons pull-right">
    &nbsp;
<a href="signout.php"><i class="fa fa-sign-out"></i><span id=" class="badge badge-danger mr-2"></span></a>

<a href="product_cart.php"><i class="fa fa-shopping-cart"></i><span id="cart-item" class="badge badge-danger mr-2"></span></a>


</div>
<!-- End Shopping Cart -->








<div class="collapse navbar-collapse navbar-responsive-collapse">
<ul class="nav navbar-nav">


<li><a href="<?php echo $baseurl; ?>/home.php">Dashboard</a></li>
<li><a href="<?php echo $baseurl; ?>/user_home.php">Acc/Dashboard</a></li>
<li class="dropdown">
<a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Markteing</a>
<ul class="dropdown-menu">

<li><a href="<?php echo $baseurl; ?>/bsummery.php">Binary Summery</a></li>
<li><a href="<?php echo $baseurl; ?>/tree.php">My Tree</a></li>
<li><a href="<?php echo $baseurl; ?>/myref.php">My Referral</a></li>

</ul>
</li>



<li class="dropdown">
<a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">My Income</a>
<ul class="dropdown-menu">

<li><a href="<?php echo $baseurl; ?>/increffer.php">Referral Commission</a></li>
<li><a href="<?php echo $baseurl; ?>/incbinary.php">Binary commission</a></li>


</ul>
</li>



<li class="dropdown">
<a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
Finance [ ₹<?php echo $mallu; ?>]</a>
<ul class="dropdown-menu">

<li><a href="<?php echo $baseurl; ?>/addfund.php">Add Fund</a></li>
<li><a href="<?php echo $baseurl;?>/dodeposet.php">Deposit Now</a></li>
<li><a href="<?php echo $baseurl; ?>/check_active_account.php">Request  Withdraw</a></li>
<li><a href="<?php echo $baseurl; ?>/check_active_account_fund.php">Fund Transfer</a></li>
<li><a href="<?php echo $baseurl; ?>/trxpin.php">Transaction PIN</a></li>
<li><a href="<?php echo $baseurl; ?>/trxhistory.php">Transaction History</a></li>
</ul>
</li>




<li class="dropdown">
	
<a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i><span id="cart-item" class="badge badge-danger mr-2"></span>  Product</a>
<ul class="dropdown-menu">
  <li class="nav-item">
    <a class="nav-link" href="product_cart.php"><i class="fa fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger mr-2"></span>  My Cart</a>
        </li>

      
        <li class="nav-item">
          <a class="nav-link" href="product_checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
        </li>
        
<li><a href="<?php echo $baseurl;?>/product_order.php"><i class="fas fa-mobile-alt mr-2"></i>Product Orders </a></li>
<li><a href="<?php echo $baseurl; ?>/product_order_history.php"><i class="fas fa-mobile-alt mr-2"></i>Product Orders History</a></li>

<li class="nav-item">
            <a class="nav-link active" href="product_cash_pending.php"><i class="fa fa-mobile-alt mr-2"></i>Cashback</a>
        </li>
        
    

</ul>
</li>




</ul>
</div>




</div>
</div>
<!-- End Navbar -->
</div>
<!--=== End Header v5 ===-->
