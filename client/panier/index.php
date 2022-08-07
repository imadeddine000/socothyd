<?php
include 'connexion.php';
session_start();
$client_mat = $_SESSION['client_mat'];
if(!isset($client_mat)){
	header('location:\socothyd\index.php');
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
                        <span class="title">Produits </span>
                    </a>
                </li>
				<li>
                    <a href="index.php">
                        <span class="icon">
                            <ion-icon name="IOS-outline"></ion-icon>
                        </span>
                        <span class="title">Panier</span>
                    </a>
                </li>
				<li>
                    <a href="">
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
                    <a href="vider_panier.php?client_mat=<?php echo $client_mat; ?>">
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
                <div class="butn">
                <a href="\socothyd\client\index.php">                          
                <ion-icon name="home-outline" color="primary"></ion-icon>
                </a>                
                </div>
                
            </div>
<table>
      <thead>
         <th>Image de produit</th>
         <th>Nom de produit</th>
         <th>Prix unitaire de produit</th>
         <th>Nombre de produit au panier</th>
         <th>Prix total</th>
         <th>Action</th>
      </thead>
      <tbody>
      <?php
         $sql = $conn->prepare( "SELECT * FROM `panier` WHERE client_mat = '$client_mat'") or die('query failed');
         $sql->execute();
         $grand_total = 0;
         if($sql->rowCount() > 0){ 
            while($row=$sql->fetch()){ ?>
      
         <tr>
            <td><img src="admin/<?php echo $row['img_prod']; ?>" alt=""></td>
            <td><?php echo $row['nom_prod']; ?></td>
            <td><?php echo $row['prix']; ?>Da </td>


            <td>
               <form action="edit_panier.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                  <input type="number" min="1" name="quantite" value="<?php echo $row['quantite']; ?>">
                  <input type="submit" name="update_cart" value="Modifier" class="option-btn">
               </form>
            </td>
            
            
            <td ><?php echo $sub_total = ($row['prix'] * $row['quantite']); ?>Da</td>
            <td ><a href="sup.php?id=<?php echo $row['id'];?>" class="btn-del"> <ion-icon name="trash" color="danger"></ion-icon></td >
         </tr>

         <?php
         $grand_total += $sub_total;
            }
      ?>

      <tr class="table-bottom">
         <td class="total" colspan="4">PRIX TOTAL  :</td>
         <td class="total"><?php echo $grand_total; ?>Da</td>
         <td><a href="vid_panier.php?client_mat=<?php echo $client_mat; ?>"  id="vider">
            <button  class="vider"> Vider le panier</button>
            </a>
        </td>
      </tr>

      
   </tbody>
   </table>
   
   <?php } else { ?>
                       
 
<tr><td class="auc" style="padding:20px; text-transform:capitalize;" colspan="6">Aucun produit dans le panier </td></tr>
         
                    <?php } ?>
                    
<?php
         $sql = $conn->prepare( "SELECT * FROM `panier` WHERE client_mat = '$client_mat'") or die('query failed');
         $sql->execute();
         $grand_total = 0;
            while($row=$sql->fetch()){ ?>

            <form action="cmd.php" method="POST"> 
                   <input type="hidden" name="nom_prod" value="<?php echo $row['nom_prod']; ?>">
                   <input type="hidden" name="type_prod" value="<?php echo $row['type_prod']; ?>">
                   <input type="hidden" name="description" value="<?php echo $row['description']; ?>">
                   <input type="hidden" name="quantite" value="<?php echo $row['quantite']; ?>">
                   <input type="hidden" name="prix" value="<?php echo $row['prix']; ?>">
             <tr>
             <?php } ?>
                <td colspan="6">
                   <input type="submit" name="commande" value="Commander" class="commander" >
                </td>
            </tr>
</form>










       <!-- =========== Scripts =========  --> 
       
       
<script src="jquery-3.6.0.min.js"></script>
<script src="sweetalert2.all.min.js"></script>

    <script>
        $('.btn-del').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href')

            Swal.fire({
                title : 'Voulez vous vraiment supprimer ',
                text : 'Ce produit sera supprimé du panier',
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
    <script>
        $('#cmnd').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href')

            Swal.fire({
                title : 'Voulez vous vraiment commander ? ',
                text : '',
                type : 'warning',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: '#FF2121',
                confirmButtonText:'Commander',
                
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                    
                }
            })
        })
                
    </script>

<script>
        $('#vider').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href')

            Swal.fire({
                title : 'Voulez vous vraiment vider le panier ? ',
                text : 'le panier sera complètement vide',
                type : 'warning',
                showCancelButton: true,
                confirmButtonColor: '#FF2121',
                cancelButtonColor: 'blue',
                confirmButtonText:'Vider',
                
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                    
                }
            })
        })
                
    </script>
    <script src="asset/js/main.js"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
   <style type="text/css">

/* 
Generic Styling, for Desktops/Laptops 
*/
table { 
  width: 100%; 
  border-collapse: collapse; 
}
/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}
th { 
  background: blue; 
  color: white; 
  font-weight: bold; 
}
td, th { 
  padding: 12px; 
  border: 1px solid #ccc; 
  text-align: left; 
}
.butn ion-icon {
    font-size:30px;
    padding:6px;
    text-align: left;
}
.total{
   background-color:;
   color:blue;
}
.auc{
   background-color:red;
   color:white;
}
td a  ion-icon {
    font-size:23px;
    text-align: center;
}
.commander{
   height: 33px;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(-135deg, #71b7e6, #215AFF);
 }
 .commander:hover{

  background: linear-gradient(135deg, lime, green);
  }

  .vider{
   height: 25px;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 12px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(-135deg, #FF2121, #FF2121);
 }
