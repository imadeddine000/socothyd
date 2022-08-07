<?php
	session_start();
	unset($client_mat);
	session_destroy();
	session_unset();
	header("location:index.php");
?>