
<?php
	//session_start();
	require 'mysqli.php';

	// Add products into the cart table

	  $pid = $_POST['pid'];
	  $pid_rr = $_POST['pid_rr'];
	  $pname = $_POST['pname'];
	  $pprice = $_POST['pprice'];
	  $pimage = $_POST['pimage'];
	  $pcode = $_POST['pcode'];
	  $prd_cashback = $_POST['prd_cashback'];
	  $pqty = $_POST['pqty'];
	  $puser=$_POST['puser'];
	  $pqtyid=$_POST['pqtyid'];
	  $user=$_POST['uname'];
	  $total_price = $pprice * $pqty;

	$spl="SELECT product_code,username,qty FROM cart WHERE username ='".$user."' AND product_code !='".$pcode."'";
	//$rowds =$spl->fetch_array(MYSQLI_BOTH);

	  if($mysqli->query($spl)===TRUE){

	      mysqli_set_charset($mysqli,"utf8");
	     $query = "INSERT INTO cart (product_name,product_price,product_image,qty,total_price,product_code,username,pro_id,product_qtyid,cashback
           ) VALUES 
	    ('$pname','$pprice','$pimage','$pqty','$total_price','$pid_rr','$puser','$pid','$pqtyid','$prd_cashback')";
	    
	  
	   if($mysqli->query($query)===TRUE){

	    echo '<div class="alert alert-success alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item added to your cart!</strong>
						</div>'.$rowds['product_code']."AND =>".$pcode;
						}
						else{
                         echo"Error insert into Add product cart".$query."<br>".$mysqli->error;
						}
	  } else {
	    echo '<div class="alert alert-danger alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item already added to your cart!</strong>
						</div>';
	  }
	
?>