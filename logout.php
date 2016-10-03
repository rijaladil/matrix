<?php
	session_start();
	unset($_SESSION['email']);
	session_destroy();
	header("Location: http://117.102.99.178/matrix/index.php");
?>