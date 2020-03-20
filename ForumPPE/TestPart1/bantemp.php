<?php
	include("HeaderForum.php");
	include("datamanagers/compteManager.php");
	include("datamanagers/messageManager.php");
	include("datamanagers/DatabaseLinker.php");
	include("datamanagers/fildediscussionManager.php");
	$utilisateur = new Compte();
	$utilisateur->initCompte($_GET["idCompte"]);
	$nom = $utilisateur->getNomCompte();
?>
<?php if (!empty($_GET["idCompte"])) 
{
	?>
	<h1>Bannir <?php echo $nom;?></h1>

	<form method="POST">
		<div class="postCom">
			<div>
				<p>bannir jusque</p>
				<input type="date" name="dateFin"></input>
			</div>
			<h2>Raison du ban</h2>
			<textarea name="raison"></textarea>
			<br>
			<button>Valider</button>
			<br>
		</div>
	</form>
	<?php
	if (!empty($_POST["raison"])&&!empty($_POST["dateFin"])) 
	{
		compteManager::banCompteTemp($_GET["idCompte"],$_POST["raison"],$_POST["dateFin"]);
		echo $_POST["dateFin"];
		header('Location: index.php');
		exit();
	}
	else
	{
		echo "<p>Veuillez remplir tous les champs</p>";
	}
	include("footer.php");
}
?>
<?php
	
?>