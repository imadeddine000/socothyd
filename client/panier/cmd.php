<?php
include 'connexion.php';
session_start();
$client_mat = $_SESSION['client_mat'];
if(!isset($client_mat)){
	header('location:\socothyd\index.php');
}
?>
<?php

$nom_prod = $_POST['nom_prod'];
$type_prod = $_POST['type_prod'];
$description = $_POST['description'];
$quantite = $_POST['quantite'];
$prix = $_POST['prix'];

$insert = $conn->prepare("INSERT INTO `commande`(client_mat, nom_prod, type_prod, description, quantite, prix, date  ) VALUES(?,?,?,?,?,?,now())");
       $insert->execute([$client_mat, $nom_prod, $type_prod, $description, $quantite, $prix ]);
      if($insert){
         header('location:index.php');
      }
   


?>