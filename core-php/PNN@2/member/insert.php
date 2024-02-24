<?php
include('mysqli.php');
$sql="

INSERT INTO `admin` (`id`, `username`, `fullname`, `password`, `email`, `phone`, `pwr`, `hide`, `sid`) VALUES
(1, 'admin', 'Abir Khan', '21232f297a57a5a743894a0e4a801fc3', 'i@abir.biz', '01737042794', '100', '0', '0913c8fabf287513ffc3457ac9c7cd94'),
(2, 'abir', 'Abir Khan', '9ab209d66a9bf2250d7f56cc4b3b125d', 'abirkhan75@gmail.com', '8801737042794', '0', '0', 'eb8dab0a0fe9b4fcd0c9c1f44b5239ac'),
(3, 'AbirKhan', 'shahed', 'b59c67bf196a4758191e42f76670ceba', 'aaa123@gmail.com', '8801671545690', '', '0', '')
";

if ($mysqli->query($sql)===TRUE) {
	echo"successfully";
}
?>