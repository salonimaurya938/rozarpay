<?php 
$pgtitle = "Product Order";
include('include-header.php');
?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo $adminurl; ?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $adminurl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<link href="<?php echo $adminurl; ?>/assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
<style>
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
<h1>Product  <span class="shop-green">Order</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->
<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">
<div class="col-md-12">
<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet light bordered">
<div class="portlet-title">
<div class="caption font-dark">
<span class="caption-subject bold uppercase"> Product Order</span>
</div>
<div class="tool"> </div>
</div>
<div class="portlet-body">
<table class="table table-striped table-bordered table-hover" id="sample_1">
<thead>
<tr>
<th> SL# </th>
<th> Product ID </th>
<th> Requested on </th>
<th> Amount</th>
<th> Method </th>
<th> Product Details </th>
<th> Status </th>
<th> Processed on </th>
</tr>
</thead><tbody>

<?php


$i = 1;
$ddaa = $mysqli->query("SELECT id,name,email,pone,address,pmode,amount_paid,products,time_date, username, status,cmordptm,prduct_trx  FROM orders WHERE username='".$user."' AND status='0' ORDER BY id DESC");
echo mysqli_error($mysqli);
while ($data = mysqli_fetch_array($ddaa))

{



$sl = str_pad($i, 4, '0', STR_PAD_LEFT);


if($data[11]==0){
    $status = "<b class='btn btn-info btn-xs'> Awaiting Review </b>";
        $ptm = "<i>Awaiting Review</i>";
}elseif($data[11]==1){
    $status = "<b class='btn btn-success btn-xs'> SUCCESS </b>"; 
    $ptm = date("d-m-Y h:i:s A", $data[12]);
}elseif($data[11]==2){
    $status = "<b class='btn btn-warning btn-xs'> REFUNDED </b>";
     $ptm = date("d-m-Y h:i:s A", $data[12]); 
}else{
    $status = "<b class='btn btn-danger btn-xs'> UNKNOWN </b>"; 
}

$ptmpr = date("d-m-Y h:i:s A", $data[8]);
echo "                                
<tr>

<td>$sl</td>
<td>$data[12]</td>
<td>$ptmpr</td>
<td>$data[6]</td>
<td>$data[5]</td>
<td>$data[7]</td>
<td>$status</td>
<td>$ptm</td>
</tr>";

$i++;
}


?>                                           
</tbody>
</table>
</div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
</div>
<div style="margin-top:100px;"></div>
</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->
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