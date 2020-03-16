<?php
	include("header.php");
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
	<link rel="stylesheet" type="text/css" href="styleAddTopic.css">
	<link rel="stylesheet" href="https://kit.fontawesome.com/92920db574.js" />
	<script src="https://kit.fontawesome.com/92920db574.js" crossorigin="anonymous"></script> 
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main-container">
		<form>
			<h1>Création d'un fil de discussion</h1>
			<p>Titre du topic : </p>
			<input type="text" placeholder="Insérer un titre pour votre topic" name="title" class="title">
			<p>Catégorie du topic : </p>
			<select name="theme">
				<option value="Hardware">Hardware</option>
				<option value="Jeux">Jeux Vidéo</option>
				<option value="Audio-Video">Audio - Vidéo</option>
				<option value="Discussions">Discussions</option>
				<option value="Film">Cinéma / Films</option>
				<option value="Astronomie">Astronomie</option>
			</select>
			<p>Contenu du topic : </p>
			<textarea class="content" placeholder="Vos messages doivent respecter les règles du Forum, dans le cas contraire, votre compte pourrait être banni définitivement du Forum"></textarea>
			<br>
			<input type="submit" class="bouton" name="ajouter">
		</form>
	</div>
<?php
if (!empty($_POST["ajouter"])) 
{
	echo $_POST["titre"];
	echo $_POST["theme"];
	echo $_SESSION["idUser"];
	fildediscussionManager::CreateNewFil($_POST["titre"],$_POST["theme"],$_SESSION["idUser"]);
	echo 'Fil de discussion ajouté !';
	if (!empty($_POST["message"]))
	{
		echo $_POST['message'];
		$msg = new Message();
		$msg->setLibelle($_POST["message"]);
		$msg->setIdAuteur($_SESSION["idUser"]);
		$msg->setIdFilDeDiscussion(fildediscussionManager::gelLastIdFilDeDiscussion());
		echo '<br>';
		echo fildediscussionManager::gelLastIdFilDeDiscussion();
		echo '<br>';
		echo '<br>';
		echo $msg->getIdFilDeDiscussion();
		echo '<br>';
		echo $msg->getIdAuteur();
		echo '<br>';
		echo $msg->getLibelle();
		echo '<br>';
		var_dump(messageManager::insertMessage($msg));
	}
	?>
	<button>Retourner au forum</button>
	<?php
}
}
?>
</body>
</html>