<?php
session_start();
include 'connexion.php';
$magasinier_mat = $_SESSION['magasinier'];
if(!isset($magasinier_mat)){
	header('location:\socothyd\index.php');
}
?>

<?php
if (isset($_POST['submit'])){ 
    try{
        $cod_prod=$_POST['cod_prod'];
        $nom_prod=$_POST['nom_prod'];
        $type_prod=$_POST['type_prod'];
        $image = $_FILES['img_prod']['name'];
        $image_tmp_name = $_FILES['img_prod']['tmp_name'];
        $image_size = $_FILES['img_prod']['size'];
        $image_folder = 'uploaded_img/'.$image;
        $quantite=$_POST['quantite'];
        $prix=$_POST['prix'];
        $description=$_POST['description'];
      

   

$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql="UPDATE produits SET  nom_prod = '$nom_prod', type_prod = '$type_prod', img_prod = '$image',quantite ='$quantite',prix = '$prix',description = '$description' WHERE cod_prod = '$cod_prod' ";
$conn->exec($sql);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
  $conn=null;   
}

include('index.php')
?> 