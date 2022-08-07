<?php
include 'connexion.php';
session_start();
$client_mat = $_SESSION['client_mat'];
if(!isset($client_mat)){
	header('location:\socothyd\index.php');
}
?>

<?php


$client_mat=$_GET['client_mat'];
    $delete=$conn->prepare("DELETE FROM panier WHERE client_mat=" .$_GET['client_mat']);
    $delete->execute();
if ($delete) {
	session_destroy();
	session_unset();
	header("location:\socothyd\index.php");
}
   

    ?>
 