<?php
	include("header.php");
	include("datamanagers/DatabaseLinker.php");
	include("data/fildediscussion.php");
	include("data/compte.php");
	include("data/message.php");
?>
<?php
	/*$typeTriCompte = "idCompte ASC";
	$tabCompte = Compte::getAllCompte($typeTriCompte);
	
	foreach ($tabCompte as $ligneTabCompte) 
	{
		echo '<br>'.$ligneTabCompte->getNomCompte();
	}
?>
<?php
	echo '<br>';
	$typeTriFilDeDiscussion = "idFilDeDiscussion ASC";
	$tabFilDeDiscussion = FilDeDiscussion::getAllFilDeDiscussion($typeTriFilDeDiscussion);
	foreach ($tabFilDeDiscussion as $ligneTabFilDeDiscussion) 
	{
		echo '<br>'.$ligneTabFilDeDiscussion->getTitreFilDeDiscussion();
	}
?>
<?php
echo '<br>';
	$typeTriMessage = "idMessage ASC";
	$tabMessage = Message::getAllMessage($typeTriMessage);
	foreach ($tabMessage as $ligneTabMessage) 
	{
		echo '<br>'.$ligneTabMessage->getTitreMessage();
		echo '<br>'.$ligneTabMessage->getIdFilDeDiscussion();
		echo '<br>'.$ligneTabMessage->getIdMessage();
	}*/
?>
<div class="entete">
 	<h1>Forum</h1>
	<p>Bienvenue sur le Forum</p>
</div>
<?php
/*if ($etatConnexion == true) 
{*/
	include("BarreDeNavNonCo.php");
