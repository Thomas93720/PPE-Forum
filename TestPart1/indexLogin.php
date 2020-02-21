<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Nous rejoindre</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://kit.fontawesome.com/92920db574.js" />
  <script src="https://kit.fontawesome.com/92920db574.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="StyleLogin.css">
</head>
<body>
  <?php
  /*sha1()*/
    include("data/compte.php");
    include("datamanagers/DatabaseLinker.php");
    include_once("datamanagers/compteManager.php");

    $connexion = DatabaseLinker::getConnexion();
    if (isset($_POST["loginSubmit"])) 
    {
      if(empty($_POST["motdepasse"]) || empty($_POST["identifiant"]))  
       {  
          $erreur = '<br><div class="erreur">Veuillez remplir tous les champs</div>';  
       }
       else
       {
          $isUserCo = Compte::identification($_POST["motdepasse"],$_POST["identifiant"]);
          if ($isUserCo==NULL) 
          {
            $erreur = '<br><label class="erreur">Mauvais identifiants</label>';
          }
          else
          {
            session_start();
            $_SESSION["idUser"] = $isUserCo->getIdCompte();
            include("header.php");
            ?>
    <?php
            header('Location: connecte.php');
            exit();
          }
      }  
    }
  ?>
<div class="container" id="container">
 <div class="form-container sign-up-container">
  <form action="indexLogin.php" method="post">
   <h1>Créer votre compte</h1>
   <div class="social-container">
    <a href="http://sio.jbdelasalle.com/" class="social"><i class="fas fa-school"></i></a>
    <a href="indexRulePage.php" class="social"><i class="fas fa-scroll"></i></a>
   </div>
   <span>Rejoignez nous maintenant!</span>
   <input type="text" name="nameReg" placeholder="Pseudo" />
   <input type="text" name="login" placeholder="Login" />
   <input type="email" name="emailReg" placeholder="Email" />
   <input type="password" name="passwordReg" placeholder="Mot de passe" />
   <button name="registerSubmit">Nous Rejoindre</button>
  </form>
 </div>
 <div class="form-container sign-in-container">
  <form action="#" method="post">
   <h1>Se Connecter</h1>
   <div class="social-container">
    <a href="http://sio.jbdelasalle.com/" class="social"><i class="fas fa-school"></i></a>
    <a href="indexRulePage.php" class="social"><i class="fas fa-scroll"></i></a>
   </div>
   <span>Utilisez votre compte pour vous connecter</span>
   <input type="text" maxlength="30" name = "identifiant" placeholder="Pseudo" />
   <input type="password" maxlength="30" name = "motdepasse" placeholder="Mot de passe" />
   <a href="#">Mot de passe oublié? (Ne marche pas lul)</a>
   <button name="loginSubmit">Se Connecter</button>
   <?php
    if(isset($erreur))
    {
      echo $erreur;
    }
  ?>
  </form>
 </div>
 <div class="overlay-container">
  <div class="overlay">
   <div class="overlay-panel overlay-left">
    <h1>Bon retour parmis nous!</h1>
    <p>Reconnectez vous avec vos informations!</p>
    <button class="ghost" name="loginSubmit" id="signIn">Se Connecter</button>
   </div>
   <div class="overlay-panel overlay-right">
    <h1>Bonjour!</h1>
    <p>Créez votre compte dès maintenant!</p>
    <button class="ghost" id="signUp">S'inscrire!</button>
    <?php
    $connexion = DatabaseLinker::getConnexion();
    if (isset($_POST["registerSubmit"])) 
    {
      if(empty($_POST["passwordReg"]) || empty($_POST["emailReg"]) || empty($_POST["nameReg"]) || empty($_POST["login"]))  
       {  
          echo '<label>Veuillez remplir tous les champs</label>';  
       }
       else
       {
          $isvalide = CompteManager::VerifNewId($_POST["nameReg"]);
          if ($isvalide==false) 
          {
            echo 'Identifiants invalide';
          }
          else
          {
            $compte = new Compte();
            $compte->setMotDePasse($_POST["passwordReg"]);
            $compte->setEmail($_POST["emailReg"]);
            $compte->setNomCompte($_POST["nameReg"]);
            $compte->setLogin($_POST["login"]);
            compteManager::CreateNewCompte($compte);
            EnvoieMail($compte);
            session_start();
            $_SESSION["idUser"] = compteManager::getIdCompteRegister($compte);


            header('Location: connecte.php');
            exit();
          }
      }  
    }
  ?>
   </div>
  </div>
 </div>
</div>
<script type="text/javascript" src="main.js"></script>
</body>
</html>