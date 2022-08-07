<?php
include 'connexion.php';
session_start();
$client_mat = $_SESSION['client_mat'];
if(!isset($client_mat)){
	header('location:\socothyd\index.php');
}
?>

<?php


$mat=$_GET['id'];
    $delete=$conn->prepare("DELETE FROM panier WHERE id=" .$_GET['id']);
    $delete->execute();

    include('index.php');

    ?>
 