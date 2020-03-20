<?php
	include("datamanagers/DatabaseLinker.php");
	include("datamanagers/fildediscussionManager.php");
	include("datamanagers/compteManager.php");
	include("datamanagers/messageManager.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="Stylesheet" type="text/css"href="Style/styleAllUser.css" href="StyleSite.css" media="all"/>
    <link href="https://fonts.googleapis.com/css?family=Bitter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://kit.fontawesome.com/92920db574.js" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/92920db574.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="Style/styleFooter.css">
    <title>Forum</title>
</head>
<body>
<style>text-align:center;</style>
<h1>Liste des utilisateurs</h1>
<?php
	$tabUser = compteManager::getAllcompte();
	echo '<p>Il y a  : '.sizeof($tabUser).' utilisateurs</p>';
?>
<hr style="width:80%">
<h2>Administrateurs</h2>
<?php
foreach ($tabUser as $user) 
{
	if (compteManager::isCompteAdmin($user->getIdCompte())) 
	{
		echo '<p><a href="profil.php?idProfil='.$user->getIdCompte().'"">'.$user->getNomCompte().'</a></p>';
	}
}
?>
<h2>Membres</h2>
<?php
foreach ($tabUser as $user) 
{
	if (!compteManager::isCompteAdmin($user->getIdCompte())&&!compteManager::isCompteBan($user->getIdCompte())) 
	{
		echo '<p><a href="profil.php?idProfil='.$user->getIdCompte().'"">'.$user->getNomCompte().'</a></p>';
	}
}
?>
<h2>Les bannis</h2>
<?php
foreach ($tabUser as $user) 
{
	if (compteManager::isCompteBan($user->getIdCompte())) 
	{
		echo '<p><a href="profil.php?idProfil='.$user->getIdCompte().'"">'.$user->getNomCompte().'</a></p>';
	}
}
?>