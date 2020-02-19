<?php
    include("datamanagers/DatabaseLinker.php");
    include("header.php");
    include("data/compte.php");
    session_start();
    $utilisateur = new Compte();
    $utilisateur->initCompte($_SESSION["idUser"]);
  ?>
  <button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div id="profilCard">
      <div class="Container">
        <h4 class="TitreProfil">Mon profile</h4>
        <p class="Avatar"><img src="https://www.shareicon.net/data/2016/09/01/822739_user_512x512.png" class="imageCercle" alt="pp"></p>
        <hr>
        <p><i class="description"></i><i class="fas fa-address-card"></i><?php echo ' '.$utilisateur->getNomCompte(); ?></i></p>
        <p><i class="description"><i class="far fa-calendar-alt"></i><?php echo ' '.$utilisateur->getDateCreation(); ?></i></p>
        <p><i class="description"><i class="fas fa-comments"></i><?php echo ' '.$utilisateur->getIdMessage().' messages'; //mettre un count(methode)?></i>
        </p> 
      </div>
    </div>
  </div>
  </div>
  <script src="popup.js" type="text/javascript"></script>

</div>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="StyleForum.css">
<body>
 
  <?php
  /*
  <div id="modalContainer">
    <div id="profilCard">
      <div class="Container">
        <h4 class="TitreProfil">Mon profile</h4>
        <p class="Avatar"><img src="https://www.shareicon.net/data/2016/09/01/822739_user_512x512.png" class="imageCercle" alt="pp"></p>
        <hr>
        <p><i class="description"></i><i class="fas fa-address-card"></i><?php echo ' '.$utilisateur->getNomCompte(); ?></i></p>
        <p><i class="description"><i class="far fa-calendar-alt"></i><?php echo ' '.$utilisateur->getDateCreation(); ?></i></p>
        <p><i class="description"><i class="fas fa-comments"></i><?php echo ' '.$utilisateur->getIdMessage().' messages'; //mettre un count(methode)?></i>
        </p> 
      </div>
    </div>
  </div>
  <script src="popup.js" type="text/javascript"></script>    
</body>
</html>*/
?>

 