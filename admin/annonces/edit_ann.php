<?php
session_start();
include 'connexion.php';
$admin_mat = $_SESSION['admin'];
if(!isset($admin_mat)){
	header('location:\socothyd\index.php');
}
?>

<?php
if (isset($_POST['submit'])){ 
    try{
        $id=$_POST['id'];
        $nom_prod=$_POST['nom_prod'];
        $desc_prod=$_POST['desc_prod'];  
        
        $image = $_FILES['img_prod']['name'];
        $image_tmp_name = $_FILES['img_prod']['tmp_name'];
        $image_size = $_FILES['img_prod']['size'];
        $image_folder = 'uploaded_img/'.$image;
    
        

   

$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql="UPDATE annonce SET  nom_prod = '$nom_prod', desc_prod = '$desc_prod', img_prod = '$image' WHERE id = '$id' ";
$conn->exec($sql);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
  $conn=null;   
}

include('index.php')
?> 