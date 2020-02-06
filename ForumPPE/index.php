<?php
	include("header.php");
	include("Checkconnexion.php");
?>
<div class="entete">
 	<h1>Forum</h1>
	<p>Bienvenue sur le Forum</p>
</div>
<?php
if ($etatConnexion == true) 
{
	include("BarreDeNavNonCo.php");
}
else
{

}
?>
<div class="page">
	<div class="partgauche">
	</div>
	<div class="milieu">
		<table>
			<tbody>
				<tr>
					<th>date</th>
					<th>Theme<th>
					<th>Titre</th>
				</th>
					<?php
						$state = $conn->prepare('SELECT * FROM FilDeDiscussion');
						$state->execute();
						$resultats = $state->fetchAll();
						foreach ($resultats as $lineResultat) 
						{
							$title = $lineResultat["idFilDeDiscussion"];
							echo '<tr class="titreForum">';
							echo '<td>'.$lineResultat["dateOuverture"].'</a></td>';
							echo '<td>'.$lineResultat["Theme"].'</td>';
							echo '<td><a class="lientitreFilDeDiscussion" href="FilDeDiscussion.php?titre='.$title.'">'.$lineResultat["titreFilDeDiscussion"].'</a></td>';
							echo '</tr>';
						}
					?>
			</tbody>
		</table>
	</div>
	<div class="partdroite">
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