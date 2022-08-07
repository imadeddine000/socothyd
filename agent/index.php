<?php
session_start();
include 'connexion.php';
$agent_mat = $_SESSION['agent'];
if(!isset($agent_mat)){
	header('location:login.php');
}

?>
<h1>hello agent</h1>