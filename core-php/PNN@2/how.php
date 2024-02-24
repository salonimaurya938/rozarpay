<?php 
$pgtitle = "HOME";
include('include-header.php');
?>

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


<div class="row margin-bottom-60">
<?php 

//$htxt = mysql_fetch_array(mysql_query("SELECT btext FROM menus WHERE id='1'"));
$ht=$mysqli->query("SELECT btext FROM menus WHERE id='2'");
$htxt=$ht->fetch_array(MYSQLI_BOTH);

echo "$htxt[0]
<br><br><br>
<br><br><br><br><br><br><br><br></br>
<br><br><br><br><br><br><br><br><br><br><br><br>";
?>

</div>











			</div>




</div>






</div>

<!--=== End Product Content ===-->


















<?php 
include('include-footer.php');
?>


</body>
</html>
