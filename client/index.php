<?php
include 'connexion.php';
session_start();
$client_mat = $_SESSION['client_mat'];
if(!isset($client_mat)){
	header('location:\socothyd\index.php');
}
?>
  <?php
      $select_profile = $conn->prepare("SELECT * FROM `users` WHERE mat = ?");
      $select_profile->execute([$client_mat]);
      $row = $select_profile->fetch(PDO::FETCH_ASSOC);
   ?>
<?php
if(isset($_POST['ajout_au_panier'])){

$cod_prod = $_POST['cod_prod'];
$nom_prod = $_POST['nom_prod'];
$type_prod = $_POST['type_prod'];
$quantite = $_POST['quantite'];
$prix = $_POST['prix'];
$description = $_POST['description'];
$image = $_POST['img_prod'];



$select = $conn->prepare("SELECT * FROM `panier` WHERE nom_prod = ?");
$select->execute([$nom_prod]);

if($select->rowCount() > 0){
   $message[] = 'produit ajouter déja!';
}else{
       $insert = $conn->prepare("INSERT INTO `panier`( client_mat, cod_prod, nom_prod, type_prod, quantite, prix, description, img_prod) VALUES(?,?,?,?,?,?,?,?)");
       $insert->execute([$client_mat, $cod_prod, $nom_prod, $type_prod, $quantite, $prix, $description, $image ]);
      if($insert){
         $message[] = 'registered succesfully!'; 
         header('location:index.php');
      }
   }
}



?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Socothyd.isser.dz</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="w3.css">
  
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="asset/imgs/so.png" alt="">
                        </span>
                        <span class="title"></span>
                        
                    </a>
                </li>
                <li>
                    <a href="\socothyd\client\index.php">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Produits</span>
                    </a>
                </li>
				<li>
                    <a href="\socothyd\client\panier\index.php">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Panier</span>
                    </a>
                </li>
				<li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Mes commandes</span>
                    </a>
                </li>
               
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="key-outline"></ion-icon>
                        </span>
                        <span class="title">Modifier le compte</span>
                    </a>
                </li>

                <li>
                    <a href="panier/vider_panier.php?client_mat=<?php echo $client_mat; ?>">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Déconnexion</span>
                    </a>
                </li>
            </ul>
        </div>

		<div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                    
                    </div>
                <?php echo (date("H")<12)?("Bonjour"):("Bonsoir").' '. $_SESSION['nom'];
 ?></h2>
               

                <div class="search">
                    <form action="searche.php" method="GET">
                    <label>
                        <input type="text" name="search" placeholder="Rechercher sur un produit">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                    </form>
                </div>

                
            </div>

            <!-- =================================================================================== -->
            
			<?php

$sql = $conn->prepare(" SELECT * FROM produits ");
$sql->execute();
while($row=$sql->fetch()){
	?>
	<div class="w3-third w3-container w3-margin-bottom">

<form method="post" class="" action="">

<img src="uploaded_img/<?= $row['img_prod']; ?>"  style="width:100%" >
<div class="w3-container w3-white">
<h1><?php print $row['nom_prod'] . "\t";?></h1>
<p class="price"><?php print $row['prix'] . "\t";?>DA</p>
<p ><?php print $row['type_prod'] . "\t";?> </p><br>
<p ><?php print $row['description'] . "\t";?> </p><br>
<input type="number"  name="quantite" value="1"></p><br>
<input type="hidden" name="cod_prod" value="<?php echo $row['cod_prod']; ?>">
<input type="hidden" name="img_prod" value="<?php echo $row['img_prod']; ?>">
<input type="hidden" name="nom_prod" value="<?php echo $row['nom_prod']; ?>">
<input type="hidden" name="type_prod" value="<?php echo $row['type_prod']; ?>">
<input type="hidden" name="prix" value="<?php echo $row['prix']; ?>">
<input type="hidden" name="description" value="<?php echo $row['description']; ?>">

<input type="submit" value="ajout au panier" name="ajout_au_panier" class="btn">
</div>
</div>
</form>
<?php
}
?>









            



            <!-- =================================================================================== -->

    <!-- =========== Scripts =========  -->
    <script src="asset/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>


<style type="text/css">

.butn{
   height: 28px;
   width: 50%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(135deg, #71b7e6, #215AFF);
 }
 #trc {
                font-size:23px;
				padding:10px;
				float: right;
				
			}
.price  {
    color:green;
    text-align:center;
    font-size:35px;

} 
.quant{
    color:green;
    font-size:20px;
} 
.qnt{
    font-size:17px;
}    
h1{
    text-align:center;
} 
.btn{

   
}

 