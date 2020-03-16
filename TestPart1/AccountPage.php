<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="Stylesheet" type="text/css"href="AccountPage.css" href="AccountPage.css" media="all"/>
    <link href="https://fonts.googleapis.com/css?family=Bitter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://kit.fontawesome.com/92920db574.js" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/92920db574.js" crossorigin="anonymous"></script>
    <title>Forum</title>
</head>
<body>

<h1>Modifier mes informations</h1>
<a href="#">Changer mon image</a>
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
<h2>Changer votre pseudo</h2>
<form method="POST">
	<label>Votre ancien pseudo</label>
	<input type="text" name="pseudo">
	<?php
	if (!empty($_POST["pseudo"])) 
	{
		?>
		<label>Votre nouveau pseudo : </label>
		<input type="text" name="newPseudo">
		<?php
	}
	?>
	<input type="submit" name="valider">
</form method="POST">
<br>
<h2>Biographie</h2>
<form>
	<textarea></textarea>
</form>