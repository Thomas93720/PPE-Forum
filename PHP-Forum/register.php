<?php
	include("header.php");
?>
<div class = "boxPageRegister">	
	<label class="titreConnexion">Se connecter</label><br>
	<div class="connexion">
		<form method="GET">
	   		<input type="email" name="id" placeholder="email" spellcheck="false" /><br>
	   		<br><input type="password" name="mdp" placeholder="mot de passe" spellcheck="false" /><br><br>
	   		<input type="reset" value="Annuler">
	   		<input type="submit" value="Connection" />
	   		<div class="textco">
	   			<label>Pas encore de compte : </label><br>
	   			<a href="" class ="textco">S'inscrire</a>
			</div>
		</form>
	</div>
</div>
<?php
	include("footer.php");
?>