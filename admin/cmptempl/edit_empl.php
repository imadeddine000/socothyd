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
        $mat=$_POST['mat'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $adresse=$_POST['adresse'];
        $num_tel=$_POST['num_tel'];
        $pass = md5($_POST['pass']);
        $role=$_POST['role'];

   

$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql="UPDATE users SET  nom = '$nom', prenom = '$prenom', adresse = '$adresse', num_tel = '$num_tel', password = '$pass', role = '$role' WHERE mat = '$mat' ";
$conn->exec($sql);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
  $conn=null;   
}

include('index.php')
?> 