/*}
else
{
	include("BarreDeNavNonCo.php");
}*/
?>
<div class="page">
	<div class="partgauche">
		<img class = "pub" src="https://data.whicdn.com/images/177181124/original.jpg">
	</div>
	<div class="milieu">
		<?php
            /*<table>
                <tbody>
                    <th>date</th>
                    <th>Theme</th>
                    <th>Auteur</th>
                    <th>titre</th>
                        <?php
                        	$typeTriFilDeDiscussion = "dateOuverture ASC";
							$tabFilDeDiscussion = FilDeDiscussion::getAllFilDeDiscussion($typeTriFilDeDiscussion);
	                        for ($i=1; $i < 10; $i++) 
	                        { 
	                        	echo '<tr>';
	                        	echo '<td>';
	                            $fildediscussion = new FilDeDiscussion();
								$fildediscussion->getIdFilDeDiscussionWithId($i);
								echo '<br>'.$fildediscussion->getDateCreation();
								echo '</td>';
	                    		echo '<td>';
								echo '<br>'.$fildediscussion->getThemeFilDeDiscussion();
	                    		echo '</td>';
	                    		echo '<td>';
	                    		$compte = new Compte();
								$compte->getCompteWithId($i);
								$createur = FilDeDiscussion::getCreateurWithId($i);
								echo '<br>'.$createur->getNomCompte();
	                    		echo '</td>';
	                    		echo '<td>';
	                    		echo '<br>'.$fildediscussion->getTitreFilDeDiscussion();
	                    		echo '</td>';
	                    		echo '</tr>';
                    		}
                    	?>
                </tbody>
            </table>*/
        ?>
        <?php
        	$typeTriFilDeDiscussion = "dateOuverture ASC";
			$tabFilDeDiscussion = FilDeDiscussion::getAllFilDeDiscussion($typeTriFilDeDiscussion);
			if (empty($_GET["pages"])|| $_GET["pages"]=="1")
			{
				for ($i=1; $i < 6; $i++) 
	            { 
					$fildediscussion = new FilDeDiscussion();
					$fildediscussion->getIdFilDeDiscussionWithId($i);
					$createur = FilDeDiscussion::getCreateurWithId($i);
			        echo '<a class="lien" href="Forum.php?index='.$fildediscussion->getIdFilDeDiscussion().'">';
						echo '<div class="box">';
							echo '<div class="Content">';
								echo '<img class="imageTheme" src="image/Theme/'.$fildediscussion->getThemeFilDeDiscussion().'.png">';
								echo '<div>';
									echo'<div class="grand">'.$fildediscussion->getTitreFilDeDiscussion().'</div>';
									echo '<div class="petit">'.'Createur : '.$createur->getNomCompte().'<br>Theme : '.$fildediscussion->getThemeFilDeDiscussion().'<br>date ouverture : '.$fildediscussion->getDateCreation().'</div>';
								echo '</div>
							</div>
						</div>
					</a>';
				}
			}
            
			$taille = sizeof(FilDeDiscussion::getAllFilDeDiscussion(" idFilDeDiscussion ASC"));
			$taille -= 5;
			$cpt = 6;
			$nbpages = 3;

			if (!empty($_GET["pages"])) 
			{
				if ($_GET["pages"]=="2") 
				{
					for ($i=6; $i < 11; $i++) 
		            { 
						$fildediscussion = new FilDeDiscussion();
						$fildediscussion->getIdFilDeDiscussionWithId($i);
						$createur = FilDeDiscussion::getCreateurWithId($i);
				        echo '<a class="lien" href="Forum.php?index='.$fildediscussion->getIdFilDeDiscussion().'">';
							echo '<div class="box">';
								echo '<div class="Content">';
									echo '<img class="imageTheme" src="image/Theme/'.$fildediscussion->getThemeFilDeDiscussion().'.png">';
									echo '<div>';
										echo'<div class="grand">'.$fildediscussion->getTitreFilDeDiscussion().'</div>';
										echo '<div class="petit">'.'Createur : '.$createur->getNomCompte().'<br>Theme : '.$fildediscussion->getThemeFilDeDiscussion().'<br>date ouverture : '.$fildediscussion->getDateCreation().'</div>';
									echo '</div>
								</div>
							</div>
						</a>';
					}
				}
				if ($_GET["pages"]=="3") 
				{
					for ($i=11; $i < 13; $i++) 
		            { 
						$fildediscussion = new FilDeDiscussion();
						$fildediscussion->getIdFilDeDiscussionWithId($i);
						$createur = FilDeDiscussion::getCreateurWithId($i);
				        echo '<a class="lien" href="Forum.php?index='.$fildediscussion->getIdFilDeDiscussion().'">';
							echo '<div class="box">';
								echo '<div class="Content">';
									echo '<img class="imageTheme" src="image/Theme/'.$fildediscussion->getThemeFilDeDiscussion().'.png">';
									echo '<div>';
										echo'<div class="grand">'.$fildediscussion->getTitreFilDeDiscussion().'</div>';
										echo '<div class="petit">'.'Createur : '.$createur->getNomCompte().'<br>Theme : '.$fildediscussion->getThemeFilDeDiscussion().'<br>date ouverture : '.$fildediscussion->getDateCreation().'</div>';
									echo '</div>
								</div>
							</div>
						</a>';
					}
				}
			}
			/*if (!empty($_GET["pages"])>1) 
	        {
	        	for ($i=0; $i < $nbpages; $i++) 
	        	{ 
	        		for ($i=$cpt; $i < $cpt+6; $i++) 
		            { 
						$fildediscussion = new FilDeDiscussion();
						$fildediscussion->getIdFilDeDiscussionWithId($i);
						$createur = FilDeDiscussion::getCreateurWithId($i);
				        echo '<a class="lien" href="Forum'.$fildediscussion->getIdFilDeDiscussion().'.php">';
							echo '<div class="box">';
								echo '<div class="Content">';
									echo '<img class="imageTheme" src="image/Theme/'.$fildediscussion->getThemeFilDeDiscussion().'.png">';
									echo '<div>';
										echo'<div class="grand">'.$fildediscussion->getTitreFilDeDiscussion().'</div>';
										echo '<div class="petit">'.'Createur : '.$createur->getNomCompte().'<br>Theme : '.$fildediscussion->getThemeFilDeDiscussion().'<br>date ouverture : '.$fildediscussion->getDateCreation().'</div>';
									echo '</div>
								</div>
							</div>
						</a>';
					}
	        	}
	        }*/
			?>
	</div>
	<div class="partdroite">
		<img class="pub" src="https://pbs.twimg.com/media/EAjs3ZEXoAEON26.jpg">s
	</div>
</div>

<div class="bas">
	<?php  
  	for ($i=1; $i < $nbpages+1; $i++) 
  	{ 
  		echo '<a href="index.php?pages='.$i.'" class="nbPages">'.$i.'</a>';
  	}
	?>
</div>
<?php
	include("footer.php");
?>