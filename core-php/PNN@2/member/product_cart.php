<?php 
$pgtitle = "Product Cart";
include('include-header.php');
?>

<style type="text/css">
      .imgg{

  
  margin-left: 15px;
  position:relative;
  height: 149px;
  width: 180px;
  border-radius: 25px;

  }
.row1{
    margin:5px;
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
</head>
<body class="header-fixed">


<?php
include('include-navbar.php');
?>

<?php
  $prd_cbk=0;
  $grand_total = 0;
  $allItems = '';
  $qqtt='&nbsp;Quentity=';
  $kilogram='किलो ग्रा<br> ';
  $items = [];
  $items2 = [];
mysqli_set_charset($mysqli,"utf8");
  $sql = $mysqli->query("SELECT product_name,qty, total_price ,product_qtyid,cashback FROM cart WHERE username='".$user."'");

  while ($row = mysqli_fetch_assoc($sql)) {
    $grand_total += $row['total_price'];
      $prd_cbk += $row['qty']*$row['cashback'];
  if($row['product_qtyid']=='Q'){
              
    $items[] = $row['product_name']. $qqtt.$row['qty'];
  
    
    }
    else{
                   
    $items[] = $row['product_name']. $qqtt.$row['qty']/1000 .$kilogram;
  
    }
  }
  
  $allItems = implode(', ',$items);
?>
<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1>Product  <span class="shop-green">Cart</span></h1>
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
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div style="display:<?php if (isset($_SESSION['showAlert'])) {
  echo $_SESSION['showAlert'];
} else {
  echo 'none';
} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
} unset($_SESSION['showAlert']); ?></strong>
        </div>
 <input type="hidden" id="uid" value="<?php echo $user ?>">
        
  <div class="container content-md" id="table-data">
    

  </div>     


 


      </div>
    </div>
  </div>

<div >
  <div class="container">
    <div class="row  ">
      <div class="col-lg-3"></div>
      <div class="col-lg-6  " id="order">
          
       
    
    
        </div>
</div>

</div>
</div> 


      </div>
    </div>
  </div>
</div>
</div></div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {
    // Load Table Records
    function loadTable(){
       var uid = $("#uid").val();
      $.ajax({
        url : "ajax-load.php",
        type : "POST",
        data :{uid:uid},
        success : function(data){
          $("#table-data").html(data);
        }
      });
    }
    loadTable(); // Load Table Records on Page Load



  
$(document).on('click', '#add', function(e){
    e.preventDefault();
     var uid = $("#uid").val();
     pqtyid=$("#pqtyid").val();
    var id = $(this).data('id');
    var qty = $('#qty_'+id).val();
    
    qty++;
    $('#qty_'+id).val(qty);
    $.ajax({
      type: 'POST',
      url: 'product_cart_update.php',
      data: {
        id: id,
        qty: qty,
        uid:uid,
        pqtyid:pqtyid,
      },
      
      success: function(data){
        loadTable();
      }
    });
  });

  
$(document).on('click', '#minus', function(e){
    e.preventDefault();
     var uid = $("#uid").val();
     pqtyid=$("#pqtyid").val();
    var id = $(this).data('id');
    var qty = $('#qty_'+id).val();
   if(qty>1){
      qty--;
    }
    $('#qty_'+id).val(qty);
    $.ajax({
      type: 'POST',
      url: 'product_cart_update.php',
      data: {
        id: id,
        qty: qty,
        uid:uid,
        pqtyid:pqtyid,
      },
      
      success: function(data){
        loadTable();
      }
    });
  });


  });
  </script>
  
  
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
        method: 'post',
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
  
  <div style="margin-top:230px;"></div>
<?php
include("include-footer.php");
?>
</body>

</html>