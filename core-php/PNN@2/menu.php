<?php 
$pgtitle = "";
include('include-header.php');
?>



</head>
<body class="header-fixed">


<?php
include('include-navbar.php');


//$ddaa = $mysqli->query("SELECT id, name FROM menus ORDER BY id");


$iidd = $mysqli->real_escape_string(isset($_GET[''])?$_GET['']:'');

echo "";

//$iidd = $mysqli->real_escape_string(isset(($_GET['id']));


$detl = $mysqli->query("SELECT  name, btext,id FROM menus WHERE id='".$iidd."'");
$details=$detl->fetch_array(MYSQLI_BOTH);

$fst = explode(' ',trim($details[0]));
$lst = substr(strstr($details[0]," "), 1);



//echo "$details[1]";

?>


<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1><?php echo $fst[0]; ?>  <span class="shop-green"><?php echo $lst; ?> </span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->








<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">



<?php 

//$detl = $mysqli->query("SELECT name, btext FROM menus WHERE id='2'");
//$details=$detl->fetch_array(MYSQLI_BOTH);
$ht=$mysqli->query("SELECT btext FROM menus WHERE id='2'");
$htxt=$ht->fetch_array(MYSQLI_BOTH);

echo "$htxt[0]";
$ht=$mysqli->query("SELECT btext FROM menus WHERE id='3'");
$htxt=$ht->fetch_array(MYSQLI_BOTH);

echo "$htxt[0]";
$ht=$mysqli->query("SELECT btext FROM menus WHERE id='1'");
$htxt=$ht->fetch_array(MYSQLI_BOTH);

echo "$htxt[0]";

echo "$details[1]";



 ?>






</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->


<div style="min-height:200px;"></div>



<?php 
include('include-footer.php');
?>




</body>
</html>
