<?php
require_once('../function.php');
require_once("anotifier.php");
include('mysqli.php');
session_start();

if (!is_user()) {
redirect("$baseurl/login.php");
//redirect("../index.php");

}
$user = $_SESSION['username'];
$sid = $_SESSION['sid'];
mysqli_set_charset($mysqli,"utf8");
//$userdetails = mysql_fetch_array(mysql_query("SELECT mid, sid, mallu FROM users WHERE username='".$user."'"));
$userd=$mysqli->query("SELECT mid, sid, mallu FROM users WHERE username='".$user."'");
$userdetails=$userd->fetch_array(MYSQLI_BOTH);

$uid = $userdetails[0];

if($sid!=$userdetails[1]){
redirect("$baseurl/signout.php");
}


$mallu = $userdetails[2];


if(you_valid($uid)){
redirect("$baseurl/verify.php");
}




//$general = mysql_fetch_array(mysql_query("SELECT sitetitle FROM general_setting WHERE id='1'"));
$gen=$mysqli->query("SELECT sitetitle FROM general_setting WHERE id='1'");
$general=$gen->fetch_array(MYSQLI_BOTH);
?>



<?php
	//session_start();
	//require 'mysqli.php';

	// Add products into the cart table
	if (isset($_POST['pid'])) {
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
	  $total_price = $pprice * $pqty;

	  $stmt = $conn->prepare('SELECT product_code FROM cart WHERE product_code=?');
	  $stmt->bind_param('s',$pcode);
	  $stmt->execute();
	  $res = $stmt->get_result();
	  $r = $res->fetch_assoc();
	  $code = $r['product_code'];

	  if (!$code) {
	      mysqli_set_charset($mysqli,"utf8");
	     $query = "INSERT INTO cart (product_name,product_price,product_image,qty,total_price,product_code,username,pro_id,product_qtyid,cashback) VALUES ('$pname','$pprice','$pimage','$pqty','$total_price','$pid_rr','$puser','$pid','$pqtyid','$prd_cashback')";
	    
	  
	   if($mysqli->query($query)===TRUE){

	    echo '<div class="alert alert-success alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item added to your cart!</strong>
						</div>';
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
	}

	// Get no.of items available in the cart table
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
	  $stmt = $conn->prepare("SELECT * FROM cart WHERE username='".$user."'");
	  $stmt->execute();
	  $stmt->store_result();
	  $rows = $stmt->num_rows;

	  echo $rows;
	}

	// Remove single items from cart
	if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];

	  $stmt = $conn->prepare('DELETE FROM cart WHERE id=?');
	  $stmt->bind_param('i',$id);
	  $stmt->execute();

	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Item removed from the cart!';
	  header('location:product_cart.php');
	}

	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
	  $stmt = $conn->prepare("DELETE FROM cart WHERE username='".$user."'");
	  $stmt->execute();
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'All Item removed from the cart!';
	  header('location:product_cart.php');
	}

	// Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];
	  $pid = $_POST['pid'];
	  $pprice = $_POST['pprice'];

	  $tprice = $qty * $pprice;

	  $stmt = $conn->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
	  $stmt->bind_param('isi',$qty,$tprice,$pid);
	  $stmt->execute();
	}

	// Checkout and save customer info in the orders table
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {



 
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

//transfer fund order table


  $will=$mysqli->query("SELECT tcrg,dlvcrg FROM general_setting WHERE id='1'");
$trxCharge=$will->fetch_array(MYSQLI_BOTH);


           $amt=number_format($grand_total);
           $totalamt=$grand_total+$trxCharge[1];

          


if($amt>0){


$transferto ='PavanT890';
$amount = $totalamt;
$trxp = $mysqli->real_escape_string($_POST['trxp']);
 $pmode = $mysqli->real_escape_string($_POST['pmode']);

      $name = $_POST['name'];
       $state = $_POST['state'];
        $city = $_POST['city'];
         $pincode = $_POST['pincode'];
         $pro_cbk=$_POST['pro_cbk'];
	  $username = $_POST['username'];
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];
	  $products = $_POST['products'];
	  $grand_total = $totalamt;
	  $address = $_POST['address'];
	  $date=time();
	  $product_trx='PRDTX'.rand(1111111111111,999999999999999);
	  $product_id=$_POST['product_id_rr'];

	  $data = '';
//$tpin = mysql_fetch_array(mysql_query("SELECT trxpin FROM users WHERE username='".$user."'"));
$do=$mysqli->query("SELECT trxpin FROM users WHERE username='".$user."'");
$tpin=$do->fetch_array(MYSQLI_BOTH);

$err1 = 0;
$err2 = 0;
$err3 = 0;
$err4 = 0;
$err5 = 0;
$err6 = 0;
$err7 = 0;
$err8 = 0;
$err9 = 0;



if($amount>$mallu){
	$err1 = 1;
}

if($amount<1){
	$err2 = 1;
}


//$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$transferto."'"));
$has=$mysqli->query("SELECT COUNT(*) FROM users WHERE username='".$transferto."'");
$count=$has->fetch_array(MYSQLI_BOTH);

if($count[0]!=1){
	$err3 = 1;
}


if($trxp!=$tpin[0]){
    $err4 = 1;
}

if(trim($pmode)==""){
$err5=1;

}


if(trim($address)==""){
$err7=1;
}
if(trim($pincode)==""){
$err8=1;
}


$error = $err1+$err2+$err3+$err4+$err5+$err6+$err7+$err8;
if($pmode=='POBPPro'){


  if ($error == 0){



//////////---------------------------------------->>>> CUT THE BALANCE 
$willupdate = $mallu-$amount;
$res = $mysqli->query("UPDATE users SET mallu='".$willupdate."' WHERE mid='".$uid."'");
//////////---------------------------------------->>>> CUT THE BALANCE

 $mysqli->query("UPDATE users SET paid_2='1' WHERE mid='".$uid."'");


if($res){
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
$amount NGR Transfered  Successfully! You Have $willupdate NGR .
</div>";

     

mysqli_set_charset($mysqli,"utf8");
	  

	  $stmt = "INSERT INTO orders (name,email,pone,address,pmode,products,amount_paid,username,time_date,state,city,pincode,prduct_trx,product_id_rr,cmordptm,qty,cbkstatus,cashback)VALUES('$name','$email','$phone','$address','$pmode','$products','$grand_total','$username','$date','$state','$city','$pincode','$product_trx','$product_id','','','0','$pro_cbk')";
	  if($conn->query($stmt)===TRUE){
	  $stmt2 = $conn->prepare("DELETE FROM cart WHERE username='".$user."'");
	  $stmt2->execute();
	   $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
								<h2 class="text-success">Your Order Placed Successfully!</h2>
								<h2 class="text-success">30 मिनट - 7 घंटा के अंदर आप का प्रोडक्ट पहुंचा दिया जायेगा। !</h2>
							<h4 class="bg-info text-light rounded p-2">Items Purchased : ' . $products . '</h4>
								</div>
								<div class="text-left">
								<h4>Your Name : ' . $name . '</h4>
								<h4>Your E-mail : ' . $email . '</h4>
								<h4>Your Phone : ' . $phone . '</h4>
	                            <h4>Your Address : ' . $address .'&nbsp;'. $pincode .'&nbsp;'. $city .'&nbsp;'. $state. '</h4>
								<h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
								<h4>Payment Mode : ' . $pmode . '</h4>
						  </div>';
	  echo $data;

	  }
	  else{
	  	echo $conn->error;
	  }
	  //$stmt->bind_param('ssssssss',$name,$email,$phone,$address,$pmode,$products,$grand_total,$username);
      
	  //$stmt->execute();
	  


//$sendto = mysql_fetch_array(mysql_query("SELECT mid, username, email FROM users WHERE username='".$transferto."'"));
$shell=$mysqli->query("SELECT mid, username, email FROM users WHERE username='".$transferto."'");
$sendto=$shell->fetch_array(MYSQLI_BOTH);


$a1 = date("ymdH", time());
$a2 = rand(1000,9999);
$txn_id = "$a1$a2";

$des = "Pay PainaPro $amount INR TO $sendto[1] ";
////------------------------------>>>>>>>>>TRX
$mysqli->query("INSERT INTO trx SET usid='".$uid."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='-".$amount."', nbal='".$willupdate."'");
////------------------------------>>>>>>>>>TRX


///////// PERCENT
$amountToSend = $amount;
///////// PERCENT





//////////---------------------------------------->>>> ADD THE BALANCE 
//$cbal = mysql_fetch_array(mysql_query("SELECT mallu FROM users WHERE mid='".$sendto[0]."'"));
$are=$mysqli->query("SELECT mallu FROM users WHERE mid='".$sendto[0]."'");
$cbal=$are->fetch_array(MYSQLI_BOTH);
$newbal = $cbal[0]+$amountToSend;
$resadd = $mysqli->query("UPDATE users SET mallu='".$newbal."' WHERE mid='".$sendto[0]."'");


//////////---------------------------------------->>>> ADD THE BALANCE


$des = "Transfer $amountToSend INR FROM $user ";
////------------------------------>>>>>>>>>TRX
$mysqli->query("INSERT INTO trx SET usid='".$sendto[0]."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='".$amountToSend."', nbal='".$newbal."'");
////------------------------------>>>>>>>>>TRX




}


else{
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Some Problem Occurs, Please Try Again. 
</div>";
}


/*//////////////////------------------------------------->>>>>>>>>Send Email AND SMS

//$userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, mobile, email FROM users WHERE mid='".$uid."'"));
$have=$mysqli->query("SELECT fname, lname, mobile, email FROM users WHERE mid='".$uid."'");
$userContact=$have->fetch_array(MYSQLI_BOTH);
$txt = "This is a soft notification that you just Sent $amount INR to $transferto.";
abiremail($userContact[3], "You Just Sent Money", "$userContact[0] .$userContact[1]", $txt);
///////////////////------------------------------------->>>>>>>>>Send Email AND SMS



///////////////////------------------------------------->>>>>>>>>Send Email AND SMS
//$userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, mobile, email FROM users WHERE mid='".$sendto[0]."'"));
  $am=$mysqli->query("SELECT fname, lname, mobile, email FROM users WHERE mid='".$sendto[0]."'");
$userContact=$am->fetch_array(MYSQLI_BOTH);
$txt = "This is a soft notification that you just Got $amountToSend INR From $user.";
abiremail($userContact[3], "You Got Money", "$userContact[0] .$userContact[1]", $txt);
///////////////////------------------------------------->>>>>>>>>Send Email AND SMS

*/

}


 else {
	
if ($err1 == 1){
	
echo"<script>alert('Your Acount Balance is Low Please Add Balance !!!');window.location.href = 'addfund.php';</script>";

}		
	
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Minimum Limit of Transfer is 1 NGR !!
</div>";
}		
	
if ($err3 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Username You want to Transfer is not Found in Our Database!!
</div>";
}		

if ($err4 == 1){

echo"<script>alert('WRONG Transection PIN !!!');window.location.href = 'product_checkout.php';</script>";


} 
if ($err5 == 1){

echo"<script>alert('Please Select Payment method !!!');window.location.href = 'product_checkout.php';</script>";


} 

if ($err5 == 1){

echo"<script>alert('Please Update Profile !!!');window.location.href = 'updateprofile.php';</script>";


} 
if($err7==1){

echo"<script>alert('Please Update Your Profile !!!');window.location.href = 'updateprofile.php';</script>";

	}
	if($err8==1){

echo"<script>alert('Please Update Your Profile !!!');window.location.href = 'updateprofile.php';</script>";

	}

   
	
}

}

