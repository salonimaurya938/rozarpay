<?php
 require 'mysqli.php';
                mysqli_set_charset($mysqli,"utf8");
$user=$_POST['uid'];
$pid=$_POST['id'];
$qty=$_POST['qty'];
$pqtyi=$_POST['pqtyid'];

$total_price=$pqtyi*$qty;

         
                $sql ="UPDATE cart SET qty ='".$qty."',total_price='".$total_price."'  WHERE username='".$user."' AND id = '".$pid."'";

                if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  
}


?>