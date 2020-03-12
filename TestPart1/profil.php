<?php
	include("datamanagers/compteManager.php");
	include("datamanagers/messageManager.php");
	include("datamanagers/DatabaseLinker.php");
	include("datamanagers/fildediscussionManager.php");
	session_start();
?>
<html>
	<head>
	    <meta charset="utf-8" />
	    <link rel="Stylesheet" type="text/css" href="StyleProfil.css" media="all"/>
	    <script src="https://kit.fontawesome.com/92920db574.js" crossorigin="anonymous"></script>
	    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	    <title>Forum</title>
	</head>
<body>
<?php
	if(isset($_SESSION["idUser"])&&$_SESSION["idUser"]==$_GET["idProfil"])
	{
		$utilisateur = new Compte();
		$utilisateur->initCompte($_SESSION["idUser"]);
		$nom = $utilisateur->getNomCompte();
		?>
		<div class="card-container">
		<div class="up-container">
			<div class="img-container">
				<img src="image/pp/user.png">
			</div>
		</div>
		<div class="low-container">
			<div>
				<h3>Votre profil <?php echo $nom;?></h3>
				<?php
				if (compteManager::isCompteAdmin($_SESSION["idUser"])) 
				{
					echo '<h4>Administrateur</h4>';
				}
				else
				{
					echo '<h4>Membre</h4>';
				}
				echo "Inscrit depuis le : ";
				echo '<i class="fas fa-birthday-cake"></i> '.$utilisateur->getDateCreation();
				?>
				<div>
					<p>Pas de bio pour l'instant...</p>
				</div>
				<div>
					<a href="#" class="btn">Modifier mes informations</a>
				</div>
				<div class="btn2">
					<a href="#" class="btn">Topics de l'utilisateur</a>
				</div>
				<div class="btn3">
					<a href="index.php" class="btn">Revenir au Forum</a>
				</div>
			</div>
		</div>
	</div>
		<?php
	}
	else
	{
		$utilisateur = new Compte();
		$utilisateur->initCompte($_GET["idProfil"]);
		$nom = $utilisateur->getNomCompte();
		?>
		<div class="card-container">
		<div class="up-container">
			<div class="img-container">
				<img src="image/pp/user.png">
			</div>
		</div>
		<div class="low-container">
			<div>
				<h3>Profil de <?php echo $nom;?></h3>
				<?php
				if (compteManager::isCompteAdmin($_GET["idProfil"])) {
					echo '<h4>Administrateur</h4>';
				}
				else if(compteManager::isCompteBan($_GET["idProfil"]))
				{
					echo '<h4>Banni</h4>';
				}
				else
				{
					echo '<h4>Membre</h4>';
				}
				echo "Inscrit depuis le : ";
				echo '<i class="fas fa-birthday-cake"></i> '.$utilisateur->getDateCreation();
				?>
				<div>
					<p>Pas de bio pour l'instant...</p>
				</div>
				<div class="btn2">
					<a href="#" class="btn">Topics de l'utilisateur</a>
				</div>
				<div class="btn3">
					<a href="index.php" class="btn">Revenir au Forum</a>
				</div>
			</div>
		</div>
	</div>
		<?php
	}
	?>
	</body>
</html>