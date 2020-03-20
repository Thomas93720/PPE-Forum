<?php
	include_once("HeaderForum.php");
	include("datamanagers/compteManager.php");
	include("datamanagers/messageManager.php");
	include("datamanagers/DatabaseLinker.php");
	include("datamanagers/fildediscussionManager.php");
	if (!empty($_GET["id"])) 
	{
		session_start();  
		if(isset($_SESSION["idUser"]))  
		{
			if (!empty($_POST["libelle"])) {
				messageManager::ChangeMessage($_GET["id"],$_POST["libelle"]);
				?>
				<p>Votre message à bien été modifié</p>
				<a href="index.php">Revenir au forum</a>
				<?php
			}
			?>
			<h1>Modifier votre message </h1>
			<form method="POST">
				<textarea name = "libelle"></textarea>
				<br>
				<br>
				<input type="submit" name="Modifier">
			</form>
			<?php
		}
	}