<?php
require_once('../function.php');
require_once("anotifier.php");
//connectdb();
include('mysqli.php');
session_start();


//$pp = mysql_fetch_array(mysql_query("SELECT pp FROM general_setting WHERE id='1'"));
$lop=$mysqli->query("SELECT * FROM general_setting WHERE id='1'");
$pp=$lop->fetch_array(MYSQLI_BOTH);


//Getting records from Paypal IPN
if(isset($_POST[''])){
	$payment_type		=	$_POST['payment_type'];
	$payment_date		=	$_POST['payment_date'];
	$payment_status		=	$_POST['payment_status'];
	$address_status		=	$_POST['address_status'];
	$payer_status		=	$_POST['payer_status'];
	$first_name			=	$_POST['first_name'];
	$last_name			=	$_POST['last_name'];
	$payer_email		=	$_POST['payer_email'];
	$payer_id			=	$_POST['payer_id'];
	$address_country	=	$_POST['address_country'];
	$address_country_code	=	$_POST['address_country_code'];
	$address_zip		=	$_POST['address_zip'];
	$address_state		=	$_POST['address_state'];
	$address_city		=	$_POST['address_city'];
	$address_street		=	$_POST['address_street'];
	$business			=	$_POST['business'];
	$receiver_email		=	$_POST['receiver_email'];
	$receiver_id		=	$_POST['receiver_id'];
	$residence_country	=	$_POST['residence_country'];
	$item_name			=	$_POST['item_name'];
	$item_number		=	$_POST['item_number'];
	$quantity			=	$_POST['quantity'];
	$shipping			=	$_POST['shipping'];
	$tax				=	$_POST['tax'];
	$mc_currency		=	$_POST['mc_currency'];
	$mc_fee				=	$_POST['mc_fee'];
	$mc_gross			=	$_POST['mc_gross'];
	$mc_gross_1			=	$_POST['mc_gross_1'];
	$txn_id				=	$_POST['txn_id'];
	$notify_version		=	$_POST['notify_version'];
	$custom				=	$_POST['custom'];





if($payer_status=="verified" && $payment_status=="Completed" && $receiver_email=="$pp[0]" && $mc_currency=="USD" ){

$amo = $mc_gross-$mc_fee;
$paidid = $custom;


//$cbal = mysql_fetch_array(mysql_query("SELECT mallu FROM users WHERE mid='".$paidid."'"));
$stack=$mysqli->query("SELECT mallu FROM users WHERE mid='".$paidid."'");
$cbal=$stack->fetch_array(MYSQLI_BOTH);

$will = $cbal[0]+$amo;
$mysqli->query("UPDATE users SET mallu='".$will."' WHERE mid='".$paidid."'");





$a1 = date("ymdH", time());
$a2 = rand(1000,9999);
$txn_id = "$a1$a2";

$des = "Add Fund - PayPal Automated";
////------------------------------>>>>>>>>>TRX
$mysqli->query("INSERT INTO trx SET usid='".$paidid."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='".$amo."', nbal='".$will."'");
////------------------------------>>>>>>>>>TRX


////------------------------------>>>>>>>>>ADD_BAL
$mysqli->query("INSERT INTO add_bal SET usid='".$paidid."', trx='".$txn_id."', tm='".time()."', amount='".$amo."', method='PM_Automated', status='1'");
////------------------------------>>>>>>>>>ADD_BAL



///////////////////------------------------------------->>>>>>>>>Send Email AND SMS

//$userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, mobile, email FROM users WHERE mid='".$paidid."'"));

$joop=$mysqli->query("SELECT fname, lname, mobile, email FROM users WHERE mid='".$paidid."'");
$userContact=$joop->fetch_array(MYSQLI_BOTH);


$txt = "This is a soft notification that you just Add $amo USD to your Account via PayPal.";
abiremail($userContact[3], "You Just Add Fund", "$userContact[0] $userContact[1]", $txt);

///////////////////------------------------------------->>>>>>>>>Send Email AND SMS



}





//Payment Confirmation Email

$headers = "From: i@abir.biz \r\n";
$headers .= "Reply-To: i@abir.biz \r\n";

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$to = "pkdoc47@gmail.com";
$mail_subject = "Notification Paypal";






$msg = "

<b>Payment Summary</b>					<br />
Order No: $custom 						<br />
Payment Made by: $first_name $last_name <br />
Payer Email: $payer_email 				<br />
Payer Country: $address_country 		<br />
Payment Status: $payment_status			<br />
Amount: $mc_gross 						<br />
Fees: $mc_fee 							<br />
<br /><br />


<b>Payment information</b>	<br />
	Payment Type: $payment_type			<br />
	payment_date: $payment_date			<br />
	payment_status: $payment_status		<br />

<b>Buyer information</b>				<br />
	address_status: $address_status		<br />
	payer_status: $payer_status			<br />
	first_name: $first_name				<br />
	last_name: $last_name				<br />
	payer_email: $payer_email			<br />
	payer_id: $payer_id					<br />
	address_country: $address_country	<br />
	address_country_code: $address_country_code	<br />
	address_zip: $address_zip			<br />
	address_state: $address_state		<br />
	address_city: $address_city			<br />
	address_street: $address_street		<br />

<b>Basic information</b>				<br />
	Business: $business					<br />
	Receiver_email: $receiver_email		<br />
	Receiver_id: $receiver_id			<br />
	Residence_country: $residence_country	<br />
	Item_name: $item_name				<br />
	Item_number: $item_number			<br />
	Quantity: $quantity					<br />
	Shipping: $shipping					<br />
	Tax: $tax							<br />

<b>Currency and currrency exchange</b>	<br />
	mc_currency: $mc_currency			<br />
	Fees: mc_fee:   $mc_fee				<br />
	Amount: mc_gross: $mc_gross			<br />
	mc_gross_1: $mc_gross_1				<br />

<b>Transaction fields</b>				<br />
	Txn_type: $txn_type					<br />
	Txn_id: $txn_id						<br />
	Notify Version: $notify_version		<br />

<b>Advanced and custom information</b>	<br />
	Order No: $custom					<br />


					"; // end of mail_body



	







$message = '<html><body>';
$message .= ''."$msg";
$message .= '</body></html>';


//$sent=mail($to,$mail_subject, $message, $headers);

  include('smtp/PHPMailerAutoload.php');
  $mail=new PHPMailer(true);
  $mail->isSMTP();
  $mail->Host="smtp.gmail.com";
  $mail->Port=587;
  $mail->SMTPSecure="tls";
  $mail->SMTPAuth=true;
  $mail->Username="pkdoc47@gmail.com";
  $mail->Password="Ramnathnandan@7898%98#";
  $mail->SetFrom("pkdoc470@gmail.com");
  $mail->addAddress("$to");
  $mail->IsHTML(true);
  $mail->Subject="$subject";
  $mail->Body=$message;
  $mail->SMTPOptions=array('ssl'=>array(
    'verify_peer'=>false,
    'verify_peer_name'=>false,
    'allow_self_signed'=>false
  ));
  if($mail->send()){
    //echo "Mail send";
  }else{
    //echo "Error occur";
  }
}

?>