else{
        $errrr=$err5+$err7+$err8;

	
	if($errrr==0){

	$cmpord='';
	mysqli_set_charset($mysqli,"utf8");
	 $stmt = "INSERT INTO orders (name,email,pone,address,pmode,products,amount_paid,username,time_date,state,city,pincode,prduct_trx,product_id_rr,cmordptm,qty,cbkstatus,cashback)VALUES('$name','$email','$phone','$address','$pmode','$products','$grand_total','$username','$date','$state','$city','$pincode','$product_trx','$product_id','','','0','$pro_cbk')";
	  if($conn->query($stmt)===TRUE){
	   $cashinc="INSERT product_cashback SELECT id,product_name,product_price,product_image,qty,total_price,pro_id,product_code,product_qtyid,username,'0','$date','','' FROM cart WHERE username='".$user."'";
	    if ($mysqli->query($cashinc) === true) 
{ 
    echo ""; 
} 
else
{ 
    echo "ERROR: Could not Table to proceed $cashinc. "
        .$mysqli->error; 
}
	  $stmt2 = $conn->prepare("DELETE FROM cart WHERE username='".$user."'");
	  $stmt2->execute();
	  $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
								<h2 class="text-success">Your Order Placed Successfully!</h2>
								<h2 class="text-success">30 मिनट - 7 घंटा के अंदर आप का प्रोडक्ट पहुंचा दिया जायेगा।</h2>
						<h4 class="bg-info text-light rounded p-2">Items Purchased : ' . $products . '</h4>
							</div>
								<div class="text-left">
								<h4>Your Name : ' . $name . '</h4>
								<h4>Your E-mail : ' . $email . '</h4>
								<h4>Your Phone : ' . $phone . '</h4>
	<h4>Your Address : ' . $address .'&nbsp;'. $pincode .'&nbsp'. $city .'&nbsp;'. $state. '</h4>
								<h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
								<h4>Payment Mode : ' . $pmode . '</h4>
						  </div>';
	  echo $data;


	  }

	  else{
	  	echo"Cash Order".$stmt. $conn->error;
	  }
}else{
	if($err5==1){

echo"<script>alert('Please Select Payment method !!!');window.location.href = 'product_checkout.php';</script>";

	}
	if($err7==1){

echo"<script>alert('Please Update Your Profile !!!');window.location.href = 'updateprofile.php';</script>";

	}
	if($err8==1){

echo"<script>alert('Please Update Your Profile !!!');window.location.href = 'updateprofile.php';</script>";

	}
}
}

}
else{
	echo"<script>alert('You Have Not Added Product');window.location.href = 'home.php';</script>";
}

	}
?>