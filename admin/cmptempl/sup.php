<?php
session_start();
include 'connexion.php';
$admin_mat = $_SESSION['admin'];
if(!isset($admin_mat)){
	header('location:\socothyd\index.php');
}
?>

<?php


$mat=$_GET['mat'];
    $delete=$conn->prepare("DELETE FROM users WHERE mat=" .$_GET['mat']);
    $delete->execute();

    include('index.php');

    ?>
 