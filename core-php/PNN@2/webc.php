 <?php 
$pgtitle = "HOME";
include('include-header.php');
?>
<style>

.imgg{
    width: 150px;
    height: 150px;
   margin-left:-10px;
}
.txt{
    font-size:14px;
    font-weight: bold;
    text-align:center;
}
.bb{
    border: 2px solid black;
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



<div class="row">
    
<div class="col-md-6">
<div class="col-xs-6 bb">
    <a>
     <img class="imgg"src="../Product/images/1.jpg" >
   <div class="txt">रहर का दाला</div>
<div class="txt">मूल्य : <i class="fa fa-inr" style="font-size:15px;font-weight:bold; color:blue;"><b>150</b></i></i></div>
         <div class="txt">कैशबैक : <i class="fa fa-inr" style="color:red;font-size:15px;font-weight:bold;">50</i></b></div>

  <div> </div> 
  </a>
   </div>
   <div class="col-xs-6 bb">
     <a><img class="imgg"src="../Product/images/1.jpg" >
   <div class="txt">रहर का दाला</div>
<div class="txt">मूल्य : <i class="fa fa-inr" style="font-size:15px;font-weight:bold; color:blue;"><b>150</b></i></i></div>
         <div class="txt">कैशबैक : <i class="fa fa-inr" style="color:red;font-size:15px;font-weight:bold;">50</i></b></div>

  <div> </div> 
  </a>
   </div>



</div>
<div class="col-md-6">
<div class="col-xs-6 bb">
    <a>
     <img class="imgg"src="../Product/images/1.jpg" >
   <div class="txt">रहर का दाला</div>
<div class="txt">मूल्य : <i class="fa fa-inr" style="font-size:15px;font-weight:bold; color:blue;"><b>150</b></i></i></div>
         <div class="txt">कैशबैक : <i class="fa fa-inr" style="color:red;font-size:15px;font-weight:bold;">50</i></b></div>

  <div> </div> 
  </a>
   </div>
   <div class="col-xs-6 bb">
       <a>
     <img class="imgg"src="../Product/images/1.jpg" >
   <div class="txt">रहर का दाला</div>
<div class="txt">मूल्य : <i class="fa fa-inr" style="font-size:15px;font-weight:bold; color:blue;"><b>150</b></i></i></div>
         <div class="txt">कैशबैक : <i class="fa fa-inr" style="color:red;font-size:15px;font-weight:bold;">50</i></b></div>

  <div> </div> 
  </a>
</div>
</div>
</div><!--row-->
<br>

<div class="row">
    
<div class="col-md-6">
<div class="col-xs-6 bb">
     <img class="imgg"src="../Product/images/1.jpg" >
   <div class="txt">रहर का दाला</div>
<div class="txt">मूल्य : <i class="fa fa-inr" style="font-size:15px;font-weight:bold; color:blue;"><b>150</b></i></i></div>
         <div class="txt">कैशबैक : <i class="fa fa-inr" style="color:red;font-size:15px;font-weight:bold;">50</i></b></div>

  <div> </div> 
  
   </div>
   <div class="col-xs-6 bb">
     <img class="imgg"src="../Product/images/1.jpg" >
   <div class="txt">रहर का दाला</div>
<div class="txt">मूल्य : <i class="fa fa-inr" style="font-size:15px;font-weight:bold; color:blue;"><b>150</b></i></i></div>
         <div class="txt">कैशबैक : <i class="fa fa-inr" style="color:red;font-size:15px;font-weight:bold;">50</i></b></div>

  <div> </div> 
  
   </div>



</div>
<div class="col-md-6">
<div class="col-xs-6 bb">
     <img class="imgg"src="../Product/images/1.jpg" >
   <div class="txt">रहर का दाला</div>
<div class="txt">मूल्य : <i class="fa fa-inr" style="font-size:15px;font-weight:bold; color:blue;"><b>150</b></i></i></div>
         <div class="txt">कैशबैक : <i class="fa fa-inr" style="color:red;font-size:15px;font-weight:bold;">50</i></b></div>

  <div> </div> 
  
   </div>
   <div class="col-xs-6 bb">
     <img class="imgg"src="../Product/images/1.jpg" >
   <div class="txt">रहर का दाला</div>
<div class="txt">मूल्य : <i class="fa fa-inr" style="font-size:15px;font-weight:bold; color:blue;"><b>150</b></i></i></div>
         <div class="txt">कैशबैक : <i class="fa fa-inr" style="color:red;font-size:15px;font-weight:bold;">50</i></b></div>

  <div> </div> 
</div>
</div>
</div>
</div><!--container-->



<!--=== End Product Content ===-->

<?php 
include('include-footer.php');
?>


</body>
</html>
