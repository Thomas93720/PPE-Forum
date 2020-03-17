<?php
    include("datamanagers/DatabaseLinker.php");
    include_once("datamanagers/compteManager.php");
    include("datamanagers/fildediscussionManager.php");
    include("datamanagers/messageManager.php");
	session_start();
	if (isset($_SESSION["idUser"])) 
	{
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Créer un nouveau fil de discussion</title>
			<link rel="stylesheet" type="text/css" href="Style/styleAddTopic.css">
			<link rel="stylesheet" href="https://kit.fontawesome.com/92920db574.js" />
			<script src="https://kit.fontawesome.com/92920db574.js" crossorigin="anonymous"></script> 
			<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
		</head>
		<body>
		<div class="main-container">
				<h1>Création d'un fil de discussion</h1>
		<form method="POST" style="margin-left: 10px;">
			<p>Titre du topic : </p>
			<input type="text" maxlength="30" placeholder="Insérer un titre pour votre topic" name="titre" class="title"/>
			<p>Catégorie du topic : </p>
			<select name="theme">
				<option value="Hardware">Hardware</option>
				<option value="Jeux" >Jeux</option>
				<option value="Audio-Video" >Audio-Video</option>
				<option value="discussions" >Discussions</option>
				<option value="Film" >Film</option>
				<option value="Astronomie" >Astronomie</option>
			</select>
			<br>
			<br>
			<p>Contenu du topic : </p>
			<textarea class="content" placeholder="Vos messages doivent respecter les règles du Forum, dans le cas contraire, votre compte pourrait être banni définitivement du Forum" name="message"></textarea>
			<br>
			<input type="submit" name="ajouter" class="bouton">
		</form>
		<?php
if (!empty($_POST["ajouter"])) 
{
	fildediscussionManager::CreateNewFil($_POST["titre"],$_POST["theme"],$_SESSION["idUser"]);
	echo '<h2>Fil de discussion ajouté !</h2>';
	if (!empty($_POST["message"]))
	{
		$msg = new Message();
		$msg->setLibelle($_POST["message"]);
		$msg->setIdAuteur($_SESSION["idUser"]);
		$msg->setIdFilDeDiscussion(fildediscussionManager::gelLastIdFilDeDiscussion());
		messageManager::insertMessage($msg);
	}
	?>
	<a href="index.php"><button class="bouton">Retourner au forum</button></a>
	<?php
}
}
?>
		</div>


