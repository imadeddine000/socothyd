<?php
if(!isset($_SESSION)) { 
    session_start(); 
  } 

include 'connexion.php';
$admin_mat = $_SESSION['admin'];
if(!isset($admin_mat)){
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

    <head>
    <meta charset="utf-8" />
  
</head>

<body>
    
   
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="index.php">
                        <span class="icon">
                            <img src="asset/imgs/so.png" alt="">
                        </span>
                        <span class="title"></span>
                        
                    </a>
                </li>

                <li>
                   
                </li>

                <li>
                    <a href="\socothyd\admin\cmptempl\index.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Gérer les comptes employés</span>
                    </a>
                </li>

                <li>
                    <a href="\socothyd\admin\annonces\index.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Publier les annonces</span>
                    </a>
                </li>

                <li>
                    <a href="\socothyd\admin\client\index.php">
                        <span class="icon">
                            <ion-icon name="albums-outline"></ion-icon>
                        </span>
                        <span class="title">Consulter les comptes clients</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Consulter les commandes</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="copy-outline"></ion-icon>
                        </span>
                        <span class="title">Consulter les factures</span>
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
                Mr bensalem

                <div class="search">
                    <form action="searche.php" method="GET">
                    <label>
                        <input type="text" name="search" placeholder="Rechercher compte employé">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                    </form>
                </div>

                
            </div>

            <!-- =================================================================================== -->
            <div >
                <a href="frm_ajt.php">                       
                      <button class="butn">
                    <ion-icon name="add-outline"></ion-icon>
                        Ajouter un compte employé</button>  
                    </a>                
                </div><br>
            <table>
	<thead>
	<tr>
		<th>Matricule</th>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Num_téléphone</th>
        <th>Rôle</th>
        <th>Opération</th>
		
	</tr>
	</thead>
    
	<?php
$sql = $conn->prepare(" SELECT * FROM users WHERE role IN ('Agent commercial','magasinier') ");
$sql->execute();
while($row=$sql->fetch()){
    ?>
<tr>
     <td><?php print $row['mat'] . "\t";?></td> 
     <td><?php  print  $row['nom'] . "\t";?></td> 
     <td><?php  print $row['prenom'] . "\n";?></td> 
     <td><?php  print  $row['num_tel'] . "\t";?></td> 
     <td><?php print $row['role'] . "\n";?></td>
     
     <td>               
                        <a href="sup.php?mat=<?php echo $row['mat'];?>" class="btn-del">
                        <ion-icon name="trash" color="danger"></ion-icon> 
                                               
                        <a href="cnslt.php?mat=<?php echo $row['mat'];?>">                       
                        <ion-icon name="eye-outline" color="success"></ion-icon>

                        <a href="frmod.php?mat=<?php echo $row['mat'];?>">                        
                        <ion-icon name="create-outline" color="primary"></ion-icon>
                        
                        
    

                    </td>
     </tr> 
     <?php
}
?>
</table>
<script src="jquery-3.6.0.min.js"></script>
<script src="sweetalert2.all.min.js"></script>
    <script>
        $('.btn-del').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href')

            Swal.fire({
                title : 'Voulez vous vraiment supprimer ',
                text : 'Ce compte sera supprimé ',
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
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}
 td a  ion-icon {
    font-size:23px;
    padding:6px;
    text-align: left;
}
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
</style>
















            



            <!-- =================================================================================== -->

    <!-- =========== Scripts =========  -->
    <script src="asset/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>







