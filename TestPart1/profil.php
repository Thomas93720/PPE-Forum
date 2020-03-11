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
		<div class="container1">
			<div class ="titre">
				<h1>Votre profil <?php echo $nom;?></h1>
				<?php
				if (compteManager::isCompteAdmin($_SESSION["idUser"])) {
					echo '<h2>Admin</h2>';
				}
				else
				{
					echo '<h2>Membre</h2>';
				}
				
				?>
			</div>
		</div>
		<div class="content">
	      <div class="Container">
	      	<div class="top">
	      		<div>
		      		<p class="avatar"><img src="image/font.jpg" class="imageCercle" alt="pp"></p>
			        <h4 class="TitreProfil">Mon profile</h4>
		    	</div>
		    </div>
	        <hr>
	        <div class="bot">
	        	<div>
			        <p><i class="description"></i><i class="fas fa-address-card"></i><?php echo ' '.$utilisateur->getNomCompte(); ?></i></p><br>
			        <p><i class="description"><i class="far fa-calendar-alt"></i><?php echo ' '.$utilisateur->getDateCreation(); ?></i></p>
			        <p><i class="description"><i class="fas fa-comments"></i><?php echo ' '.$utilisateur->getIdMessage().' messages'; //mettre un count(methode)?></i></p>
			    </div>
	        </div>
	      </div>
	      <div class="nav">
	      	<form method="POST">
	      		<button>fil de discussion</button>
	      		<button>messages</button>
	      	</form>
	      </div>
	      <div class="page">
	      	
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
		<div class="container">
			<div class ="titre">
				<h1>Profil de <?php echo $nom;?></h1>
				<?php
				if (compteManager::isCompteAdmin($_GET["idProfil"])) {
					echo '<h2>Admin</h2>';
				}
				else
				{
					echo '<h2>Membre</h2>';
				}
				
				?>
			</div>
		</div>
  </div>
		<?php
	}
	?>
	</body>
</html>