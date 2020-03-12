<!DOCTYPE html>
<html>
<head>
	<title>Choisir un Avatar</title>
	<link rel="stylesheet" type="text/css" href="styleIndexAvatar.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://kit.fontawesome.com/92920db574.js" />
	<script src="https://kit.fontawesome.com/92920db574.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="mainContainer">
		<form method="POST" class="container">
	  		<label for="myfile" accept=".jpg, .jpeg, .png">Choisissez un avatar :</label>
	  		<input type="file" name="avatar"><br>
	  		<input type="submit" class="bouton" name ="upload">
		</form>
	</div>
<?php
if(!empty($_POST['avatar']))
{ 
	echo $_POST["avatar"];
	echo '<br>';
    var_dump(move_uploaded_file($_POST["avatar"], "image/pp/"));
    echo '<br>';
    if(is_dir('image/pp/')) 
    {
    echo 'Le dossier existe';
	} else 
	{
	    echo 'Le dossier n\'existe pas';
	}
}
?>
</body>
</html>