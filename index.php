<?php
session_start();

include 'connexion.php';


if(isset($_POST['submit'])){

   $nom = $_POST['nom'];
   $nom = filter_var($nom, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select = $conn->prepare("SELECT * FROM `users` WHERE nom = ? AND password = ?");
   $select->execute([$nom, $pass]);
   $row = $select->fetch(PDO::FETCH_ASSOC);

   if($select->rowCount() > 0){

      if($row['role'] == 'admin'){

         $_SESSION['admin'] = $row['mat'];
         $_SESSION['nom']=$_POST['nom'];
         header('location:admin/index.php');

      }elseif($row['role'] == 'client'){

         $_SESSION['client_mat'] = $row['mat'];
         $_SESSION['nom']=$_POST['nom'];

         header('location:client/index.php');

      }elseif ($row['role'] == 'Agent commercial') {

        $_SESSION['agent'] = $row['mat'];
         header('location:agent/index.php');

      }elseif ($row['role'] == 'Magasinier') {
        
        $_SESSION['magasinier'] = $row['mat'];
        $_SESSION['nom']=$_POST['nom'];
         header('location:magasinier/index.php');
      }else{
         $message[] = 'no user found!';
      }
      
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Socothyd.isser.dz</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body>
    <!-- Spinner Start -->
  
        <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.php" class="navbar-brand p-0">
                <h1 class="m-0"><i class="fa fa-user-tie me-2"></i>Socothyd</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Accueil</a>
                    <a href="produits/index.php" class="nav-item nav-link">Produits</a>
                    <a href="annonces.html" class="nav-item nav-link">Annonces</a>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                    <a href="register.php" class="nav-item nav-link">S'insecrire</a>
                    
                </div>
            
            
        </nav>
  
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">         
            <div class="carousel-inner">    
                <div class="carousel-item active">
                    <img class="w-100" src="img/3.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">La Qualiter Fait la Différence</h1>
                                
                        <div class="caption d-flex flex-column align-items-center justify-content-center">    
                            <div class="col-lg-5">
                                <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.1s">
                                    <form name="fo" method="post" action="">
                                        <div class="row g-3">
                                            <div class="col-xl-12">
                                                <input type="text"  name="nom" class="form-control bg-light border-0" placeholder="Nom" style="height: 55px;" required>
                                            </div>
                                            <div class="col-12">
                                                <input type="password" name="pass" class="form-control bg-light border-0" placeholder="Mot de passe" style="height: 55px;" required>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-dark w-100 py-3" type="submit" name="submit" value="login now">Valider</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                
                <div class="carousel-item">
                <img class="w-100" src="img/1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">La Qualiter Fait la Différence</h1>
                                
                        <div class="caption d-flex flex-column align-items-center justify-content-center">    
                            <div class="col-lg-5">
                                <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.1s">
                                <form name="fo" method="post" action="">
                                        <div class="row g-3">
                                            <div class="col-xl-12">
                                            <input type="text"  name="nom" class="form-control bg-light border-0" placeholder="Nom" style="height: 55px;" required>
                                            </div>
                                            <div class="col-12">
                                                <input type="password" name="pass" class="form-control bg-light border-0" placeholder="Mot de passe" style="height: 55px;" required>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-dark w-100 py-3" type="submit" name="submit" value="login now">Valider</button>
                                            </div>
                                        </div>
                                    </form>
                                            
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Navbar & Carousel End -->
    

    <!-- Footer Start -->
    
                               
                                <div class="container-fluid bg-dark px-5 d-none d-lg-block">
                                    <div class="row gx-0">
                                        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                                            <div class="d-inline-flex align-items-center" style="height: 45px;">
                                               
                                                <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>Isser 35230,W,Boumerdes,Algerie</small>
                                                <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>024 71 31 06</small>
                                                <small class="text-light"><i class="fa fa-envelope-open me-2"></i>contact@socothyd.com.dz</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 text-center text-lg-end">
                                            <div class="d-inline-flex align-items-center" style="height: 45px;">
                                                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                                                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                                                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                                                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                                                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-right">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-right" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="#">Socothyd.isser.dz</a>. Tous droits réservés. 
						
						<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
						conçu par <a class="text-white border-bottom" href="https://htmlcodex.com">Ahmed kameche</a>
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

