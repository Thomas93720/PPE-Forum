<?php
	include("header.php");
    include("datamanagers/DatabaseLinker.php");
    include_once("datamanagers/compteManager.php");
    include("datamanagers/fildediscussionManager.php");
	session_start();
	if (isset($_SESSION["idUser"])) 
	{
		?>
<h1>Ajouter un fil de discussion</h1>
<form method="POST" style="margin-left: 10px;">
	<p>Titre</p>
	<input type="text" name="titre" placeholder="Titre ...">
	<p>Theme</p>
	<select name="theme">
		<option value="Hardware">Hardware</option>
		<option value="Jeux" >Jeux</option>
		<option value="Audio-Video" >Audio-Video</option>
		<option value="Discussions" >Discussions</option>
		<option value="Film" >Film</option>
		<option value="Astronomie" >Astronomie</option>
	</select>
	<br>
	<br>
	<input type="submit" name="ajouter">
</form>
<?php
if (!empty($_POST["ajouter"])) 
{
	fildediscussionManager::CreateNewFil($_POST["titre"],$_POST["theme"],$_SESSION["idUser"]);
	echo 'Fil de discussion ajouté !';
	?>
	<button>Retourner au forum</button>
	<?php
}
}
?>