 
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

$data1=$mysqli->query("SELECT username,email,mobile FROM users WHERE username='".$user."'");
$data =$data1->fetch_array(MYSQLI_BOTH);

?>
</div>
</div>
</div>             
<!-- //content > row-->
</div>
<!-- //content-->

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<!--=== Registre ===-->
<div class="log-reg-v3 content-md" >
<div class="container">
<div class="row">
        <div class="col-md-8 col-md-offset-2" >
        <form id="sky-form4" class="log-reg-block sky-form" method="post" action="pgRedirect.php">
        <h2>Add Fund Account</h2>
<div class="row">
<div class="col-sm-12">

</div>
</div>
        <div class="login-input reg-input">
       


   <section>
        <label class="input">
         <input type="hidden" placeholder="Enter Your Email " id="trx_number" class="form-control"
         title="TXN_AMOUNT" tabindex="10"
                        type="text" name="EMAIL"
                        value="<?php echo $data[1]?>">
        </label>
        </section>
        
         <section>
        <label class="input">
         <input type="hidden"placeholder="Enter Your MOBILE " id="trx_number" class="form-control"
         title="TXN_AMOUNT" tabindex="10"
                        type="text" name="MSISDN"
                        value="<?php echo $data[2]?>">
        </label>
        </section>
        

        <section>
        <label class="input">
         <input placeholder="Enter Your AMOUNT " id="trx_number" class="form-control"
         title="TXN_AMOUNT" tabindex="10"
                        type="text" name="TXN_AMOUNT"
                        value="">
        </label>
        </section>
        

           
        <section>
        <label class="input">
         <input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
                        name="ORDER_ID" autocomplete="off" class="form-control"
                        value="<?php echo  "ORDS" . rand(10000,99999999)?>">
        </label>
        </section>
        <div id="trx_numberer"></div>


<section>
        <label class="input">
         <input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $user;?>" class="form-control">
        </label>
        </section>
        


<section>
         <label class="input">
        <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="ECommerce" class="form-control">
        </label>
        </section>
        


<section>
        <label class="input">
        <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
                        size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" class="form-control">
        </label>
        </section>
        

       

             
        

                  </div>

        
        <input class="btn-u btn-u-sea-shop btn-block margin-bottom-20" value="Check Out" type="submit"  onclick="" type="submit">
        </form>

       
       
        </div>





</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->
</body></html>