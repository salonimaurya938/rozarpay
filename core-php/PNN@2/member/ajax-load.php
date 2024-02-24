
               <?php
                require 'mysqli.php';
                mysqli_set_charset($mysqli,"utf8");
                $user=$_POST['uid'];
                $stmt =$mysqli->query("SELECT * FROM cart WHERE username='".$user."'");
             
                $grand_total = 0;
                while ($row = mysqli_fetch_assoc($stmt)){
              ?>  
              <div class="row  row1   "> 
<div class="col-xs-6 ww">
    
  <img class="imgg"src="<?php echo'../admin12/uploads/'.$row['product_image'] ?>" >
  <div class="cr"></div>
</div>
<div class="col-xs-6">
<div class="tt"><?php echo $row['product_name']; ?></div>
<div class="mm">मूल्य : <i class="fa fa-inr" style="font-size:18px;font-weight:bold; color:blue;"><b><?php 
                  
               $ddrr=$mysqli->query("SELECT pro_real_price FROM product WHERE product_id='".$row['pro_id']."'");
               $daa=$ddrr->fetch_array(MYSQLI_BOTH);
                  
                  echo $daa['pro_real_price']; ?></b></i></i></div>

<div class="mm"><input  type="hidden" id="pqtyid" value="<?= $daa['pro_real_price']; ?>">
  <input type="hidden" id="pid" value="<?= $row['id'] ?>">


   <input type="hidden" class="pprice" value="<?php echo$row['product_price'] ?>">

      
<div class="input-group col-sm-5">
                          
                          <span class='input-group-btn'>
                      <button type='button' id='minus' class='btn btn-default btn-flat minus' data-id="<?= $row['id'] ?>"><i class='fa fa-minus'></i></button>
                    </span>
                    <input type='text' disabled class='form-control' value="<?php echo $row['qty'] ?>" id='qty_<?= $row['id'] ?>'>
                    <span class='input-group-btn'>
                        <button type='button' id='add' class='btn btn-default btn-flat add' 
                        data-id='<?= $row['id'] ?>'><i class='fa fa-plus'></i>
                        </button>
                    </span>
          
                          <input type="hidden" value="<?php echo $row['qty'] ?>" name="id">
                      </div>

      <div class="mm"> कुल मूल्य : <i class="fa fa-inr"style="font-size:18px;font-weight:bold; color:blue;"><b><?php echo $row['total_price']; ?></b></i>
      
      </div>
      <div><b>कैशबैक : <i class="fa fa-inr" style="color:red;font-size:18px;font-weight:bold;">1</i></b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="product_action.php?remove=<?= $row['id'] ?>" class="text-danger lead"><i class="fa fa-trash fa-2x"></i></a></div>

</div>
    
</div>
</div><br>

<?php  $grand_total += $row['total_price'];
        
 } ?>
<?php  echo $grand_total; ?>
 
 <div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">










    <div class="col-md-7 col-md-offset-2">


 


<form novalidate="novalidate" id="login-form" class="log-reg-block sky-form" action="" method="post">
<h2>Log in to your account</h2>

<section>

<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input placeholder="User Name" name="username" class="form-control" type="text" required="">
</div>

</section>


<section>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-lock"></i></span>
<input placeholder="Password" name="password" class="form-control" type="password" required="">
</div>

</section>


<div class="row margin-bottom-5">
<div class="col-xs-6">
<label class="checkbox">
<input name="checkbox" type="checkbox">
<i></i>
Remember me
</label>
</div>
<div class="col-xs-6 text-right">
<a href="<?php echo "$baseurl/forgotpass.php"; ?>">Forgot Password?</a>
</div>
</div>
<button class="btn-u btn-u-sea-shop btn-block margin-bottom-20" type="submit" id="btn-login">Log in</button>


<div id="working"></div>
<div id="error">
<!-- error will be shown here ! -->
</div>


</div>

</form>


<div class="margin-bottom-20"></div>
<p class="text-center">Don't have account yet? Lets <a href="<?php echo "$baseurl/register.php"; ?>">Sign Up</a></p>





</div>
</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->

