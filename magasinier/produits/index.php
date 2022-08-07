<?php
if(!isset($_SESSION)) { 
    session_start(); 
  } 
include 'connexion.php';
$magasinier_mat = $_SESSION['magasinier'];
if(!isset($magasinier_mat)){
	header('location:\socothyd\index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Socothyd.isser.dz</title>
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
                   
                </li>

                <li>
                    <a href="\socothyd\magasinier\produits\index.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Gérer les produits</span>
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
                    <a href="deconnexion.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Déconnexion</span>
                    </a>
                </li>
            </ul>
        </div>

         <!-- ========================= Main ==================== -->
         <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                 

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
            <div >
                <a href="frm_ajtprod.php">                       
                      <button class="butn">
                    <ion-icon name="add-outline"></ion-icon>
                        Ajouter un produit</button>  
                    </a>                
                </div><br><br>
                <?php
	$sql = $conn->prepare(" SELECT * FROM produits");
	$sql->execute();
	while($row=$sql->fetch()){
		?>
        <div class="w3-third w3-container w3-margin-bottom">

<img src="uploaded_img/<?= $row['img_prod']; ?>"  style="width:100%" >
<div class="w3-container w3-white">
  <h1><?php print $row['nom_prod'] . "\t";?></h1>
  <p class="price"><?php print $row['prix'] . "\t";?>DA</p>
  <b  class="quant">Quantité :</b><p class="qnt"><?php print $row['quantite'] . "\t";?> </p>
  <p ><?php print $row['description'] . "\t";?> </p>

  <p>
                            <a href="sup.php?cod_prod=<?php echo $row['cod_prod'];?>"class="btn-del">
							<ion-icon id="trc" name="trash" color="danger"></ion-icon> </a>

                            <a href="cnslt.php?cod_prod=<?php echo $row['cod_prod'];?>">                      
                            <ion-icon id="trc" name="eye-outline" color="success"></ion-icon></a>
	
							<a href="frmod.php?cod_prod=<?php echo $row['cod_prod'];?>">                      
		                    <ion-icon id="trc" name="create-outline" color="primary"></ion-icon></a>
                            </p>                    
      </div>
    </div>


    <?php
	}
	?>
<script src="jquery-3.6.0.min.js"></script>
<script src="sweetalert2.all.min.js"></script>
    <script>
        $('.btn-del').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href')

            Swal.fire({
                title : 'Voulez vous vraiment supprimer ',
                text : 'Ce produit sera supprimée ',
                type : 'warning',
                showCancelButton: true,
                confirmButtonColor: '#FF2121',
                cancelButtonColor: 'blue',
                confirmButtonText:'Supprimer',
                
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                    
                }
            })
        })
                
    </script>






            



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
    color:gray;
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