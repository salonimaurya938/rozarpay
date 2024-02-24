 
<?php 
$pgtitle = "Product Checkout";
include('include-header.php');
?>
 <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <meta charset="utf-8">
<style type="text/css">
  
         .select{
          width: 100px;
         
          font-size: 16px;
          font-weight: 700;
          font-family: 'Poppins',sand-serif;
          border:none;
          border-radius:8px;
          border-radius: 2px solid  #3f51b5;
          box-shadow: 0 15px 15px #efefef;
            appearance:none;
            background: #e8eaf6 url(image/arrow.png) no-repeat;
            background-position: 97% 55%
            background-size:22px;
         }
        
         .data{
          display:none;
         }
         
         
      .button {
        background-color: #008cba; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
      }
      .button:disabled {
        opacity: 0.5;
      }
      .hide {
        display: none;
      }
    

  </style>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <meta charset="utf-8">
</head>
<body class="header-fixed">


<?php
include('include-navbar.php');
?>

<?php

  $grand_total = 0;
  $allItems = '';
  $qqtt='&nbsp;Quentity=';
  $kilogram='किलो ग्रा<br> ';
  $items = [];
  $items2 = [];
mysqli_set_charset($mysqli,"utf8");
  $sql = $mysqli->query("SELECT product_name,qty, total_price FROM cart WHERE username='".$user."'");

  while ($row = mysqli_fetch_assoc($sql)) {
    $grand_total += $row['total_price'];
    $items[] = $row['product_name']. $qqtt.$row['qty']/1000 .$kilogram;
  }
  $allItems = implode(', ',$items);
?>
<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1>Product  <span class="shop-green">Checkout</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->
<?php
mysqli_set_charset($mysqli,"utf8");
 $will=$mysqli->query("SELECT tcrg,dlvcrg FROM general_setting WHERE id='1'");
$trxCharge=$will->fetch_array(MYSQLI_BOTH);
mysqli_set_charset($mysqli,"utf8");
 $dis=$mysqli->query("SELECT * FROM users WHERE username='".$user."'");
$data=$dis->fetch_array(MYSQLI_BOTH);
mysqli_set_charset($mysqli,"utf8");
 $discart=$mysqli->query("SELECT product_code,product_name FROM cart WHERE username='".$user."'");



?>

<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">

  <div class="container">
    <div class="row  ">
      <div class="col-lg-3"></div>
      <div class="col-lg-6  " id="order">
          
        <h4 class="text-center text-info ">Complete your order!</h4>
        <div class="jumbotron  text-center">
          <h6 class="lead"><b>Product(s) : </b><?php echo $allItems; ?></h6>
          <h6 class="lead"><b>Delivery Charge : </b><?php echo$trxCharge[1].'.Rs'?></h6>
          <h5 ><b>Product Amount  : </b><?php echo number_format($grand_total,2) ?>/-</h5>
          <h5><b>Total Amount Payable : </b><?= number_format($grand_total+$trxCharge[1],2) ?>/-</h5>
        </div>
        <form action="" method="post" id="placeOrder">
          <input type="hidden" name="products" value="<?php echo $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?php echo $grand_total; ?>">
          <input type="hidden" name="username" class="form-control" value="<?php echo $user;?>">
        
          <div class="form-group">
            <div class="input-group">
          <span class="input-group-addon">Your Name</span>
            <input type="text" name="name" class="form-control"
             value="<?php echo $data[8]. "&nbsp;".$data[9];?>"
             required>
          </div>
        </div>
          <div class="form-group">
            <div class="input-group">
          <span class="input-group-addon">Your Email</span>
            <input type="email" name="email" class="form-control" value="<?php echo$data[16];?>" required>
          </div>
        </div>

         <div class="form-group">
            <div class="input-group"> 
            <input type="hidden" name="product_id_rr" class="form-control" value="<?php
             mysqli_set_charset($mysqli,"utf8");
            while($ddtt=mysqli_fetch_array($discart)){
             echo  $ddtt[0].'='.$ddtt[1].'&nbsp;<br>';


          }
            ?>" >
     
        </div>
        
          <div class="form-group">
              <div class="input-group">
          <span class="input-group-addon">Your Mobile Number</span>
            <input type="tel" name="phone" class="form-control" value="<?php echo$data[15];?>">
          </div>
          </div>
<div class="form-group">
  <div class="input-group">
          <span class="input-group-addon">Your State</span>
            <input type="tel" name="state" class="form-control" value="<?php echo$data[33];?>" >
          </div>
</div>
<div class="form-group">
  <div class="input-group">
          <span class="input-group-addon">Your City</span>
            <input type="tel" name="city" class="form-control" value="<?php echo$data[12];?>"required >
          </div>
</div>
          <div class="form-group">
            <div class="input-group">
            <span class="input-group-addon">Your Postcode</span>
            <input type="tel" name="pincode" class="form-control" value="<?php echo$data[13];?>"required >
          </div>
</div>
          <div class="form-group">
            <div class="input-group">
            <span class="input-group-addon">Your Address</span>
            <input name="address" class="form-control" rows="3" cols="10" 
            value="<?php echo$data[11];?>"required>
          </div>
          </div>
       


<div class="form-group">
<div class="input-group">

<input class="form-control input-lg" type="hidden"  value="<?= number_format($grand_total+$trxCharge[1],2) ?>" 
name="amount"  >
<span class="input-group-addon">RS.</span>
<input class="form-control input-lg" disabled="disabled"  value="    <?php

         if($grand_total==0.00){
          $aa=number_format($grand_total,2);
          echo $aa;
         }
           
         else{
          $aamm=$aa=number_format($grand_total+$trxCharge[1],2);
          echo $aamm;
         }
?>" 
 >

</div> &nbsp;
 
         


    <select id="name" name="pmode" class="form-control">
     
      <option value="Cash On Dilvary" selected>Cash On Dilvary</option>
      <option value="POBPPro">Pay Online By PainaPro</option>
    </select>&nbsp;
   <div id="POBPPro" class="data">
  <div class="form-group" >
<input class="form-control input-lg" placeholder="Transection PIN" name="trxp" type="password">
</div>
  </div>
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $("#name").on('change',function(){
      $(".data").hide();
      $("#"+$(this).val()).fadeIn(700);

          }).change();
  });
</script>
<br>
<!---
<p style="color:red; font-weight: bold; font-size:20px;"> <?php  $trxCharg; ?>% Transfer Charge will Applied and transferred Fund will go to Secondary Balance.</p>
--><div class="col-lg-3"></div>
   <div class="col-lg-6">
          <div class="form-group " >
              
              
            
    <button class="button btn btn-success rounded form-control input-lg ">
      <i class="loading-icon fa fa-spinner fa-spin hide"></i>
      <span class="btn-txt">Place Order</span>
    </button>
            
            
          </div></div>
        </form>
        </div>
</div>
</div>
</div> 
      </div>
    </div>
  </div>
</div>
</div>
 

  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $(".loading-icon").removeClass("hide");
          $(".button").attr("disabled", true);
          $(".btn-txt").text("Fetching Data From Server...");
      $.ajax({
        url: 'product_action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
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
  <div style="margin-top:230px;"></div>
<?php
include("include-footer.php");
?>


<script type='text/javascript'>
function loader(){

}


jQuery(document).ready(function(){
$('#refname').on('input', function() {
var refname = $("#refname").val();
        $.post( 
           "<?php echo $baseurl; ?>/jsapi-transfer.php",
                  { 
                     refname : refname,
                 
          },

            function(data) {
              $("#resu").html(data);
              }
               );
});  
});
</script>
</body>

</html>