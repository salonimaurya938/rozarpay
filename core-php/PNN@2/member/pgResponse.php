
<?php
$pagetitle='Add BALANCE';
require_once('include-header.php');

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$mysqli=new mysqli("localhost","olgevfum_pavan23erwb","!^!B&Z.e&u#L","olgevfum_newmlm");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;

$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		                  

       						    $cur=$_POST['CURRENCY']; 
								$gtway=$_POST['GATEWAYNAME']; 
								$resp=$_POST['RESPMSG'];
								$bnkname=$_POST['BANKNAME']; 
								$ptmethod=$_POST['PAYMENTMODE']; 
								$mid=$_POST['MID']; 
								$rescode=$_POST['RESPCODE'];
								$txid=$_POST['TXNID']; 
								$txam=$_POST['TXNAMOUNT']; 
								$ord=$_POST['ORDERID']; 
								$status=$_POST['STATUS']; 
								$bnktxid=$_POST['BANKTXNID']; 
								$txdate=$_POST['TXNDATE']; 
								$chkhash=$_POST['CHECKSUMHASH'];
								$pay_id='TREXPY'.rand(1111111,9999999);

  $data1=$mysqli->query("SELECT username,mallu,email,mobile,fname,lname FROM users WHERE username='".$user."'");
  $data=$data1->fetch_array(MYSQLI_BOTH);	
  $usrname=$data[0];
  $bal=$data[1];
  $uemail=$data[2];
  $umob=$data[3];	
  $uname=$data[4] .$data[5];	

$dat=$mysqli->query("SELECT username,trx_id FROM paytm_payment WHERE username='".$user."'");
  $data=$dat->fetch_array(MYSQLI_BOTH);

if($txid!=$data[1]){

$amount=$txam;
$transferto=$user;
   
//////////---------------------------------------->>>> ADD THE BALANCE 

$newbal = $bal+$amount;
$resadd = "UPDATE users SET mallu='".$newbal."' WHERE username='".$user."'";
//////////---------------------------------------->>>> ADD THE BALANCE

$sendto1 =$mysqli->query("SELECT mid, username, email FROM users WHERE username='".$transferto."'");
$sendto=$sendto1->fetch_array(MYSQLI_BOTH);




$a1 = date("ymdH", time());
$a2 = 'ADPROTRX'.rand(1000,9999);
$txn_id = "$a2$a1";
$des = "Transfer $amount NGR FROM Add Balance By PainaPro ";
////------------------------------>>>>>>>>>TRX
$mysqli->query("INSERT INTO trx SET usid='".$sendto[0]."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='".$amount."', nbal='".$newbal."'");
//$mysqli->query("INSERT INTO trx (usid,trx,tm)VALUES('$sendto[0]','$txn_id','time()',)")
////------------------------------>>>>>>>>>TRX

$res="INSERT INTO paytm_payment(cuurency,gateway_name,respmsg	,bank_name,	payment_mode,mid,resp_code,trx_id,txna_amount,order_id,	status,bank_txn_id,trxn_date,checksumhash,pay_id,username,mob,email,name) VALUES('$cur','$gtway','$resp','$bnkname','$ptmethod','$mid','$rescode','$txid','$txam','$ord','$status','$bnktxid','$txdate','$chkhash','$pay_id','$usrname','$umob','$uemail','$uname')";

/*//////////////////------------------------------------->>>>>>>>>Send Email AND SMS
$userContact1 = $mysql->query("SELECT fname, lname, mobile, email FROM users WHERE mid='".$sendto[0]."'");
$userContact=$userContact1->fetch_array(MYSQLI_BOTH);
$txt = "This is a soft notification that you just Got $amount INR From Add Balance By PainaPro .";
abiremail($userContact[3], "You Got Money", "$userContact[0] $userContact[1]", $txt);
///////////////////------------------------------------->>>>>>>>>Send Email AND SMS
*/

		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	
if($mysqli->query($res)===TRUE){
	//echo"<script>alert('BALANCE Added SUCCESS');window.location.href='home.php';</script>";

}
else{
	echo"Error Add BALANCE"."<br>".$res."<br>".$mysqli->error;
}
   
if($mysqli->query($resadd)===TRUE){
	//echo"<script>alert('BALANCE Added SUCCESS');window.location.href='home.php';</script>";
     echo"Add ss";
}
else{
	echo"Error Add BALANCE"."<br>".$resadd."<br>".$mysqli->error;
}

	}

	else{
      //echo"<script>alert('Do Not Refresh');window.location.href='home.php';</script>";
 

	}


}

	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>
