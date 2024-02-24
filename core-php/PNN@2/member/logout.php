<?php
session_start();
$_SESSION['login.php']=="";

session_unset();
$_SESSION['action1']="You have logged out successfully..!";
session_destroy();
?>
<script language="javascript">
document.location="http://localhost/PainaPro/member/index.php";
</script>
