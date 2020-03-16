<!DOCTYPE html>
<html>
<head>
  <title>Changer d'avatar</title>
  <link rel="stylesheet" type="text/css" href="styleIndexAvatar.css">
</head>
<body>
	<div class="mainContainer">
	  <form enctype="multipart/form-data" action="Avatar.php" method="POST" class="container">
	  	<label for="myfile" accept=".jpg, .jpeg, .png">Choisissez un avatar :</label>
	    <input type="file" name="uploaded_file"></input><br />
	    <input type="submit" value="Valider" class="bouton"></input>
	  </form>
	</div>
</body>
</html>
<?php
session_start();
include("datamanagers/DatabaseLinker.php");
include("datamanagers/fildediscussionManager.php");
include("datamanagers/compteManager.php");
include("data/message.php");
  if(!empty($_FILES['uploaded_file']))
  {
    $path = "image/pp/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) 
    {
      echo "Le fichier ".  basename( $_FILES['uploaded_file']['name']). 
      " a bien été mis à jour !";
      compteManager::cheminPhoto($_SESSION["idUser"],"image/pp/".$_FILES['uploaded_file']['name']);
      echo '<a href="index.php">Revenir au forum </a>';
    } 
    else{
        echo "There was an error uploading the file, please try again!";
    }
  }
?>