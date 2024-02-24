<?php 
$pgtitle = "Add Fund";
include('include-header.php');
?>
  

<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo $adminurl; ?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $adminurl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<link href="<?php echo $adminurl; ?>/assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />


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


<!--<img src="../slider/google pay img.jpg">-->
<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">
<div class="shop-product">
<div class="row">
<?php 
$tm = time();
$dt = date("YmdH", $tm);
$payid = "$dt$uid";

include('mysqli.php');
//$general = mysql_fetch_array(mysql_query("SELECT sitetitle, pmuid, pmsec, pp FROM general_setting WHERE id='1'"));
$gen=$mysqli->query("SELECT sitetitle, pmuid, pmsec, pp FROM general_setting WHERE id='1'");
$general =$gen->fetch_array(MYSQLI_BOTH);
?>
</div>
</div>
</div>             
<!-- //content > row-->
</div>
<!-- //content-->











<!--=== Product Content ===-->
<div class="container content-md">


<div class="row margin-bottom-60">


</div>










<div class="row ">

      <div class="col-md-4 product-service ">
      
     
      </div>

      <div class="col-md-4 product-service ">
      <div class="heading bg-red">
       <img src="../slider/a.png" class="rounded mx-auto d-block"  >
      </div>
      <div class="text-center">
      <h3>Using UPI APP</h3>
      <h3>Mobile Number:9721564102</h3>
      <div class="btn btn-info rounded " ><a href="TxnTest.php"style="color:white; font-weight: bold;font-size: 14px; ">Add Fund</a></div>
      </div>
      </div>

      



</div>




<div class="row margin-bottom-60">
</div>






</div>

<!--=== End Product Content ===-->




</div><!--/end container-->
</div>
<!--=== End Registre ===-->

<div style="margin-top:50px;"></div>

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