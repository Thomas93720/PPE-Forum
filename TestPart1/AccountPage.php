<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
<<<<<<< HEAD
    <link rel="Stylesheet" type="text/css" href="AccountPage.css" media="all"/>
    <link href="https://fonts.googleapis.com/css?family=Bitter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://kit.fontawesome.com/92920db574.js" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/92920db574.js" crossorigin="anonymous"></script>
    <title>Modification de vos informations</title>
</head>
<body>
	<div class="container">
		<h1>Modifier mes informations</h1>

		<a href="Avatar.php">Changer votre avatar</a>

		<h2>Changer de mot de passe</h2>
		<form method="POST">
			<p>Entrez votre ancien mot de passe : </p>
			<input class="pass" type="password" name="mdp">
			<p>Entrez votre nouveau mot de passe :</p>
			<input class="pass" type="password" name="mdp">
			<p>Confirmez votre nouveau mot de passe :</p>
			<input class="pass" type="password" name="mdp">
			<br>
			<input type="submit" name="valider">
		</form>

		</form method="POST">
		<br>
		<h2 class="bio">Changez votre biographie : </h2>
		<form>
			<textarea placeholder="Décrivez vous..."></textarea>
			<br>
			<input type="submit" name="valider">
		</form>
	</div>

=======
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
>>>>>>> 22cfbc4e10039dab5d0da8cb22a5902e6c0e1780
