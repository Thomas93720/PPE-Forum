<?php
	include("data/compte.php");
    include("datamanagers/DatabaseLinker.php");
    include_once("datamanagers/compteManager.php");
    session_start();
    $utilisateur = new Compte();
	$utilisateur->initCompte($_GET["id"]);
?>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="Stylesheet" type="text/css" href="StyleBan.css" media="all"/>
    <title>Forum</title>
</head>
<body>
<h1>Vous avez été banni</h1>
<img src="https://steamuserimages-a.akamaihd.net/ugc/437200103298172108/851D10D3E74901511CD589803C917C72AD29FDC2/" class="img">
<h2>Raison du ban : </h2>
<p>
	<?php
		$utilisateur->getRaisonBan();
	?>
</p>
<h2>Debanni le : <?php $utilisateur->getDateFinBan() ?></h2>