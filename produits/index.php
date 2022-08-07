


<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Socothyd.isser.dz</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="w3.css">
    
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                  
                </div>
                <a href="">panier</a>

                <div class="search">
                    <form action="searche.php" method="GET">
                    <label>
                        <input type="text" name="search" placeholder="Rechercher sur un produit">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                    </form>
                </div>

                
            </div>
</head>

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
  <p ><?php print $row['description'] . "\t";?> </p>
  
    </div>

    </div>
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
.a{
  float:center;
}
 