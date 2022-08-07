<?php
session_start();
include 'connexion.php';
$magasinier_mat = $_SESSION['magasinier'];
if(!isset($magasinier_mat)){
	header('location:\socothyd\index.php');
}
?>

<?php


$cod_prod=$_GET['cod_prod'];
    $delete=$conn->prepare("DELETE FROM produits WHERE cod_prod=" .$_GET['cod_prod']);
    $delete->execute();

    include('index.php');

    ?>
 