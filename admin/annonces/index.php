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
                        <input type="text" name="search" placeholder="Rechercher une annonce">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                    </form>
                </div>

                
            </div>

            <!-- =================================================================================== -->
            <div >
                <a href="frm_ajtann.php">                       
                      <button class="butn">
                    <ion-icon name="add-outline"></ion-icon>
                        Ajouter une annonce</button>  
                    </a>                
                </div><br><br>
                <?php
	$sql = $conn->prepare(" SELECT * FROM annonce");
	$sql->execute();
	while($row=$sql->fetch()){
		?>
    <div class="w3-third w3-container w3-margin-bottom">
    <img src="uploaded_img/<?= $row['img_prod']; ?>"  style="width:100%" ><br><br>
      <div class="w3-container w3-white">
        <p><b><?php print $row['nom_prod'] . "\t";?></b></p>
        <p><?php print $row['desc_prod'] . "\t";?> </p><br>
        <p><b>Date de publication :</b>
        <p><?php print $row['date_pub'] . "\t";?>
        <p>
                            <a href="sup.php?id=<?php echo $row['id'];?>"class="btn-del">
							<ion-icon id="trc" name="trash" color="danger"></ion-icon> </a>
	
							<a href="frmod.php?id=<?php echo $row['id'];?>">                       
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
                text : 'Cette annonce sera supprimée ',
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
