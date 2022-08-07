<?php
include 'connexion.php';
session_start();
$client_mat = $_SESSION['client_mat'];
if(!isset($client_mat)){
	header('location:\socothyd\index.php');
}
?>
?>
<?php
if (isset($_POST['update_cart'])){ 
    try{
        $id=$_POST['id'];
        $quantite=$_POST['quantite'];
       
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql="UPDATE panier SET  quantite = '$quantite' WHERE id = '$id' ";
$conn->exec($sql);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
  $conn=null;   
}

include('index.php')
?> 
<?php
if(isset($_POST['commande'])){

$nom_prod = $_POST['nom_prod'];
$type_prod = $_POST['type_prod'];
$quantite = $_POST['quantite'];
$prix = $_POST['prix'];
$description = $_POST['description'];

$insert = $conn->prepare("INSERT INTO `commande`( client_mat, nom_prod, type_prod, quantite, prix, description, date) VALUES(?,?,?,?,?,?,now()");
$insert->execute([$client_mat, $nom_prod, $type_prod, $quantite, $prix, $description]);
if($insert){
  header('location:index.php');
}
}
?>