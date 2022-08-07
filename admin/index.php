<?php
session_start();
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
                    <a href="cmptempl/index.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Gérer les comptes employés</span>
                    </a>
                </li>

                <li>
                    <a href="annonces/index.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Publier les annonces</span>
                    </a>
                </li>

                <li>
                    <a href="client/index.php">
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
                            <ion-icon name="keypad-outline"></ion-icon>
                        </span>
                        <span class="title">Consulter les annonces</span>
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
                <h2 class="text-center"><?php echo (date("H")<12)?("Bonjour"):("Bonsoir");?> Mr bensalem</h2>
    <p class="datatable design text-center"></p>
               
            </div>

            <!-- =================================================================================== -->
            










            



            <!-- =================================================================================== -->

    <!-- =========== Scripts =========  -->
    <script src="asset/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>