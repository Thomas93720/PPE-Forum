<?php
	include("header.php");
	include("data/compte.php");
	include("datamanagers/DatabaseLinker.php");
?>

<?php
	session_start();  
	if(isset($_SESSION["idUser"]))  
	{  
		include("BarreDeNavCo.php");
		$Utilisateur = new Compte();
		$Utilisateur->initCompte($_SESSION["idUser"]);
		echo '<h3 style="text-align : center">Bienvenue '.$Utilisateur->getNomCompte().' sur le forum</h3>';  
	}  
	else  
	{  
		header("location:index.php");  
	}  
 ?>  