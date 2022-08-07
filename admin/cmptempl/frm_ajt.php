<?php
session_start();
include 'connexion.php';
$admin_mat = $_SESSION['admin'];
if(!isset($admin_mat)){
	header('location:\socothyd\index.php');
}

if(isset($_POST['submit'])){

   $nom = $_POST['nom'];
   $nom = filter_var($nom, FILTER_SANITIZE_STRING);
   $prenom = $_POST['prenom'];
   $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);
   $adresse = $_POST['adresse'];
   $adresse = filter_var($adresse, FILTER_SANITIZE_STRING);
   $num_tel = $_POST['num_tel'];
   $num_tel = filter_var($num_tel, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = md5($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
   $role = $_POST['role'];
   $role = filter_var($role, FILTER_SANITIZE_STRING);
   

   $select = $conn->prepare("SELECT * FROM `users` WHERE nom = ?");
   $select->execute([$nom]);

   if($select->rowCount() > 0){
      $message[] = 'Utilisateur existi déja!';
   }else{
      if($pass != $cpass){
         $message[] = 'Mot de passe non identique!';
      }else{
         $insert = $conn->prepare("INSERT INTO `users`(nom, prenom, adresse, num_tel, date,  password, role) VALUES(?,?,?,?,now(),?,?)");
         $insert->execute([$nom, $prenom, $adresse, $num_tel, $cpass, $role]);
         if($insert){
            $message[] = 'registered succesfully!';
            header('location:index.php');
         }
      }
   }

}

?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Socothyd.isser.dz</title>
    <!---<title> Responsive Registration Form | CodingLab </title>--->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>



  <div class="container">
    
    <div class="title"> Ajouter un compte employé</div>
    
    <div class="content">
      
    <form action="" method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nom *</span>
            <input type="text" name="nom" placeholder="Entrer le nom" required>
          </div>
          <div class="input-box">
            <span class="details">Prénom *</span>
            <input type="text" class="box"  name="prenom" placeholder="Entrer le prénom " required>
          </div>
          <div class="input-box">
            <span class="details">Adresse *</span>
            <input type="text" class="box"  name="adresse" placeholder="Entrer l'adresse " required>
          </div>
          <div class="input-box">
            <span class="details">Numéro du téléphone *</span>
            <input type="tel" pattern="[0-9]{10}" class="box" name="num_tel" placeholder="Entrer le numéro du téléphone" required>
          </div>
          <div class="input-box">
            <span class="details">Mot de passe *</span>
            <input type="password"  class="box" name="pass" placeholder="Entrer le mot de passe " required>
          </div>
          <div class="input-box">
            <span class="details">Confirmer le mot de passe *</span>
            <input type="password" class="box" name="cpass" placeholder="Confirmer le mot de passe" required>
          </div>

          <div class="input-box">
            <span class="details">Choisir le role d'employé *</span>
           <select name="role" class="box" required>
              <option value="Agent commercial">Agent commercial</option>
              <option value="Magasinier">Magasinier</option>
            </select>
        </div>
        
        </div>       
           
        <div class="button">
          <input type="submit" value="Valider" name="submit">
        </div>
      </form>
    </div>
  </div>

</body>
</html>

<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  background: linear-gradient(135deg, #71b7e6, #215AFF);
}
.container{
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #215AFF);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #215AFF;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #215AFF;
   border-color: #d9d9d9;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
   height: 100%;
   width: 100%;
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
 select {
    height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;

} 
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg, #71b7e6, #215AFF);
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}
.message{
   position: sticky;
   top:0;
   max-width: 1200px;
   padding:1.5rem 2rem;
   display: flex;
   align-items: center;
   justify-content: space-between;
   gap:1.5rem;
   z-index: 1000;
   background-color: var(--light-bg);
   margin:0 auto;
}

:root{
   --blue:#0097e6;
   --orange:#f39c12;
   --red:#e74c3c;
   --white:#fff;
   --light-color:#aaa;
   --black:#222;
   --light-bg:#333;
}

.message{
   position: sticky;
   top:0;
   max-width: 1200px;
   padding:1.5rem 2rem;
   display: flex;
   align-items: center;
   justify-content: space-between;
   gap:1.5rem;
   z-index: 1000;
   background-color: var(--light-bg);
   margin:0 auto;
}

.message span{
   color:var(--white);
   font-size: 2rem;
}

.message i{
   color:var(--red);
   font-size: 2.5rem;
   cursor: pointer;
}

.message i:hover{
   color:var(--white);
}



</style>
