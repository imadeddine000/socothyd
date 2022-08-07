<?php
session_start();
include 'connexion.php';
$admin_mat = $_SESSION['admin'];
if(!isset($admin_mat)){
	header('location:\socothyd\index.php');
}
?>

<?php


$mat=$_GET['id'];
    $delete=$conn->prepare("DELETE FROM annonce WHERE id=" .$_GET['id']);
    $delete->execute();

    include('index.php');

    ?>
 