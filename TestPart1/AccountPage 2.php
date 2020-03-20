<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="AccountPage.css">
    <link href="https://fonts.googleapis.com/css?family=Bitter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://kit.fontawesome.com/92920db574.js" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/92920db574.js" crossorigin="anonymous"></script>
    <title>Modification de vos informations</title>
</head>
<body>
	<div class="container">
		<h1>Modifier mes informations</h1>

		<a class="change" href="Avatar.php">Changer votre avatar</a>

		<h2>Changer de mot de passe</h2>
		<form method="POST">
			<input placeholder="Entrez votre ancien mot de passe" class="pass" type="password" name="mdp">
			<input placeholder="Entrez un nouveau mot de passe" class="pass" type="password" name="mdp">
			<input placeholder="Entrez un nouveau mot de passe" class="pass" type="password" name="mdp">
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
	<a class="back" href="index.php">Revenir au Forum</a>


