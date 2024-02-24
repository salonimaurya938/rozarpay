 <?php 
$pgtitle = "HOME";
include('include-header.php');
?>
<style>
		.imgg{

	
	margin-left: 15px;
	position:relative;
	height: 149px;
	width: 180px;
	border-radius: 25px;

	}
.row1{
    margin:2px;
   box-shadow: 10px 10px 5px #aaaaaa;
  
   border:2px solid #aaaaaa;
   border-radius: 25px;
   po
   
}
.ww{
    
    left:-31px;
}
.tt{
    top: 4px;
font-size: 20px;
font-weight: bold;
color:blue ;

}
.mm,option{
    font-size: 16px;
    font-weight: bold;
    color:#000;
}
.dlt{
    height: 30px;
}.cr{
    
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
<div class="row  row1 ">
    
<div class="col-xs-6 ww">
    
  <img class="imgg"src="../Product/images/1.jpg" >
  <div class="cr"></div>
</div>
<div class="col-xs-6">
<div class="tt">1.रहर का दाल</div>
<div class="mm">मूल्य : <i class="fa fa-inr" style="font-size:18px;font-weight:bold; color:blue;"><b>150</b></i></i></div>

<div class="mm">         <input  type="hidden" class="pqtyid" value="P">
                <select class="pqty ">Matra<b>
      <option>10 किलो ग्रा </option><b></b></select> </div>
      
      <div class="mm"> कुल मूल्य : <i class="fa fa-inr"style="font-size:18px;font-weight:bold; color:blue;"><b>1500</b></i>
      
      </div>
      <div><b>कैशबैक : <i class="fa fa-inr" style="color:red;font-size:18px;font-weight:bold;">50</i></b>&nbsp;&nbsp;&nbsp;&nbsp;<a ><i class="fa fa-trash fa-2x"></i></a></div>

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
