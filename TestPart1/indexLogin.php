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
<div class="container" id="container">
 <div class="form-container sign-up-container">
  <form action="#">
   <h1>Créer votre compte</h1>
   <div class="social-container">
    <a href="http://sio.jbdelasalle.com/" class="social"><i class="fas fa-school"></i></a>
    <a href="#" class="social"><i class="fas fa-scroll"></i></a>
   </div>
   <span>Rejoignez nous maintenant!</span>
   <input type="text" placeholder="Pseudo" />
   <input type="email" placeholder="Email" />
   <input type="password" placeholder="Mot de passe" />
   <button>Nous Rejoindre</button>
  </form>
 </div>
 <div class="form-container sign-in-container">
  <form action="#">
   <h1>Se Connecter</h1>
   <div class="social-container">
    <a href="http://sio.jbdelasalle.com/" class="social"><i class="fas fa-school"></i></a>
    <a href="#" class="social"><i class="fas fa-scroll"></i></a>
   </div>
   <span>Utilisez votre compte pour vous connecter</span>
   <input type="email" placeholder="Email" />
   <input type="password" placeholder="Mot de passe" />
   <a href="#">Mot de passe oublié? (Ne marche pas lul)</a>
   <button>Se Connecter</button>
  </form>
 </div>
 <div class="overlay-container">
  <div class="overlay">
   <div class="overlay-panel overlay-left">
    <h1>Bon retour parmis nous!</h1>
    <p>Reconnectez vous avec vos informations!</p>
    <button class="ghost" id="signIn">Se Connecter</button>
   </div>
   <div class="overlay-panel overlay-right">
    <h1>Bonjour!</h1>
    <p>Créez votre compte dès maintenant!</p>
    <button class="ghost" id="signUp">S'inscrire!</button>
   </div>
  </div>
 </div>
</div>
<script type="text/javascript" src="main.js"></script>
</body>
</html>