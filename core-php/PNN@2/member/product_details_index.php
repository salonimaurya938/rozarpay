<?php 
$pgtitle = "Product Details";
include('include-header.php');
?>
<!--=== new header ===-->

<!--=== end Header ===-->
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
		color: white;
		list-style: none;
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
<h1>Product  <span class="shop-green">Details</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->




<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
  <!-- Navbar start -->
  
  <!-- Navbar end -->

  <!-- Displaying Products Start -->

  <div class="container">
       <div id="message"></div>
   <?php
include('../newnav.php');
?>

    
    <div class="row margin-bottom-30">
      <div class="col-sm-2 "></div>
      <div class="col-sm-4 sm-margin-bottom-30">

      <?php
        
          
        $iidd=$_GET['userid'];
        mysqli_set_charset($mysqli,"utf8");
        $stmt = $mysqli->query("SELECT * FROM product where product_id_rr='".$iidd."'");
      
      $row = $stmt->fetch_array(MYSQLI_BOTH);
      

              $sql=$mysqli->query("SELECT product_title,product_price,product_des,qty,product_img ,product_id_rr ,product_img1,product_img2,product_img3,product_qtyid FROM product WHERE product_id_rr='".$iidd."'");
$res=$sql->fetch_array(MYSQLI_BOTH);

?>
<br>
  <!--=== Slider ===-->
<div class="tp-banner-container">
<div class="tp-banner">
        <ul>

<?php
       
        $imgarray = array("admin12/uploads/$res[4]", "admin12/uploads/$res[6]","admin12/uploads/$res[7]");

$arrlength = count($imgarray);

for($x = 0; $x < $arrlength; $x++) {
  
  


?>

<!-- SLIDE -->

<li id="img" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">

<!-- MAIN IMAGE -->
<img src="<?php echo '../'.$imgarray[$x]; ?>"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

</li>

<!-- END SLIDE -->
<?php

}

?>


</ul>
<ul>
<li>Pavan</li></ul>
<div class="tp-bannertimer tp-bottom"></div>
</div>
</div>
<!--=== End Slider ===-->

            

            </div>
            
<div class="col-md-1 "></div>
           <div class="col-md-4">
              <h4 class="card-title text-left text-info"><?php echo $row['product_title'] ?></h4>
              <h4 class="card-title text-left text-danger">Price:<i class="fa fa-inr"></i>
              <?= number_format($row['pro_real_price'],2) ?>/-</h4>
                <h4 class="card-title text-left text-info">Description:</b><?php echo $row['product_des'] ?></h4>

                    
              

            <div class="card-footer ">
              <form action="" class="form-submit">
                <?php

             if($row['product_qtyid']=='Q'  ){
              ?>  <h4>Quantity : 
               <input type="number" class="form-control pqty" value="<?php echo $row['product_qty'] ?>">
               <input  type="hidden" class="pqtyid" value="Q">
             </h4>
             <?php }
             else{
              ?>
               <h4>Quantity : 
                 
              <input  type="hidden" class="pqtyid" value="P">
                 <select class="form-control pqty ">
      <option  selected="" disabled="disabled" value="<?php echo $row['qty'];?>"><?php echo $row['qty']/1000;?>किलो ग्रा </option>
                   <option value="250"> 1 पाव </option>
                   <option value="500"> 0.5(आधा )किलो ग्रा </option>
                   <option value="1000" selected="selected"> 1 किलो ग्रा  </option>
                   <option value="1500"> 1.5 किलो ग्रा </option>
                   <option value="2000"> 2 किलो ग्रा  </option>
                   <option value="2500"> 2.5 किलो ग्रा  </option>
                   <option value="3000"> 3 किलो ग्रा  </option>
                   <option value="3500"> 3.5किलो ग्रा  </option>
                   <option value="4000"> 4 किलो ग्रा  </option>
                   <option value="4500"> 4.5 किलो ग्रा  </option>
                   <option value="5000"> 5 किलो ग्रा  </option>
                   <option value="5500"> 5.5 किलो ग्रा  </option>
                 
                   <option value="6000"> 6.0 किलो ग्रा  </option>
                   <option value="6500"> 6.5 किलो ग्रा  </option>
                   <option value="7000"> 7.0 किलो ग्रा  </option>
                   <option value="7500"> 7.5 किलो ग्रा </option>
                   <option value="8000"> 8.0 किलो ग्रा  </option>
                   <option value="8500"> 8.5 किलो ग्रा  </option>
                   <option value="9000"> 9.0 किलो ग्रा  </option>
                   <option value="9500"> 9.5 किलो ग्रा  </option>
                   <option value="10000"> 10.0 किलो ग्रा  </option>
               
               
                 </select>
                
                 </h4>
               <?php }?>
                   <br>
                <input  type="hidden" class="uname" value="<?php echo $_SESSION['username']; ?>">
                <input  type="hidden" class="pid" value="<?php echo $row['product_id'] ?>">
                <input  type="hidden" class="pid_rr" value="<?php echo $row['product_id_rr'] ?>">
                <input type="hidden" class="pname" value="<?php echo $row['product_title'] ?>">
                <input type="hidden" class="pprice" value="<?php echo $row['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?php echo $row['product_img'] ?>">
                <input type="hidden" class="pcode"  value="<?php echo $row['product_id_rr'] ?>">
                 <input  type="hidden" class="prd_cashback" value="<?php echo $row['cashback'] ?>">
                <input type="hidden" class="puser" value="<?php echo $user;?>">
                <button class="btn btn-info rounded  addItemBtn button"><i class="loading-icon fa fa-spinner fa-spin hide"></i>&nbsp;<span class="btn-txt">Add to
                  cart</span></button>
              </form>
            </div>
         
        </div></div>
                </div>

            </div>
</div>
      
    </div>
  </div>




  <!-- Displaying Products End -->

<div style="margin-top:230px;"></div>


<!--=== new footer ===-->
<!--=== End footer ===-->

<?php
include("include-footer.php");
?>


  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
       var pid_rr = $form.find(".pid_rr").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();
      var prd_cashback = $form.find(".prd_cashback").val();
      var pqty = $form.find(".pqty").val();
       var puser = $form.find(".puser").val();
       var pqtyid = $form.find(".pqtyid").val();
       var uname = $form.find(".uname").val();

       
        $(".loading-icon").removeClass("hide");
          $(".addItemBtn").attr("disabled", true);
          $(".btn-txt").text("Fetching Data From Server...");

      
      $.ajax({
        url: 'product_action.php',
        method: 'post',
        data: {
          pid: pid,
          pid_rr: pid_rr,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode,
          prd_cashback:prd_cashback,
          puser:puser,
          pqtyid:pqtyid,
          uname:uname
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
          
           $(".loading-icon").addClass("hide");
            $(".button").attr("disabled", false);
            $(".btn-txt").text("Add To Cart");
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
</body>
</html>