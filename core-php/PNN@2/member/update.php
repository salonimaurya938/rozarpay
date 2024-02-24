<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
	<input type="file" name="uplaodfile" value=""/><br><br>
    <input type="submit" name="submit" value="Upload File"/>
</form>
</body>
</html>

<?php
$mysqli=new mysqli("localhost","root","","newmlm");

$filename=$_FILES["uplaodfile"]["name"];
$tempname=$_FILES["uplaodfile"]["tmp_name"];
$folder="student/$filename";
move_uploaded_file($tempname,$folder);

$res = $mysqli->query("INSERT INTO users SET trx_recipt='".$folder."'WHERE mid='".$uid."'");


?>
