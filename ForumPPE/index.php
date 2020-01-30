<?php
	include("header.php");
?>
<div class="entete">
 	<h1>Forum</h1>
	<p>Bienvenue sur le Forum</p>
</div>
<div class="barreDeNavigation">
 	<a href="" >menu</a>
	<a href="">information</a>
	<li class="connexion">
    	<a href="" class="loginbouton"><img class ="logonav"src="image/login.png"</a>
    	<div class="connexion-content">
      		<a href="#">S'inscrire</a>
      		<a href="#">Se connecter</a>
    	</div>
 	</li>
</div>
<div class="page">
	<div class="filDeDiscussion">
	</div>
	<div class="filDeDiscussion">
	</div>
	<div class="filDeDiscussion">
	</div>
	<div class="filDeDiscussion">
	</div>
	<div class="filDeDiscussion">
	</div>
	<div class="filDeDiscussion">
	</div>
</div>
<div class="bas">
	<?php  
	$nbpages =10;
  	for ($i=1; $i < $nbpages+1; $i++) 
  	{ 
  		echo '<a href="index.php?pages='.$i.'" class="nbPages">'.$i.'</a>';
  	}
	?>
</div>
<?php
	include("footer.php");
?>