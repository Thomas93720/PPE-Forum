<?php
	$utilisateur = new Compte();
	$utilisateur->initCompte($_SESSION["idUser"]);
	$nom = $utilisateur->getNomCompte();
?>
<div id = "returnTop" class="entete">
 	<h1>Forum</h1>
	<p>Bienvenue sur le Forum,<?php echo ' '.$nom; ?></p>
</div>
<div class="barreDeNavigation">
 	<a href="index.php" ><i class="fas fa-align-justify"></i> Accueil</a>
	<a href="indexRulePage.php"><i class="fas fa-info"></i> Règles</a>
	<a <?php echo 'href="profil.php?idProfil='.$_SESSION["idUser"].'"'?>><i class="fas fa-user-alt"> Mon compte</i></a>
	<form method = "post" class="search">
		<input type="search" placeholder="Rechercher un topic..." name="q">
		<button name="recherche"> Rechercher </button>
	</form>
	<a href="AjoutFilDeDiscussion.php"><i class="fas fa-plus"></i> Ajouter un topic</a>
	<a href="deco.php"><i class="fas fa-share-square"></i> Se deconnecter</a>
        <?php
            if(isset($_POST["recherche"])) 
            {
              if(!empty($_POST["q"]))  
              {     
                $tabFilDeDiscussion = fildediscussionManager::RechercheBarre($_POST["q"]);
              }
            }
        ?>
</div>
