<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="Stylesheet" type="text/css"href="Style/AccountPage.css" href="AccountPage.css" media="all"/>
    <title>Forum</title>
</head>
<body>
<?php
include("datamanagers/compteManager.php");
include("datamanagers/messageManager.php");
include("datamanagers/DatabaseLinker.php");
include("datamanagers/fildediscussionManager.php");
session_start();
if(isset($_SESSION["idUser"]))  
{
	$utilisateur = new Compte();
	$utilisateur->initCompte($_SESSION["idUser"]);
	?>
	<h1>Modifier mes informations</h1>
	<a href="Avatar.php">Changer mon image</a>
	<p>Votre mot de passe : <?php echo $utilisateur->getMotDePasse(); ?></p>
	<button id="modal-btn"> Modifier votre mot de passe</button>
	  <div class="modal">
	    <div class="modal-content">
	      <span class="close-btn">&times;</span>
	      <h1>Votre ancien mot de passe</h1>
	      <form method="POST">
	        <textarea name="lastmdp"></textarea>
	        <br>
	      <h1>Votre nouveau mot de passe</h1>
	        <textarea name="newmdp"></textarea>
	        <button>Modifier</button>
	      </form>
	    </div>
	  </div>
	</div>
	<p>Votre login : <?php echo $utilisateur->getLogin(); ?></p>
	
	<p>Votre adresse email : <?php echo $utilisateur->getEmail(); ?></p>
	<p>Votre biographie : </p>
	<p> <?php echo $utilisateur->getBiographie(); ?>
	<?php
}
/*
<h2>Changer de mot de passe</h2>
<form method="POST">
	<br>
	<label>Votre ancien mot de passe : </label>
	<input type="password" name="mdp">
	<?php
	if (!empty($_POST["mdp"])) 
	{
		?>
		<br><br>
		<label>Votre nouveau mot de passe : </label>
		<input type="password" name="newmdp">
		<?php
	}
	?>
	<input type="submit" name="valider">
</form>
<h2>Changer votre email</h2>
<form method="POST">
	<label>Votre ancienne email : </label>
	<input type="email" name="email">
	<?php
	if (!empty($_POST["email"])) 
	{
		?>
		<br><br>
		<label>Votre nouvelle email : </label>
		<input type="mail" name="newMail">
		<?php
	}
	?>
	<input type="submit" name="valider">
</form>
<h2>Changer votre mot de passe</h2>
<button id="modal-btn"> Modifier votre mot de passe</button>
  <div class="modal">
    <div class="modal-content">
      <span class="close-btn">&times;</span>
      <h1>Votre ancien mot de passe</h1>
      <form method="POST">
        <textarea name="lastmdp"></textarea>
        <br>
      <h1>Votre nouveau mot de passe</h1>
        <textarea name="newmdp"></textarea>
        <button>Modifier</button>
      </form>
    </div>
  </div>
</div>
<br>
<h2>Biographie</h2>
<form>
	<textarea></textarea>
</form>
	 */
?>

<script type="text/javascript">
  let modalBtn = document.getElementById("modal-btn")
  let modal = document.querySelector(".modal")
  let closeBtn = document.querySelector(".close-btn")

  modalBtn.onclick = function(){
    modal.style.display = "block"
  }
  closeBtn.onclick = function(){
    modal.style.display = "none"
  }
  window.onclick = function(e){
    if(e.target == modal){
      modal.style.display = "none"
    }
  }
  </script>
	</body>
	</html>