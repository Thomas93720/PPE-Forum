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
		<input type="submit" class="bouton" name="Valider">
	</div>
</body>
</html>