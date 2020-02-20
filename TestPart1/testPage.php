<?php	
	include("datamanagers/DatabaseLinker.php");
	include("data/fildediscussion.php");
	include("data/compte.php");
	include("data/message.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="Stylesheet" type="text/css" href="StyleTest.css" media="all"/>
    <title>Forum</title>
</head>
<body>
<?php
	include("BarreDeNavNonCo.php");
?>
<div class="containerPage">
	<div class="page">
		<?php
			for ($i=0; $i < 12; $i++) 
		    { 
				$fildediscussion = new FilDeDiscussion();
				$fildediscussion->getIdFilDeDiscussionWithId($i);
				$createur = FilDeDiscussion::getCreateurWithId($i);
				if (!empty($fildediscussion->getIdFilDeDiscussion())) 
				{
					echo '<a class="lien" href="Forum.php?index='.$fildediscussion->getIdFilDeDiscussion().'">';
						echo '<div class="box">';
							echo '<div class="Content">';
								echo '<img class="imageTheme" src="image/Theme/'.$fildediscussion->getThemeFilDeDiscussion().'.png">';
								echo '<div>';
									echo'<div class="titre">'.$fildediscussion->getTitreFilDeDiscussion().'</div>';
									echo '<div class="sousTitre">'.'Createur : '.$createur->getNomCompte().' Theme : '.$fildediscussion->getThemeFilDeDiscussion().' date ouverture : '.$fildediscussion->getDateCreation().'</div>';
								echo '</div>
							</div>
						</div>
					</a>';
				}
			}
		?>
	</div>
	<div class="adsContainer">
		<img class="ads" src="https://media.discordapp.net/attachments/535910358078980172/676726300110618645/DS8NwTEX0AAs8Kl.jpg?width=674&height=943">
		<img class="ads" src="https://kimhandysidesvoiceover.com/wp-content/uploads/2017/08/Colget-Funny-Commercial-Picture.jpg">
	</div>
</div>