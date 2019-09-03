<?php
$conn=new mysqli('localhost','root','','vgame');
if (!$conn) {
	echo $conn->error;
}

?>