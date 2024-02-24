
<!DOCTYPE html>
<html lang="en">

        <head>
            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
        </head>
<?php
$mysqli=new mysqli("localhost","olgevfum_pavan23erwb","!^!B&Z.e&u#L","olgevfum_newmlm");
mysqli_set_charset($mysqli,"utf8");
echo"Pavan Nandan Nishad";
echo"Pavan Nandan Nishad";
echo"Pavan Nandan Nishad";
echo"Pavan Nandan Nishad";
$quer=$mysqli->query("SELECT * FROM users");
$sql=$mysqli->query("SELECT * FROM product where product_id='2'");

$res=$sql->fetch_array(MYSQLI_BOTH);

echo $res[0].'<br>';
echo $res[2].'<br>';

?>
</body>
</html>